@extends('material-admin::index')
@section('title', 'List Posts')
@section('content')
    {{ Breadcrumbs::render('posts') }}
    <div class="float-right mb-4">
        <a href="post/create" role="button" class="btn btn-outline-primary">New Post</a>
    </div>
    <x-octo-card-material
        title="Posts"
        description="List posts"
    >
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <h4 class="title mb-0">
                                {{ $post->title }}
                            </h4>
                        </td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td class="td-actions text-right">
                            <form method="POST" id="destroyPost-{{$post->id}}" action="/dashboard/post/{{$post->id}}">
                                <a
                                    href="post/{{$post->id}}/edit"
                                    type="button"
                                    rel="tooltip"
                                    title=""
                                    class="btn btn-primary btn-link btn-sm"
                                    data-original-title="Edit"
                                >
                                    <i class="material-icons">edit</i>
                                </a>
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button
                                    type="submit"
                                    rel="tooltip"
                                    title=""
                                    class="btn btn-danger btn-link btn-sm"
                                    data-original-title="Delete"
                                    onclick="
                                        event.preventDefault();
                                        let destroy = confirm('Really want to delete the post');
                                        if(destroy){ document.getElementById('destroyPost-{{$post->id}}').submit() }
                                    "
                                >
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($posts->currentPage() !== $posts->lastPage() || $posts->lastPage() !== 1)
            <div class="row">
                <div class="col">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Showing {{ $posts->currentPage() }} of {{ $posts->lastPage() }} pages and a total of {{ $posts->total() }} posts
                </div>
            </div>
        @elseif($posts->total() === 0)
            <div class="contatiner py-5">
                <div class="row py-2">
                    <div class="col text-center">
                        <h2>No posts to list.</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col text-center">
                        <a href="post/create">
                            <h5> Shall we start now ?</h5>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </x-octo-card-material>
@endsection
