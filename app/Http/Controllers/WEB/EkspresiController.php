<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Ekspresi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EkspresiController extends Controller
{

    
    public function show(Request $request){
       try {
       //get all products
        $ekspresis = Ekspresi::latest()->paginate(10);
        //render view with products , sama dengan compact ($ekspresis)
        return view('ekspresi.showEkspresi', compact('ekspresis'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }
    
    public function form(): View
    {
        //halaman insertEkspresi di folder eskpresi
        return view('ekspresi.insertEkspresi');
    }

        public function store(Request $request)
{
    $request->validate([
        'id' => 'required',
        'name_ekspresi' => 'required',
        'desc_ekspresi' => 'required',
        'icon_ekspresi' => 'required|file|mimes:jpg,png,jpeg|max:2048',
    ]);

    $file_ekspresi = null;

    // Pastikan folder 'ekspresi' ada
    if (!file_exists(public_path('ekspresi'))) {
        mkdir(public_path('ekspresi'), 0777, true);
    }

    // Proses file upload
    if ($request->hasFile('icon_ekspresi')) {
        $file = $request->file('icon_ekspresi'); // Ambil file
        $extension = $file->getClientOriginalExtension(); // Dapatkan ekstensi file
        $filename = $request->name_ekspresi . '-' . time() . '.' . $extension; // Nama unik dengan ekstensi
        $file->move(public_path('ekspresi'), $filename); // Simpan file
        $file_ekspresi = $filename;
    } else {
        return redirect()->back()->with('error', 'File icon tidak ditemukan!');
    }

    // Simpan data ke database
    Ekspresi::create([
        'id' => $request->input('id'),
        'name_ekspresi' => $request->input('name_ekspresi'),
        'desc_ekspresi' => $request->input('desc_ekspresi'),
        'icon_ekspresi' => $file_ekspresi,
    ]);

    // Redirect to index
    return redirect()->route('ekspresi.showEkspresi')->with(['success' => 'Data Berhasil Disimpan!']);
}
}
