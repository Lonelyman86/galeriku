@extends('main')

@section('content')

<div class="dropdown-1">
  <button class="dropbtn">Create New</button>
  <div class="dropdown-content-1">
    <a href="/createalbum">Create New Album</a>
    <a href="/createfoto">Create New Foto</a>
  </div>
</div>

<style>
    .grid-container-01 {
        display: grid;
        grid-template: auto / 12rem 12rem 12rem 12rem;
        grid-gap: 13px;
        grid-column: auto;
        grid-template-areas: 'myArea myArea . . .';
        align-items: start;
    }

    .detail-foto {
        max-width: 100%;
        max-height: auto;
    }

    .card-02 {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .col-md-4 {
        flex: 0 0 auto;
    }

    .col-md-7, .col-md-5 {
        flex: 1 1 50%;
    }

    </style>
    <div class="foto">
        <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:25px; margin:21px;">My Photos</h1>
        <div class="grid-container-01">
            @foreach ($foto as $item)
                <div class="card-03">
                    <div class="card-foto"><img src="{{ asset('storage/foto/'.$item->lokasi_file)}}" style="width: 160px; height:150px"></div>
                        <div class="card-inform">
                        <p class="text-judul"> {{$item->judul_foto}} </p>
                        <p class="text-dalem-01"> {{$item->deskripsi_foto}} </p>
                        <p class="text-dalem-01">
                            @if($item->album)
                            {{ $item->album->nama_album }}
                            @else
                            <p style="color: rgb(147, 185, 255);">Didn't have an album</p>
                            @endif
                        </p>
                    </div>
                    <div class="card-akhir-01">
                        <span class="text-dalem-01">
                            @php
                            $users = App\Models\User::where('id', $item->foto_id)->get();
                            @endphp
                            @foreach($users as $user)
                            <b>@auth {{ $user->username }} @endauth</b>
                            @endforeach</span>
                        <div class="card-tombol-01">
                        @auth {{-- Memastikan pengguna sudah login --}}
                                @if(Auth::id() == $item->user_id) {{-- Membandingkan ID pengguna yang login dengan user_id foto --}}
                                {{-- FORM UNTUK TOMBOL DELETE --}}
<form action="{{ route('photos.destroy', $item->id)}}" method="POST" style="display:inline;">
    @csrf
    @method('delete') {{-- Ini adalah kuncinya! --}}
    <button type="submit" class="tombol-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">Delete</button>
</form>
                                @endif
                            @endauth
                                <button type="button" class="tombol-modal" data-bs-toggle="modal" data-bs-target="#Albummodal{{$item->id}}">Album</button>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
            <div class="modal fade" id="ContohModal{{$item->id}}" tabindex="-1" aria-labelledby="contohModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 900px;">
                    <div class="modal-content" style="width: auto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contohModalLabel">Detail Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <img src="{{ asset('storage/foto/'.$item->lokasi_file)}}" class="detail-foto">
                                </div>
                                <div class="col-md-5">
                                    <!-- Tombol Like dan Form Komentar -->
                                    <div class="like-comment-container">
                                        <!-- Tombol Like -->
                                        <div class="tombol-like">
                                            <form id="like-form-{{$item->id}}" method="POST" action="{{ route('likes.toggle', ['photo' => $item->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm card-text float-start">❤</button>
                                                <span>{{ $item->like->count() }}</span>
                                            </form>
                                        </div>


                                        <!-- Form Komentar -->
                                        <form class="card-footer-01" method="POST" action="{{ route('komentar.store', ['photo' => $item->id]) }}">
                                            @csrf
                                            <div class="input-group-1">
                                                <textarea name="isi_komentar" rows="1" placeholder="Add a comment"></textarea>
                                                <button type="submit" class="tombol-komen"><i class="bi bi-chevron-compact-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                   <!-- Daftar Komentar -->
                                   @if ($item->komentarfoto->count() > 0)
                                   <div class="list-group list-group-flush">
                                       @foreach ($item->komentarfoto as $comment)
                                           <div class="list-group-item">
                                               <h6 class="list-group-item-heading"><strong>{{ $comment->user->fullname }}</strong> <span class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</span></h6>
                                               <p class="list-group-item-text">{{ $comment->isi_komentar }}</p>
                                           </div>
                                       @endforeach
                                   </div>
                               @else
                                   <p>Tidak ada komentar.</p>
                               @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal 2 --}}
            <div class="modal fade" id="Albummodal{{$item->id}}" tabindex="-1" aria-labelledby="AlbummodalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 670px">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contohModalLabel">Masukan Ke dalam Album </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('foto.update.album', ['photo' => $item->id]) }}">
                                @csrf
                                <select name="album_id" class="form-control">
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                @endforeach
            </div>
    </div>

    @if ($albums->count() > 0)
    <div class="album">
        <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:25px; margin:21px;">My Album</h1>
        <div class="grid-container-02">
            @foreach ($albums as $album)
                <a href="{{ route('album.show', ['album' => $album->id]) }}" class="card-03">
                    <div class="card-inform">
                        <p class="text-judul">{{ $album->nama_album }}</p>
                        <p class="text-dalem-01">{{ $album->deskripsi }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@else
    <p style="margin: 21px; color: gray;">Anda belum memiliki album.</p>
@endif


@endsection
