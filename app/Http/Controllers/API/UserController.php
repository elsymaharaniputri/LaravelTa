<?php

namespace App\Http\Controllers\API;

use App\Models\User; 
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
class UserController extends Controller
{

    //REGISTER
    public function register(Request $request) {
   try  
   {  
     $validatoruser = Validator::make(
        $request->all(),
        [
           //KARENA AUTO INCREAMENT JADINYA GA USAH DIIISI
            'name' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'username' => 'required|string|alpha_num|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'id_role' => 'required|string|max:6',
        ]
    );

    if ($validatoruser->fails()) {
        // Tangani kegagalan validasi secara manual
        return response()->json([
            'message'=> "Gagal register,Periksa isian form !",
            'status' => false,
            'errors'=> $validatoruser->errors(),
     ], 401);
    }

    // Validasi berhasil, lanjutkan proses
    $validated = $validatoruser->validated();
       
     // Simpan data user ke dalam database
        $user = User::create([
            'name' => $validated['name'],
            'tgl_lahir' => $validated['tgl_lahir'],
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']), // Hash password
            'id_role' => $validated['id_role'],
        ]);

        return response()->json([
         'message' => "success regist!",
          'user' => $user,
          'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);
    }catch (\Throwable $th) {
            // Return Json Response
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }

    }


    public function login(Request $request){
    try{
        $validatoruser = Validator::make(
        $request->all(),
        [
           //KARENA AUTO INCREAMENT JADINYA GA USAH DIIISI
       
            'username' => 'required',
            'password' => 'required|string|min:8',
            
        ]
    );
    
//JIKA SALAH BUAT EROR 401
     if ($validatoruser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validatoruser->errors()
                ], 403);
            }

            if (!Auth::attempt(($request->only(['username','password'])))) {
                return response()->json(['status' => false,
                    'status' => false,
                    'message' => 'Username atau password anda salah!',
                ],401);
            }
            //Cari usernamenya
            $user = User::where('username', $request->username)->first();

          return response()->json([
         'message' => "success login!",
          'user' => $user,
          'token' => $user->createToken('API TOKEN')->plainTextToken
        ],200);
    }
   catch (\Throwable $th) {
            // Return Json Response
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
}


//PROFILE
    public function profile(){
           try{
         $userData = Auth::user();
          // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Data anda',
            'data' => $userData,
            'id' => Auth::user()->id,
        ], 200);
        }catch(\Exception $e) {
          // Tangkap error jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage(), 'data' => null], 500);
        }
    }

//LOGOUT
 
 public function logout()
{
    // Menghapus semua token akses pengguna
     if (Auth::check()) {
        // Ambil user ID
        $userId = Auth::id();

        // Hapus semua token pengguna dari tabel `personal_access_tokens`
        DB::table('personal_access_tokens')->where('tokenable_id', $userId)->delete();
    }
    // Return Json Response
    return response()->json([
        'status' => true,
        'message' => 'Successfully Logout',
        'data' => []
    ], 200);
}




};
