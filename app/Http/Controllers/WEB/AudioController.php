<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\Ekspresi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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
//EDIT
    public function editAudio(string $id): View
    {
        // Ambil data audio berdasarkan ID
        $audio = Audio::findOrFail($id);
        
        // Ambil semua data ekspresi untuk dropdown
        $ekspresis = Ekspresi::all();
        
        // Tampilkan view form edit dengan data audio dan ekspresis
        return view('audio.editAudio', compact('audio', 'ekspresis'));
    }

    //UPDATE
    public function updateAudio(Request $request, string $id): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'name_audio' => 'required|string|max:255',
            'id_ekspresi' => 'required',
            'file_audio' => 'nullable|file|mimes:mp3,wav,ogg|max:10240' // max 2MB
        ]);

        // Cari audio yang akan diupdate
        $audio = Audio::findOrFail($id);

        // Update data dasar
        $audio->update([
            'name_audio' => $validated['name_audio'],
            'id_ekspresi' => $validated['id_ekspresi']
        ]);

        // Handle file upload jika ada file baru
        if ($request->hasFile('file_audio')) {
            // Hapus file lama jika ada
            if ($audio->file_audio && file_exists(public_path('audio/'.$audio->file_audio))) {
                unlink(public_path('audio/'.$audio->file_audio));
            }

            // Simpan file baru
            $file = $request->file('file_audio');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('audio'), $filename);
            
            // Update nama file di database
            $audio->file_audio = $filename;
            $audio->save();
        }

        // Redirect ke halaman list audio dengan pesan sukses
        return redirect()->route('audio.showAudio')->with('success', 'Audio berhasil diperbaharui.');
    }



    //DELETE
    public function destroyAudio($id)
    {
        $audio = Audio::find($id);

        if (!$audio) {
            return redirect()->back()->with('error', 'Audio tidak ditemukan.');
        }

        // Hapus file fisik jika perlu (opsional)
        if ($audio->file_audio && file_exists(public_path('storage/audio/' . $audio->file_audio))) {
            unlink(public_path('storage/audio/' . $audio->file_audio));
        }

        $audio->delete();

        return redirect()->route('audio.showAudio')->with('success', 'Audio berhasil dihapus.');
    }
}







