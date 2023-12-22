@extends('dashboard.layout')

@section('content')
<div class="pb-3"><a href="{{ route('association.index') }}" class="btn btn-secondary"> Back </a></div>
<form action="{{ route('association.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="association" class="form-label">Association</label>
          <input type="text" class="form-control form-control-sm" name="association" id="Association" aria-describedby="helpId" placeholder="Association" value="{{ $data->association }}">
        </div>
        <div class="mb-3">
          <label for="jawatan" class="form-label">Jawatan</label>
          <input type="text" class="form-control form-control-sm" name="jawatan" id="Jawatan" aria-describedby="helpId" placeholder="Jawatan" value="{{ $data->jawatan }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection