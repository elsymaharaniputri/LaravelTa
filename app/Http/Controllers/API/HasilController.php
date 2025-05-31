<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HasilController extends Controller
{
   

    //Upload Hasil Deteksi ke Database
    public function storeHasil(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'image_face' => 'required|image|mimes:jpeg,jpg,png|max:204800', // Pastikan sesuai dengan Flutter
                'id_ekspresi' => 'required|string|max:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $urutan = Hasil::count() + 1;

            // Upload file gambar
            if ($request->hasFile('image_face')) {
                $image_face = $request->file('image_face');
                // Buat nama file sesuai format: urutan_gambar_deteksi_id_ekspresi
                $fileName = $urutan  . '_hsleskpresi' . $request->input('id_ekspresi') . '.' . $image_face->getClientOriginalExtension();

                $imagePath = $image_face->storeAs('public/posts', $fileName);
            } else {
                return response()->json(['error' => 'File gambar tidak ditemukan'], 400);
            }

            // Simpan data ke database
            $hasil = Hasil::create([
                'image_face' => $fileName,
                'id_ekspresi' => $request->input('id_ekspresi'),
            ]);

            return response()->json([
                'message' => 'Data berhasil disimpan!',
                'data' => $hasil
            ], 200);

        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    

  
}
