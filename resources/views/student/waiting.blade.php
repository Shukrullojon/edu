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
                    <span class="card-label fw-bolder fs-3 mb-1">Waiting Students</span>
                    <span class="text-muted mt-1 fw-bold fs-7">{{ $students->total() }} students</span>
                </h3>
                <div style="display: flex">
                    <div class="card-toolbar m-3 for-add-group" style="display: none;" data-bs-toggle="tooltip"
                         data-bs-placement="top" data-bs-trigger="hover"
                         title="">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                           data-bs-target="#add_exists_group">
                            <span class="svg-icon svg-icon-3"></span>
                            <span class="fa fa-plus"></span>
                            Add Group</a>
                    </div>
                    <div class="card-toolbar m-3 for-add-group" style="display: none;" data-bs-toggle="tooltip"
                         data-bs-placement="top" data-bs-trigger="hover"
                         title="">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                           data-bs-target="#add_new_group">
                            <span class="svg-icon svg-icon-3"></span>
                            <span class="fa fa-plus"></span>
                            Add New Group</a>
                    </div>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                         title="Filter">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                           data-bs-target="#active_student_filter">
                            <span class="svg-icon svg-icon-3"></span>
                            <span class="fa fa-filter"></span>
                            Filter</a>
                    </div>
                </div>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed  align-middle">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Event</th>
                            <th>Group</th>
                            <th>Interes</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>
                                    <input type="checkbox" name="student_id_for_group[]" value="{{$student->id}}" onclick="getStudentId()">
                                    <i>{{ $student->name }} {{ $student->surname }}</i>
                                </td>
                                <td><i>{{ \App\Helpers\MaskHelper::changePhoneMask($student->phone) }}</i></td>
                                <td><i>{{ $student->event->event->name ?? '' }}</i></td>
                                <td>
                                    @foreach ($student->groupAllList as $group_list)
                                        <p>
                                            <i>{{ $group_list->group->name ?? '' }}
                                                ({{ $group_list->group->cource->name ?? '' }})</i>

                                        </p>
                                    @endforeach
                                </td>
                                <td>
                                    <ul>
                                        @if($student->cource)
                                            <li>Cource: {{ $student->cource->name }}</li>
                                        @endif

                                        @foreach($student->helperDay as $d)
                                            @if(isset($d->day->name))
                                                <li>{{ $d->day->name }}</li>
                                            @endif
                                        @endforeach

                                        @foreach($student->helperLang as $d)
                                            @if(isset($d->lang->name))
                                                <li>{{ $d->lang->name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>

                                </td>
                                <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>

                                <td>
                                    <div class="btn-group">

                                        <a style="margin-right:10px; color:green" data-bs-toggle="modal"
                                           data-bs-target="#student_payment{{ $student->id }}" style="margin-right: 2px"
                                           href="">
                                            <span class="fa fa-credit-card"></span>
                                        </a>

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

                            <div class="modal fade" id="student_payment{{ $student->id }}" tabindex="-1"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-900px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2></h2>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                 data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                              rx="1"
                                                              transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-body py-lg-10 px-lg-10">
                                            <div
                                                class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                                                id="kt_modal_create_app_stepper">
                                                <form action="{{ route('studentPayUpdate') }}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                        <input type="hidden" name="group_id"
                                                               value="{{ $student->groupList->group_id ?? 0 }}">
                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Amount:</strong></label>
                                                                <input type="number" min="1" name="amount"
                                                                       value="{{ $student->groupList->group->cource->price ?? 0 }}"
                                                                       placeholder="Amount" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Pay Amount:</strong></label>
                                                                <input type="number" min="1" name="pay_amount" value="0"
                                                                       placeholder="Pay Amount" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Month(202312):</strong></label>
                                                                <input type="text" min="1" name="month" value=""
                                                                       placeholder="Month" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Days:</strong></label>
                                                                <input type="number" min="1" name="days" value="0"
                                                                       placeholder="Days" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Type:</strong></label>
                                                                <select class="form-control" name="type">
                                                                    @foreach(\App\Helpers\TypeHelper::$paymentType as $key => $t)
                                                                        <option value="{{ $key }}">{{ $t }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Status:</strong></label>
                                                                <select class="form-control" name="status">
                                                                    @foreach(\App\Helpers\StatusHelper::$payStatus as $key => $t)
                                                                        <option value="{{ $key }}">{{ $t }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary form-control"
                                                                style="margin-left: 10px; margin-top:10px">Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <div class="modal fade" id="add_exists_group" tabindex="-1" aria-hidden="true">
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
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="mb-10">
                        {!! Form::open(array('route' => 'studentAddGroup','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Group:</strong>
                                    {!! Form::select('group_id', $groups, request()->get('group_id'), ['placeholder' => 'Select a group','class' => 'form-control','required']) !!}
                                </div>
                            </div>

                            <input type="text" name="student_id" hidden id="hidden_check">

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

    <div class="modal fade" id="add_new_group" tabindex="-1" aria-hidden="true">
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
                        {!! Form::open(array('route' => 'studentAddNewGroup','method'=>'POST')) !!}
                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label
                                        for="name"><strong>Name:</strong></label> {!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('name', null, ['autocomplete'=>'off','placeholder' => 'Name','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><strong>Start Time</strong></label>
                                    <div class="input-group" id="kt_td_picker_custom_icons2"
                                         data-td-target-input="nearest"
                                         data-td-target-toggle="nearest">
                                        <input name="start_time" id="kt_td_picker_custom_icons2_input" type="text"
                                               class="form-control"
                                               data-td-target="#kt_td_picker_custom_icons2"/>
                                        <span class="input-group-text" data-td-target="#kt_td_picker_custom_icons2"
                                              data-td-toggle="datetimepicker">
                                            <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group"><label for="type"><strong>Type:</strong></label>
                                    {!! Form::label('type',"*",['style'=>"color:red"]) !!}
                                    {{--{!! Form::select('type', $day_type,null, ['id'=>'type','class' => 'form-control','data-control'=>"select2"]) !!}--}}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="max_student"><strong>Max
                                            Student:</strong></label> {!! Form::label('max_student',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('max_student', null, ['id'=>'max_student','placeholder' => 'Max student','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="max_teacher"><strong>Max
                                            Teacher:</strong></label> {!! Form::label('max_teacher',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('max_teacher', null, ['id'=>'max_teacher','placeholder' => 'Max Teacher','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label
                                        for="cource_id"><strong>Cource:</strong></label> {!! Form::label('cource_id',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('cource_id', $cources,null, ['id'=>'cource_id','class' => 'form-control','data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label
                                        for="filial_id"><strong>Filial:</strong></label> {!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('filial_id', $filials,null, ['id' => 'filial_id','class' => 'form-control','data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label
                                        for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('status', \App\Helpers\StatusHelper::$groupStatus ,null, ['id'=>'status','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <input type="text" name="student_id" hidden id="hidden_check_new">

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

        function getStudentId() {
            var values = [];
            $('input[name="student_id_for_group[]"]:checked').each(function () {
                values[values.length] = (this.checked ? $(this).val() : "");
            });

            if (values.length > 0) {
                $('.for-add-group').css('display', '');
            } else {
                $('.for-add-group').css('display', 'none');
            }

            $('#hidden_check').val(values);
            $('#hidden_check_new').val(values);

        }

        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_custom_icons2"), {
            display: {
                icons: {
                    time: "ki-outline ki-time fs-1",
                    date: "ki-outline ki-calendar fs-1",
                    up: "ki-outline ki-up fs-1",
                    down: "ki-outline ki-down fs-1",
                    previous: "ki-outline ki-left fs-1",
                    next: "ki-outline ki-right fs-1",
                    today: "ki-outline ki-check fs-1",
                    clear: "ki-outline ki-trash fs-1",
                    close: "ki-outline ki-cross fs-1",
                },
                buttons: {
                    today: true,
                    clear: true,
                    close: true,
                },
            }
        });

        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"), {
            //put your config here
        });

    </script>
@endsection
