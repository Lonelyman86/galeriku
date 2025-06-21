<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto; // Pastikan ini sudah ada
use App\Models\Komentar; // Pastikan ini sudah ada
use App\Models\Album; // Pastikan ini sudah ada
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk mengelola file

class FotoController extends Controller
{
    public function create ()
    {
        return view('pages.fotoaction.createfoto', [
            "title" => "Create New Post"
        ]);
    }

    public function index ()
    {
        $foto = Foto::all();
        $komentar = Komentar::all();
        $albums = Album::all();
        return view('foto', [
            "title" => "foto",
            "foto" => $foto ,
            "comments" => $komentar,
            "albums" => $albums
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
        'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'judul_foto' => 'required|string|max:255',
        'deskripsi_foto' => 'required|string',
        'album_id' => 'nullable',
        'user_id' => 'required' // Pastikan ini diambil dari Auth::id() di form upload atau di controller langsung
    ]);

    if ($request->hasFile('lokasi_file')) {

        $file = $request->file('lokasi_file');

        $filename = time() . '_' . $file->hashName();

        // Menggunakan Storage facade untuk menyimpan file
        // Pastikan symlink storage sudah dibuat: php artisan storage:link
        $file->storeAs('public/foto', $filename); // Simpan di storage/app/public/foto

        $foto = new Foto();
        $foto->judul_foto = $request->judul_foto;
        $foto->user_id = $request->user_id; // Sebaiknya ambil dari Auth::id()
        $foto->deskripsi_foto = $request->deskripsi_foto;
        $foto->lokasi_file = $filename;
        $foto->tanggal_unggah = now();
        $foto->save();

        return redirect('studio')->with('success', 'Foto berhasil diunggah!');

    }

    return response()->json(['message' => 'No photo uploaded'], 400);
}

    public function updateAlbum(Request $request, $photoId)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
        ]);

        $foto = Foto::findOrFail($photoId);

        // Otorisasi: Hanya pemilik foto yang bisa mengupdate album
        if (auth()->id() !== $foto->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengubah album foto ini.');
        }

        $foto->album_id = $request->album_id;
        $foto->save();

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan ke album.');
    }

    /**
     * Hapus foto dari database dan storage.
     *
     * @param  \App\Models\Foto  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $photo) // Menggunakan Route Model Binding
    {
        // Otorisasi: Pastikan hanya pemilik foto yang bisa menghapus
        if (auth()->id() !== $photo->user_id) {
            // Jika tidak memiliki izin, kembalikan response 403 (Forbidden)
            abort(403, 'Anda tidak memiliki izin untuk menghapus foto ini.');
        }

        // Hapus file fisik dari storage
        // Path file ada di storage/app/public/foto/nama_file.ekstensi
        if (Storage::disk('public')->exists('foto/' . $photo->lokasi_file)) {
            Storage::disk('public')->delete('foto/' . $photo->lokasi_file);
        }

        // Hapus data foto dari database
        $photo->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus!');
    }
}