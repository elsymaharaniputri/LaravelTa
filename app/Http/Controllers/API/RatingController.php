<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    // Menyimpan rating
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            // 'id_user' => 'required|exists:users,id',
            'id_audio' => 'required|exists:audio,id',
            'rate' => 'required|integer|between:1,3',
        ]);


        if ($validator->fails()) {
             // Tangani kegagalan validasi secara manual
        return response()->json([
            'message'=> "Gagal ratings,Periksa isian form !",
            'status' => false,
            'errors'=> $validator->errors(),
     ], 401);
        }

        
  // Validasi berhasil, lanjutkan proses
    $validated = $validator->validated();
        // Ambil id_user dari token Sanctum
        $id_user = $request->user()->id;

        // Simpan rating ke database
        $rating = Rating::create([
            'id_user' => $id_user,
            'id_audio' => $request->id_audio,
            'rate' => $request->rate,
        ]);

       return response()->json(['message' => 'Rating berhasil disimpan', 'data' => $rating], 200);
    }

public function show (){
  try {
        // Mengambil semua rating dan mengelompokkan berdasarkan id_audio
        $ratings = Rating::with('audio') // Eager load audio
            ->select('id_audio', 'rate')
            ->get();

        // Mengelompokkan data berdasarkan id_audio
        $groupedRatings = $ratings->groupBy('id_audio')->map(function ($group) {
            $audio = $group->first()->audio; // Ambil audio dari grup
            $ratingsData = $group->map(function ($item) use ($group) {
                return [
                    'rate' => $item->rate,
                    'total_user_rate' => $group->where('rate', $item->rate)->count(), // Hitung total pengguna untuk setiap rating
                ];
            })->unique('rate'); // Ambil rating unik

            return [
                'id_audio' => $audio->id,
                'nama_audio' => $audio->name_audio, // Pastikan ada field 'name_audio' di model Audio
                'ratings' => $ratingsData->values(), // Mengembalikan data rating
            ];
        });

        // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Audio ratings retrieved successfully',
            'data' => $groupedRatings->values(), // Mengembalikan data sebagai array
        ], 200);
    } catch (\Exception $e) {
        // Tangkap error jika terjadi
        return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage(), 'data' => null], 500);
    }

} }
