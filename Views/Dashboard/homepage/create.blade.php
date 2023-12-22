@extends('dashboard.layout')

@section('content')
<div class="pb-3"><a href="{{ route('homepage.index') }}" class="btn btn-secondary"> Back </a></div>
<form action="{{ route('homepage.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control form-control-sm" name="title" id="Title" aria-describedby="helpId" placeholder="Title" value="{{ Session::get('title') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection
