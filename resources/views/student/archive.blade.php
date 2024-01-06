@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <!--begin::Tables Widget 9-->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Archive Students</span>
                    <span class="text-muted mt-1 fw-bold fs-7">{{ $students->total() }} students</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                     title="Filter">
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                       data-bs-target="#active_student_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter</a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-200px">Name</th>
                            <th class="min-w-150px">Phone</th>
                            <th class="min-w-150px">Event</th>
                            <th class="min-w-150px">Group</th>
                            <th class="min-w-150px">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td><i>{{ $student->name }} {{ $student->surname }}</i></td>
                                <td><i>{{ \App\Helpers\MaskHelper::changePhoneMask($student->phone) }}</i></td>
                                <td><i>{{ $student->event->event->name ?? '' }}</i></td>
                                <td><i>{{ $student->groupList->group->name ?? '' }}({{ $student->groupList->group->cource->name ?? '' }})</i></td>
                                <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="" style="margin-right: 10px" target="_blank"
                                           href="{{ route('studentShow',$student->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a class="" style="margin-right: 2px"
                                           href="{{ route('studentEdit',$student->id) }}">
                                            <span class="fa fa-edit" style="color: #562bb0"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="9">
                                    {{ $students->links() }}
                                </td>
                            </tr>
                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="active_student_filter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"/>
                            </svg>
						</span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="mb-10">
                        {!! Form::open(array('method'=>'GET')) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Phone:</strong>
                                    {!! Form::text('phone', request()->get('phone'), ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'maxlength'=> 13, 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Event:</strong>
                                    {!! Form::select('event_id', $events,request()->get('event_id'), ['placeholder' => 'Select a event','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Group:</strong>
                                    {!! Form::select('group_id', $groups, request()->get('group_id'), ['placeholder' => 'Select a group','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
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
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
