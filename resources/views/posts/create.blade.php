@extends('layouts.app')

@section('title', 'buat blog')

@section('content')

    <h1 class="my-4">Buat Blog</h1>

    <form method="POST" action="{{ route('index')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Konten</label>
        <textarea type="text" class="form-control" name="content" id="editor"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" class="form-control" id="content" name="image" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Buat Blog</button>
    </div>

    </form>
@endsection