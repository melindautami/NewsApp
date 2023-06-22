@extends('layouts.app')

@section('title', 'Berita IT')

@section('content')

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($posts as $p)
                
            
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                <img src=" {{ asset('storage/' . $p->image) }} " class="d-block w-100 rounded-2 opacity-50" style="object-fit: cover; height:400px;" alt="Slide Image">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $p->title }}</h3>
                    <a href="{{ url('posts/$p->slug') }}" class="text-dark">
                        <p class="text-dark">Selengkapnya....</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    @foreach ($posts as $p)
        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">{{ $p->title }}</h5>
                <i class="card-text">{!! substr($p->content, 0, 50) !!}</i>
                <p class="muted">Created At {{ date('d M Y, H:i', strtotime($p->created_at)) }}</p>
                <p>Created by {{ $p->user->username }}</p>
                <a href="{{ route('landingShow', $p->slug) }}" class="btn btn-success">Selengkapnya</a>
            </div>
        </div>
    @endforeach

@endsection
