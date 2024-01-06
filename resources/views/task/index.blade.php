@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Task Management</h2>
                <a class="btn btn-success" href="{{ route('task.create') }}">Task</a>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Time</th>
                <th>Day</th>
                <th>Type</th>
                <th>User</th>
                <th>Attach User</th>
                <th>Close User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->time }}</td>
                    <td>{{ \App\Helpers\DayHelper::getDay($task->day) }}</td>
                    <td>{{ \App\Helpers\TypeHelper::getDayType($task->type) }}</td>
                    <td>{{ $task->user->name ?? '' }}</td>
                    <td>{{ $task->attach_user->name ?? '' }}</td>
                    <td>{{ $task->close_user->name ?? '' }}</td>
                    <td>{{ \App\Helpers\StatusHelper::taskStatusGet($task->status) }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('task.show',$task->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['task.destroy', $task->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $tasks->links() }}
                </td>
            </tr>
        </tfooter>
    </div>
@endsection
