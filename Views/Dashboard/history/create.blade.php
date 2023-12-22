@extends('dashboard.layout')

@section('content')
<div class="pb-3"><a href="{{ route('history.index') }}" class="btn btn-secondary"> Back </a></div>
<form action="{{ route('history.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="history" class="form-label">History</label>
          <input type="text" class="form-control form-control-sm" name="history" id="History" aria-describedby="helpId" placeholder="History" value="{{ Session::get('history') }}">
        </div>
        <div class="mb-3">
            <label for="kandungan" class="form-label">Kandungan</label>
            <textarea class="form-control summernote" rows="5" name="kandungan">{{ Session::get('kandungan') }}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection
