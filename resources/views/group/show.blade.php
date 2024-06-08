@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Group Info</h3>
                            </div>
                            <div class="card-body">
                                <table id="dataTable"
                                       class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                                       user="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $group->name }} </td>
                                    </tr>
                                    <tr>
                                        <th>Hour</th>
                                        <td>{{ date('H:i',strtotime($group->start_hour)) }}
                                            ({{ $group->day->name ?? '' }})
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cource</th>
                                        <td>{{ $group->cource->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Student</th>
                                        <td>{{ $group->max_student }} ({{ count($group->students) }})</td>
                                    </tr>
                                    <tr>
                                        <th>Teacher</th>
                                        <td>{{ $group->max_teacher }} ({{ count($group->teachers) }})</td>
                                    </tr>
                                    <tr>
                                        <th>Filial</th>
                                        <td>{{ $group->filial->name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ \App\Models\Group::$group_status[$group->status] }}</td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Teachers</h3>
                                <div class="card-tools">
                                    <a href="{{ route("group.create_teacher",$group->id) }}"
                                       class="btn btn-success btn-sm float-right">
                                        <span class="fas fa-plus-circle"></span>
                                        Create
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="dataTable"
                                       class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                                       user="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Teacher</th>
                                        <th>Direction</th>
                                        <th>Day</th>
                                        <th>Begin</th>
                                        <th>End</th>
                                        <th>Added</th>
                                        <th>Closed</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    @foreach($group->teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->room->name ?? '' }}</td>
                                            <td>{{ $teacher->teacher->name ?? '' }} {{ $teacher->teacher->surname ?? '' }}</td>
                                            <td>{{ $teacher->direction->name ?? '' }}</td>
                                            <td>{{ $teacher->day->name ?? '' }}</td>
                                            <td>{{ date("H:i",strtotime($teacher->begin_time)) }}</td>
                                            <td>{{ date("H:i", strtotime($teacher->end_time)) }}</td>
                                            <td>{{ date("y.m.d", strtotime($teacher->created_at)) }}</td>
                                            <td>
                                                @if(!empty($teacher->closed_at))
                                                    {{ date("y.m.d", strtotime($teacher->closed_at)) }}
                                                @endif
                                            </td>
                                            <td>{{ \App\Models\GroupTeacher::$group_teacher_status[$teacher->status] }}</td>
                                            <td>
                                                <a class="" href="{{ route("group.teacherDestroy",$teacher->id) }}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Students</h3>
                                <div class="card-tools">
                                    <a href="{{ route("group.create_student",$group->id) }}"
                                       class="btn btn-success btn-sm float-right">
                                        <span class="fas fa-plus-circle"></span>
                                        Create
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="dataTable"
                                       class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                                       user="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Added Time</th>
                                        <th>Closed Time</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    @foreach($group->students as $student)
                                        <tr>
                                            <td>{{ $student->student->name ?? '' }} {{ $student->student->surname ?? '' }}</td>
                                            <td>{{ date("y.m.d", strtotime($student->created_at)) }}</td>
                                            <td>@if($student->closed_at != "0000-00-00")
                                                    {{ date("y.m.d", strtotime($student->closed_at)) }}
                                                @endif</td>
                                            <td>{{ \App\Models\GroupStudent::$group_student_status[$student->status] }}</td>
                                            <td>
                                                <a class="" href="{{ route("group.studentDestroy",$student->id) }}">
                                                    <span class="fa fa-trash" style="color: red"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Schedules</h3>
                            </div>
                            <div class="card-body">
                                <table id="dataTable"
                                       class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                                       user="grid" aria-describedby="dataTable_info">
                                    <thead>
                                    <tr>
                                        <th>Teacher</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                        <th>Direction</th>
                                        <th></th>
                                    </tr>
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->teacher->name ?? '' }} {{ $schedule->teacher->surname ?? '' }}</td>
                                            <td>{{ date("y.m.d", strtotime($schedule->date)) }} </td>
                                            <td>{{ date("H:i", strtotime($schedule->begin_time)) }}
                                                -{{ date("H:i", strtotime($schedule->end_time)) }}</td>
                                            <td>{{ $schedule->room->name ?? '' }}</td>
                                            <td>{{ $schedule->direction->name ?? '' }}</td>
                                            <td>
                                                <a class="" href="{{ route("group.edit_schedule",$schedule->id) }}">
                                                    <span class="fa fa-edit" style=""></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
