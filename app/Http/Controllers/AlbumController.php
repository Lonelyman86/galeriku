<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Models\Komentar;

class AlbumController extends Controller
{
    public function index() {
        return view('pages.albumaction.createalbum', [
            'title' => 'Create Album'
        ]);
    }

    public function store(Request $r)
    {
        $v = $r->validate([
            'user_id' => 'required',
            'nama_album' => 'required|unique:albums',
            'deskripsi' => 'required',
        ]);
Album::create($v);
return redirect('/studio');
    }
    public function show(Album $album)
    {
        $foto = Foto::where('album_id', $album->id)->get();
        $komentar = Komentar::all();
        $albumOption = Album::all();
        return view('ShowAlbum', [
            'title' => 'Album/' . $album->nama_album,
            'album' => $album,
            'albumOption' => $albumOption,
            "foto" => $foto ,
            "comments" => $komentar
        ]);
    }


}
