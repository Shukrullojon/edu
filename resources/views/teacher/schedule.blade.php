@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="">#</th>
                            <th class="min-w-200px">Group</th>
                            <th class="min-w-150px">Room</th>
                            <th class="min-w-150px">Teacher</th>
                            <th class="min-w-150px">Begin</th>
                            <th class="min-w-150px">End</th>
                            <th class="min-w-150px">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1; @endphp
                        @foreach($schedules as $schedule)
                            <tr>
                                <td><i>{{ $i++ }}</i></td>
                                <td><i>{{ $schedule->group->name }} ({{ $schedule->group->cource->name }})</i></td>
                                <td><i>{{ $schedule->room->name }}
                                        ({{ \App\Helpers\TypeHelper::getGroupDayType($schedule->group->type) }})</i>
                                </td>
                                <td><i>{{ $schedule->teacher->name }} {{ $schedule->teacher->surname }}</i></td>
                                <td><i>{{ date('H:i', strtotime($schedule->begin_time)) }}</i></td>
                                <td><i>{{ date('H:i', strtotime($schedule->end_time)) }}</i></td>
                                <td><i>{{ \App\Helpers\StatusHelper::groupDetailStatusGet($schedule->status) }}</i></td>
                                <td>
                                    <div class="btn-group">
                                        <a style="margin-right:10px; color:green" href="{{ route("teacherScheduleEdit",$schedule->id) }}">
                                            <span class="fa fa-edit" style="color: #562bb0"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

