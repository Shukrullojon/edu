@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <p>Group Info</p>
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $group->name }} </td>
                                </tr>
                                <tr>
                                    <th>Hour</th>
                                    <td>{{ date('H:i',strtotime($group->start_hour)) }} ({{ $group->day->name ?? '' }})</td>
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

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <p>Teachers</p>
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th>Room</th>
                                    <th>Teacher</th>
                                    <th>Direction</th>
                                    <th>Day</th>
                                    <th>Begin</th>
                                    <th>End</th>
                                </tr>
                                @foreach($group->teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->room->name ?? '' }}</td>
                                        <td>{{ $teacher->teacher->name ?? '' }} {{ $teacher->teacher->surname ?? '' }}</td>
                                        <td>{{ $teacher->direction->name ?? '' }}</td>
                                        <td>{{ $teacher->day->name ?? '' }}</td>
                                        <td>{{ date("H:i",strtotime($teacher->begin_time)) }}</td>
                                        <td>{{ date("H:i", strtotime($teacher->end_time)) }}</td>
                                    </tr>
                                @endforeach
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <p>Students</p>
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Closed Time</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                @foreach($group->students as $student)
                                    <tr>
                                        <td>{{ $student->student->name ?? '' }} {{ $student->student->surname ?? '' }}</td>
                                        <td>@if($student->closed_at != "0000-00-00") {{ date("Y.m.d", strtotime($student->closed_at)) }} @endif</td>
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
        </div>
    </section>
@endsection
