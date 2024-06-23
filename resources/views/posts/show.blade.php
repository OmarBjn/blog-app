@extends('layouts.app')

@section('title', 'show')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            <p class="card-text">Created At: {{ $post->created_at ?? '-'}}</p>
            <p class="card-text">Updated At: {{ $post->updated_at ?? '-'}}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found'}}</h5>
            <p class="card-text">Email: {{$post->user ? $post->user->email: 'not found'}}</p>
        </div>
    </div>

    <div class="mt-4">
        <form id="delete-post-form" method="POST" action="{{ route('posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <script>
        document.getElementById('delete-post-form').addEventListener('submit', function(event) {
            var confirmation = confirm('Are you sure you want to delete this post?');
            if (!confirmation) {
                event.preventDefault();
            }
        });
    </script>
@endsection