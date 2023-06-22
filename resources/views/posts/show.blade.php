@extends('layouts.app')

@section('title', $data->title)

@section('content')

    <article class="blog-post mt-5">
        <h2 class="blog-post-title mb-4 text-center">{{ $data->title }}</h2>
        <p class="text-center">
            <small>
                Oleh : {{ Auth::user()->username }}
            </small>
        </p>
        <img src="{{ url('storage/' . $data->image) }}" alt="photo" class="card-img-top rounded-2" style="object-fit:fit; height:auto; width:400px, display:block; margin-left:auto; margin-right:auto">
        <p class="fs-5">{!! $data->content !!}</p>
        <p class="blog-post-meta">Createed At : {{ date('d M Y', strtotime($data->created_at)) }}</p>
    </article>

    <div class="card mb-3">
        <div class="card-header">{{ $total_comments }} Komentar</div>
        <form action="{{ route('comment') }}" class="d-flex m-2" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="comment">
                <input type="hidden" name="post_id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-secondary">Kirim</button>
            </div>
        </form>
    </div>

    <div class="container">
        @foreach ($comments->take(1) as $comment)
            <div class="my-1">
                <h6 class="fw-bold bm-1">&#64; {{ $comment->commentwriter->username }}</h6>
                <blockquote class="blockquote mb-0">
                    <p>
                        <small>{{ $comment->comment }}</small>
                    </p>
                    <p class="blockquote mb-2">
                        <small>{{ date('d M Y H:i', strtotime($comment->created_at)) }}</small>
                    </p>
                </blockquote>
            </div>
        @endforeach

        @if ($comments->count() > 1)
            
            <div class="position-relative my-4">
                <a class="position-absolute top-50 start-50 translate-middle" id="showAllComments">Show All Comments</a>
            </div>

            <div id="hiddenComments" style="display:none">
                @foreach ($comments->skip(1) as $comment)
                    <div class="my-1">
                        <h6 class="fw-bold bm-1">&#64; {{ $comment->commentwriter->username }}</h6>
                        <blockquote class="blockquote mb-0">
                            <p>
                                <small>{{ $comment->comment }}</small>
                            </p>
                            <p class="blockquote mb-2">
                                <small>{{ date('d M Y H:i', strtotime($comment->created_at)) }}</small>
                            </p>
                        </blockquote>
                    </div>
                @endforeach
            </div>
            <script>
                document.getElementById("showAllComments").addEventListener("click", function() {
                    document.getElementById("hiddenComments").style.display ="block";
                    this.style.display ="none";
                });
            </script>
        @endif
    </div>


    <a href="{{ route('index') }}" class="btn btn-success mb-3">Back</a>

@endsection
