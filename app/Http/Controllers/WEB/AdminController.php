<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AdminController extends Controller
{

    //form list user
       public function dashboard(): View
    {
        return view('admin.index');
    }

    //form login
        public function create(): View
    {
        return view('users.login');
    }
    //form tambahkan
    public function add(): View
    {
         $roles = Roles::all();
        return view('users.userAdd', compact('roles'));
    }
    //logic tampilkan list
       public function index() : View
    {
        try {
        //get all products
            $users = User::latest()->paginate(10);
            //render view with products , sama dengan compact ($users)
            return view('users.userList', compact('users'));
        } catch (\Throwable $th) {
            return view('admin.index')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
     }
    //logic login
   public function login(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make(
                $request->all(),
                [
                    'username' => 'required',
                    'password' => 'required|string|min:8',
                ]
            );
             
        

             //kembali ke halaman tapi inputnya terisi
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Proses autentikasi
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();

                return redirect()->route('admin.index')->with('success', 'Berhasil login!');
            }

            return back()->with('error', 'Username atau password salah!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    //logic adduser
    public function store(Request $request)
{
    try {
        // Validasi input
        $validatoruser = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'tgl_lahir' => 'required|date',
                'username' => 'required|string|alpha_num|max:255|unique:users,username',
                'password' => 'required|string|min:8',
                'id_role' => 'required|string|max:6',
            ]
        );

        // Jika validasi gagal
        if ($validatoruser->fails()) {
            return redirect()->back()
                ->withErrors($validatoruser)
                ->withInput()
                ->with('error', 'Gagal register, periksa isian form!');
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

        // Redirect ke halaman user list dengan pesan sukses
        return redirect()->route('users.userList')
            ->with('success', 'Registrasi berhasil! Pengguna baru telah ditambahkan.');
            
    } catch (\Throwable $th) {
        // Tangani kesalahan lainnya
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan: ' . $th->getMessage())
            ->withInput();
    }
}

    //logic logout

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form');
}

 // EDIT
    public function edit(string $id): View
    {
        //get product by ID
        $users = User::findOrFail($id);

        //render view with product
        return view('users.userEdit', compact('users'));
    }

//UPDATE

public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
             'name' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'username' => 'required|string|alpha_num|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'id_role' => 'required|string|max:6',
        ]);

        //get product by ID
        $product = User::findOrFail($id);

       

            //update product without image
            $product->update([
                'name'         => $request->name,
                'tgl_lahir'   => $request->tgl_lahir,
                'username'         => $request->username,
                'password'         => $request->password,
                'id_role'         => $request->id_role,
            ]);
        

        //redirect to index
        return redirect()->route('users.userList')->with(['success' => 'Data Berhasil Diubah!']);
    }

 
        
    }






    

