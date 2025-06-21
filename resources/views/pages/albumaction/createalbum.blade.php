@extends('main')

@section('content')

<center>
    <form action="{{ route('album.new') }}" method="POST">
    @csrf
    <input type="hidden" name='user_id' value="{{ Auth()->user()->id }}">
    {{-- <input type="hidden" name='tanggal_dibuat' value="{{ now()}}"> --}}
        <div class="cardy">
            <span class="card__title">Create New Album</span>
                <div class="card__form">
                <input type="text" name="nama_album" id="nama_album" placeholder="Name" required>
            </div>
            <div class="card__form">
                <textarea id="caption" name="deskripsi" placeholder="Caption"></textarea>
            </div>
            <button class="new-album"> Create</button>
        </div>
    </form>
</center>

@endsection