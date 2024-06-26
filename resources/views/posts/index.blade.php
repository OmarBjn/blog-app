@extends('layouts.app')

@section('title') index @endsection

@section('content') 
  <div class="text-center">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
  </div>
  
  <table class="table mt-4">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Posted by</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->created_at}}</td>
                  <td>{{$post->updated_at}}</td>
                  <td>
                      <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                      <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

    @if ($posts->count())
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @endif

@endsection
