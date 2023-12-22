@extends('dashboard.layout')

@section('content')
<div class="pb-3"><a href="{{ route('activity.index') }}" class="btn btn-secondary"> Back </a></div>
<form action="{{ route('activity.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="activity" class="form-label">Activity</label>
          <input type="text" class="form-control form-control-sm" name="activity" id="Activity" aria-describedby="helpId" placeholder="Activity" value="{{ $data->activity }}">
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-auto">Starting Date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="starting_date" placeholder="dd/mm/yyy" value="{{ $data->starting_date }}"></div>
            <div class="col-auto">Ending Date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="ending_date" placeholder="dd/mm/yyy" value="{{ $data->ending_date }}"></div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
          </div>
          <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection