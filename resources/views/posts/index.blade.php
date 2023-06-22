@extends('layouts.app')

@section('title', 'Berita IT')

@section('content')


<div>
    <a href="{{route('create')}}" class="btn btn-success">Create</a>
</div>

@foreach ($posts as $p)
    <div class="card my-4">
        <div class="card-body">
            <h5 class="card-title">{{ $p -> title}}</h5>
            <i class="card-text">{!! substr($p -> content, 0, 50) !!}</i>
            <p class="muted">Created At {{ date('d M Y, H:i', strtotime($p -> created_at)) }}</p>
            <p>Created by {{ $p->user->username }}</p>
            <a href="{{ route('show', $p->slug)}}" class="btn btn-success">Selengkapnya</a>
            <a href="{{ route('edit', $p->slug)}}" class="btn btn-success">Edit</a>
        </div>
    </div>
    
@endforeach
    
@endsection