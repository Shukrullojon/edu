@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-body py-3">
                <b>Cource:</b> {{ $schedule->group->cource->name ?? '' }}<br>
                <b>Group:</b> {{ $schedule->group->name ?? '' }}<br>
                <b>Teacher:</b> {{ $schedule->teacher->name ?? '' }} <br>
                <b>Tasks:</b> @foreach($schedule->room->roomTask as $task) {{ $task->name.',' }} @endforeach <br>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <form action="{{ route('teacherScheduleUpdate', $schedule->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="">#</th>
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-200px">Event</th>
                                <th class="min-w-200px">Attend</th>
                                <th class="min-w-200px">Like</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1;  @endphp
                            @if(count($attends))
                                @foreach($attends as $attend)
                                    <tr>
                                        <td><i>{{ $i++ }}</i></td>
                                        <td><i>{{ $attend->student->name }} {{ $attend->student->surname }}</i></td>
                                        <td>
                                            <i>
                                                <span
                                                    class="badge badge-light-success">{{ $attend->student->event->event->name ?? '' }}</span>
                                            </i>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <label>Keldi</label>        <input type="radio" value="2" @if($attend->attend == 2) checked @endif name="{{ $attend->student_id }}[attend]" class="form-check-input">
                                                <label style="margin-left: 5px">Kemadi</label>       <input type="radio" value="0" @if($attend->attend == 0) checked @endif name="{{ $attend->student_id }}[attend]" class="form-check-input">
                                                <label style="margin-left: 5px">Kech keldi</label>   <input type="radio" value="1" @if($attend->attend == 1) checked @endif name="{{ $attend->student_id }}[attend]" class="form-check-input">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input type="radio" name="like" @if($attend->like == 1) checked @endif value="{{ $attend->student_id }}" class="form-check-input">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach($schedule->students as $student)
                                    <tr>
                                        <td><i>{{ $i++ }}</i></td>
                                        <td><i>{{ $student->student->name }} {{ $student->student->surname }}</i></td>
                                        <td>
                                            <i>
                                                <span
                                                    class="badge badge-light-success">{{ $student->student->event->event->name ?? '' }}</span>
                                            </i>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <label>Keldi</label>        <input type="radio" checked value="2" name="{{ $student->student_id }}[attend]" class="form-check-input">
                                                <label style="margin-left: 5px">Kemadi</label>       <input type="radio" value="0" name="{{ $student->student_id }}[attend]" class="form-check-input">
                                                <label style="margin-left: 5px">Kech keldi</label>   <input type="radio" value="1" name="{{ $student->student_id }}[attend]" class="form-check-input">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input type="radio" name="like" value="{{ $student->student_id }}" class="form-check-input">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <tfooter>
                            <tr>
                                <td colspan="9">
                                    <button type="submit" class="btn btn-success form-control">Save</button>
                                </td>
                            </tr>
                        </tfooter>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

