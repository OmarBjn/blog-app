@extends('layouts.app')

@section('title', 'create')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">description:</label>
            <textarea name="description" rows="3" class='form-control'>{{ old('description', $post->description) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Posted By</label>
            <select name="user_id" class='form-control'>
                @foreach ($users as $user)
                <option 
                    value="{{ $user->id }}" 
                    @selected(old('user_id', $post->user_id) == $user->id)
                >
                    {{ $user->name }}
                </option>            
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection