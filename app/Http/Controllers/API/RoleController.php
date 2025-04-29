<?php

namespace App\Http\Controllers\API;
use App\Models\Roles; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
         public function store(Request $request)
    {
      $validatoruser = Validator::make(
        $request->all(),
        [
            'id' => 'required|string|max:6',
            'role' => 'required|string|max:20',
           
        ]
    );

    if ($validatoruser->fails()) {
        // Tangani kegagalan validasi secara manual
        return response()->json([
            'message'=> "Gagal add role!",
            'errors'=> $validatoruser->errors(),
     ], 401);
    }

    // Validasi berhasil, lanjutkan proses
    $validated = $validatoruser->validated();
       
     // Simpan data user ke dalam database
        $user = Roles::create([
            'id' => $validated['id'],
            'role' => $validated['role'],
          
        ]);

        return response()->json([
         'message' => "success add role!",
          'user' => $user,
        ],200);
}
}
