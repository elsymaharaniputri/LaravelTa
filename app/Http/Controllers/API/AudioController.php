<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    // SHOW ALL AUDIO DARI DATABASE

   public function showAudio(){
      try{
         $audioData =  Audio::all();
         foreach($audioData as $data){
          $data->file_audio = asset('audio/'.$data->file_audio);
         }
          // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Show audio successfully',
            'data' => $audioData, 
        
        ], 200);
        }catch(\Exception $e) {
          // Tangkap error jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage(), 'data' => null], 500);
        }
   }

}
