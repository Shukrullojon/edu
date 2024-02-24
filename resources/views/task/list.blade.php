@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Info</th>
                <th>Time</th>
                <th>Day</th>
                <th>Type</th>
                <th>User</th>
                <th>Attach User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->comment }}</td>
                    <td>{{ $task->time }}</td>
                    <td>{{ \App\Helpers\DayHelper::getDay($task->day) }}</td>
                    <td>{{ \App\Helpers\TypeHelper::getDayType($task->type) }}</td>
                    <td>{{ $task->user->name ?? '' }}</td>
                    <td>{{ $task->attach_user->name ?? '' }}</td>
                    <td>{{ \App\Helpers\StatusHelper::taskStatusGet($task->status) }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ route("task_finish", $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                            </form>
                        </div>
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
