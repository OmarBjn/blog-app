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

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">title:</label>
            <input type="text" name="title" class='form-control' value=" {{ old('title') }} ">
        </div>

        <div class="mb-3">
            <label class="form-label">description:</label>
            <textarea name="description" rows="3" class='form-control'>{{ old('description') }}</textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Posted By</label>
            <select name="user_id" class='form-control'>
                @foreach ($users as $user)
                    <option @selected( old('user_id') == $user->id ) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection