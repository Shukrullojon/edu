@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="">
        <div class="card card-xl-stretch mb-12 mb-xl-12">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Info: </span>
                </h3>
            </div>
            <div class="card-body py-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Max Student</th>
                        <th>Max Teacher</th>
                        <th>Start Date</th>
                        <th>Start Hour</th>
                        <th>Cource</th>
                        <th>Filial</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            @if (isset($group->types))
                                <ul>
                                    @foreach($group->types as $t)
                                        <li>{{ $t->name }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>{{ $group->max_student }} ({{ $group->stdCount->number }})</td>
                        <td>{{ $group->max_teacher }} ({{ $group->teacherCount->number ?? 0 }})</td>
                        <td>{{ date('Y-m-d',strtotime($group->start_date)) }}</td>
                        <td>{{ date('h:i',strtotime($group->start_hour)) }}</td>
                        <td>{{ $group->cource->name ?? '' }}</td>
                        <td>{{ $group->filial->name ?? '' }}</td>
                        <td>{{ \App\Helpers\StatusHelper::groupStatusGet($group->status) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-6 mb-xl-6" id="kt_profile_details_view" style="">
        <div class="card card-xl-stretch mb-6 mb-xl-6">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Details: ({{ count($group->detail) }})</span>
                </h3>

                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Details Add">
                    <a href="{{ route('groupDetail', $group->id) }}"
                       class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
                        <span class="fa fa-plus-circle"></span>
                    </a>
                </div>
            </div>
            <div class="card-body py-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Room</th>
                        <th>Teacher</th>
                        <th>Begin</th>
                        <th>End</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>
                    @foreach($group->detail as $d)
                        <tr>
                            <td>{{ $d->room->name ?? '' }}</td>
                            <td>{{ $d->teacher->name ?? '' }}</td>
                            <td>{{ date('H:i', strtotime($d->begin_time)) }}</td>
                            <td>{{ date('H:i', strtotime($d->end_time)) }}</td>
                            <td>{{ \App\Helpers\TypeHelper::getDetailType($d->type) }}</td>
                            <td>
                                @if(!empty($d->amount))
                                    {{ number_format($d->amount,0,' ',' ') }} UZS
                                @endif
                            </td>
                            <td>
                                @if(!empty($d->comment))
                                    {!! $d->comment !!}
                                @endif
                            </td>
                            <td>{{ \App\Helpers\StatusHelper::roomVsTeacherStatusGet($d->status) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-6 mb-xl-6" id="kt_profile_details_view" style="">
        <div class="card card-xl-stretch mb-6 mb-xl-6">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Students: ({{ count($group->student) }})</span>
                </h3>

                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Student Add">
                    <a href="{{ route('groupStdAdd', $group->id) }}"
                       class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary">
                        <span class="fa fa-plus-circle"></span>
                    </a>
                </div>
            </div>
            <div class="card-body py-0">
                <table class="table table-bordered">
                    <tr>
                        <th>№</th>
                        <th>Name</th>
                        <th>Event</th>
                    </tr>
                    @php $i=1; @endphp
                    @foreach($group->student as $s)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <a href="{{ route('studentShow',$s->student->id ?? 0) }}"
                                   class="fw-bolder text-gray-800 text-hover-primary fs-6">
                                    {{ $s->student->name }}
                                </a>
                            </td>
                            <td>
                                {{ $s->student->event->event->name ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_room" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Room and Teacher</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="currentColor"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="currentColor"/>
								</svg>
							</span>
                    </div>
                </div>

                <div class="modal-body py-lg-10 px-lg-10">
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                         id="kt_modal_create_app_stepper">
                        {!! Form::open(array('route' => 'groupdetailstore','method'=>'POST')) !!}
                        {!! Form::hidden('group_id', $group->id,null, ['class' => 'form-control']) !!}
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="room_id"><strong>Room:</strong></label>
                                    {!! Form::select('room_id', $rooms,null, ['id'=>'room_id', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="teacher_id"><strong>Teacher:</strong></label>
                                    {!! Form::select('teacher_id', $teachers,null, ['id'=>'teacher_id','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="status"><strong>Status:</strong></label>
                                    {!! Form::select('status', \App\Helpers\StatusHelper::$roomVsTeacherStatus,null, ['id'=>'status','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="begin_time"><strong>Begin Time:(12:00:00)</strong></label>
                                    {!! Form::text('begin_time', null, ['id'=>'begin_time','placeholder' => 'xx:xx:xx','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="end_time"><strong>End Time:(13:00:00)</strong></label>
                                    {!! Form::text('end_time', null, ['id'=>'end_time','placeholder' => 'xx:xx:xx','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_student" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add Student</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="currentColor"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="currentColor"/>
								</svg>
							</span>
                    </div>
                </div>

                <div class="modal-body py-lg-10 px-lg-10">
                    {!! Form::open(array('route' => 'groupstudentstore','method'=>'POST')) !!}

                    {!! Form::hidden('group_id', $group->id,null, ['class' => 'form-control']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Student:</strong>
                                {!! Form::select('student_id', $students,null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {!! Form::select('status', [1 => 'Active', 0=>'Close'],null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <br>
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#begin_time').inputmask("99:99:99");
        $('#end_time').inputmask("99:99:99");
    </script>
@endsection
