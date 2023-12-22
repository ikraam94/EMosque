@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('history.index') }}" class="btn btn-secondary"> Back </a></div>
    <form action="{{ route('history.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="history" class="form-label">History</label>
          <input type="text" class="form-control form-control-sm" name="history" id="History" aria-describedby="helpId" placeholder="History" value="{{ $data->history }}">
        </div>
        <div class="mb-3">
            <label for="kandungan" class="form-label">Kandungan</label>
            <textarea class="form-control summernote" rows="5" name="kandungan">{{ $data->kandungan }}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection