<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Ekspresi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AudioController extends Controller
{

    //SHOW
     public function showAudio(Request $request){
       try {
       //get all products
        $audios = Audio::latest()->paginate(10);
        //render view with products , sama dengan compact ($ekspresis)
        return view('audio.showAudio', compact('audios'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }


    // FORM

    public function formAudio(): View
{
    // Mengambil semua ekspresi untuk ditampilkan di form
    $ekspresis = Ekspresi::all();
    return view('audio.insertAudio', compact('ekspresis'));
}

    //STORE
   public function storeAudio(Request $request)
    {
        $request->validate([
            'name_audio' => 'required',
            'id_ekspresi' => 'required',
             'file_audio' => 'nullable|file|mimes:mp3,wav',
       
        ]);
      $file_audio = null;

         // Proses file audio jika ada
    if ($request->hasFile('file_audio')) {
        $file = $request->file('file_audio'); // Ambil file yang diunggah
        $filename = $request->name_audio.'-'.time().'.'.$file->getClientOriginalExtension(); // Nama file unik dengan ekstensi
        $file->move(public_path('audio'), $filename); 

        $file_audio = $filename; // Simpan nama file yang telah diproses
    }

    // Simpan data audio ke dalam database
    Audio::create([
        'name_audio' => $request->input('name_audio'),
        'id_ekspresi' => $request->input('id_ekspresi'),
        'file_audio' => $file_audio, 
    ]);

        //simpan
         //redirect to index
        return redirect()->route('audio.showAudio')->with(['success' => 'Data Berhasil Disimpan!']);
        

    }




}
