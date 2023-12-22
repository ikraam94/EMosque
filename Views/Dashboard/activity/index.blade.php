@extends('dashboard.layout')

@section('content')

<p class="card-title">Activity</p>
<div class="pb-3"><a href="{{ route('activity.create')}}" class="btn btn-primary">+ add new activity</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Activity</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th class="col-2">Action</th>
            </tr>
        </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item -> activity }}</td>
                    <td>{{ $item -> starting_date }}</td>
                    <td>{{ $item -> ending_date }}</td>
                    <td>
                        <a href="{{ route('activity.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Sure Delete ?')"
                        action="{{ route('activity.destroy', $item->id)}}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" name='submit'>Delete</button>
                        </form>

                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            </tbody>
    </table>
</div>

@endsection