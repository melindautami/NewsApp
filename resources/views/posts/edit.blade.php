@extends('layouts.app')

@section('title', 'Edit Blog')

@section('content')

    <h1 class="my-4">Edit Blog</h1>

    <form method="POST" action="{{ route('update',$post->slug)}}" enctype="multipart/form-data">
    @method('patch')
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post -> title }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Konten</label>
        <textarea type="text" class="form-control" name="content" id="editor">{{ $post ->content }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" class="form-control" id="content" name="image">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    </form>

    <form action="{{route('delete', $post->slug)}}" method="POST" >
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger mb-4">Delete</button>

</form>

@endsection