<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Foto;
use App\Models\Komentar;
use App\Models\Album;

class HomeController extends Controller
{
    public function index()
    {

        $foto = Foto::all();
        $komentar = Komentar::all();
        $albums = Album::all();
        return view('layouts.home', [
            'title' => 'Home',
            "foto" => $foto ,
            "comments" => $komentar,
            "albums" => $albums
        ]);

    }

    public function StudioIndex()
{
    if (Auth::check()) {
        $user = Auth::user();
        $foto = Foto::where('user_id', $user->id)->get();
        $komentar = Komentar::all();
        $albums = Album::all();
        return view('layouts.studio', [
            'title' => 'Studio',
            "foto" => $foto,
            "comments" => $komentar,
            "albums" => $albums
        ]);
    } else {
        return redirect()->route('sign-in');
    }
}


}
