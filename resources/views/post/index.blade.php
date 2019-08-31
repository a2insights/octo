@extends('dashboard')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('posts') }}
        <div class="row mb-3">
            <div class="col-7">
                <h1>Posts</h1>
            </div>
            <div class="col-5 text-right">
                <a href="/dashboard/post/create" role="button" class="btn btn-outline-primary">New Post</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col">
                            <h2>
                                <span class="text-muted">#{{ $post->id }}</span>
                                {{ $post->title }}
                            </h2>
                            <h6>created at {{ $post->created_at }} | updated at {{ $post->updated_at }}</h6>
                            {!! $post->content !!}
                        </div>
                    </div>
                    <form method="POST" id="destroyPost-{{$post->id}}" action="/dashboard/post/{{$post->id}}">
                        <a class="btn btn-link text-primary" href="/dashboard/post/{{$post->id}}/edit">edit</a>
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button
                            type="submit"
                            onclick="
                                event.preventDefault();
                                let destroy = confirm('Really want to delete the post');
                                if(destroy){ document.getElementById('destroyPost-{{$post->id}}').submit() }
                            "
                            class="btn btn-link text-danger"
                        >
                            delete
                        </button>
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>
        @if($posts->currentPage() !== $posts->lastPage() || $posts->lastPage() !== 1)
            <div class="row">
                <div class="col">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    Showing {{ $posts->currentPage() }} of {{ $posts->lastPage() }} pages and a total of {{ $posts->total() }} posts
                </div>
            </div>
            <hr>
        @elseif($posts->total() === 0)
            <div class="contatiner py-5">
                <div class="row py-2">
                    <div class="col text-center">
                        <h2>No posts to list.</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-center">
                        <a href="/dashboard/post/create">
                            <h5> Shall we start now ?</h5>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
