<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ekspresi;
use Illuminate\Http\Request;

class EkspresiController extends Controller
{
     // SHOW ALL EKSPRESI DARI DATABASE

   public function showEkspresi(){
      try{
         $ekspresiData =  Ekspresi::latest()->paginate(6);
          // Return Json Response
        return response()->json([
            'status' => true,
            'message' => 'Show ekspresi successfully',
            'data' => $ekspresiData, 
        
        ], 200);
        }catch(\Exception $e) {
          // Tangkap error jika terjadi
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage(), 'data' => null], 500);
        }
   }
   
}
