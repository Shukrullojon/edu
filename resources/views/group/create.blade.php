@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(array('route' => 'group.store','method'=>'POST')) !!}
        <hr>
        <h3>Group Info</h3>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label> {!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['autocomplete'=>'off','placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label><strong>Start Date(01.01.2024)</strong></label>
                    {!! Form::date('start_date', null, ['autocomplete'=>'off','placeholder' => 'Start date','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label><strong>Start Hour(18:00)</strong></label>
                    {!! Form::time('start_hour', null, ['autocomplete'=>'off','placeholder' => 'Start hour','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group"><label for="type"><strong>Type:</strong></label>
                    {!! Form::label('type',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('type[]',$days,null, ['id'=>'type','class' => 'form-control','data-control'=>"select2", 'multiple']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="max_student"><strong>Max
                            Student:</strong></label> {!! Form::label('max_student',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('max_student', null, ['id'=>'max_student','placeholder' => 'Max student','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="max_teacher"><strong>Max
                            Teacher:</strong></label> {!! Form::label('max_teacher',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('max_teacher', null, ['id'=>'max_teacher','placeholder' => 'Max Teacher','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="cource_id"><strong>Cource:</strong></label> {!! Form::label('cource_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('cource_id', $cources,null, ['id'=>'cource_id','class' => 'form-control','data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="filial_id"><strong>Filial:</strong></label> {!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('filial_id', $filials,null, ['id' => 'filial_id','class' => 'form-control','data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$groupStatus ,null, ['id'=>'status','class' => 'form-control', 'data-control'=>"select2"]) !!}
                </div>
            </div>
        </div>

        <br> <br>
        <hr>
        <h3>Teachers</h3>
        <input type="hidden" name="teacher_counter" value="1" id="teacher_counter">
        <div class="row" id="teacher_part" style="display: none">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <label for="begin_time"><strong>Begin Time</strong></label>
                    {!! Form::time('teacher[0][begin_time]', null, ['id'=>'begin_time','class' => 'form-control begin_time_class']) !!}
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    <label for="end_time"><strong>End Time</strong></label>
                    {!! Form::time('teacher[0][end_time]', null, ['id'=>'end_time','class' => 'form-control end_time_class']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="teacher"><strong>Teacher</strong></label>
                    {!! Form::select('teacher[0][teacher_id]',$teachers, null, ['id'=>'teacher','class' => 'form-control teacher_id_class', 'data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="room"><strong>Room</strong></label>
                    {!! Form::select('teacher[0][room_id]', $rooms,null, ['id'=>'room','class' => 'form-control room_id_class', 'data-control'=>"select2"]) !!}
                </div>
            </div>
        </div>

        <div id="teacher_append">
            <div class="div_helper_0">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="begin_time"><strong>Begin Time</strong></label>
                            {!! Form::time('teacher[0][begin_time]', null, ['id'=>'begin_time','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="end_time"><strong>End Time</strong></label>
                            {!! Form::time('teacher[0][end_time]', null, ['id'=>'end_time','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="teacher"><strong>Teacher</strong></label>
                            {!! Form::select('teacher[0][teacher_id]',$teachers, null, ['id'=>'teacher','class' => 'form-control', 'data-control'=>"select2"]) !!}
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="room"><strong>Room</strong></label>
                            {!! Form::select('teacher[0][room_id]', $rooms,null, ['id'=>'room','class' => 'form-control', 'data-control'=>"select2"]) !!}
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <br>
                            <p class="btn btn-success btn_plus_teacher"><i class="fa fa-plus"></i></p>
                            <p class="btn btn-danger"><i class="fa fa-minus"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <div class="btn-group">
            <h3 style="margin-top: 10px">Students</h3>
            <p class="btn btn-success student_add_new" style="margin-left: 20px"><i class="fa fa-plus"></i></p>
        </div>

        <input type="hidden" name="student_counter" value="1" id="student_counter">

        <div class="row" id="student_part" style="display: none">
            <div class="form-group">
                <select class="form-control student_select2" name="students[]" id="choose_student">
                    <option value="">Select students</option>
                    @foreach($students as $student)
                        <option
                            value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }} {{ $student->phone }} {{ $student->id_code }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row" id="student_part_show">
            <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 10px" id="p_2_0">
                <div class="form-group">
                    <select class="form-control student_select2" name="students[]" id="choose_student"
                            data-control="select2">
                        <option value="">Select students</option>
                        @foreach($students as $student)
                            <option
                                value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }} {{ $student->phone }} {{ $student->id_code }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1" style="margin-top: 10px" id="p_1_0">
                <div class="form-group">
                    <p class="btn btn-danger btn_danger" unk_id="0"><i class="fa fa-minus"></i></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).on("click", ".btn_plus_teacher", function () {
            var teacher_counter = $("#teacher_counter").val();
            var part = $("#teacher_part").html();
            $("#teacher_append").append(
                '<div class="div_helper_' + teacher_counter + '"><div class="row">' + part +
                '<div class="col-xs-2 col-sm-2 col-md-2"><div class="form-group"><br><p class="btn btn-success btn_plus_teacher"><i class="fa fa-plus"></i></p> <p class="btn btn-danger"><i class="fa fa-minus"></i></p></div></div><div></div>'
            );
            $('#teacher_append:last').find('.begin_time_class').attr('name', 'teacher[' + teacher_counter + '][begin_time]');
            $('#teacher_append:last').find('.end_time_class').attr('name', 'teacher[' + teacher_counter + '][end_time]');
            $('#teacher_append:last').find('.teacher_id_class').attr('name', 'teacher[' + teacher_counter + '][teacher_id]');
            $('#teacher_append:last').find('.room_id_class').attr('name', 'teacher[' + teacher_counter + '][room_id]');

            $('.teacher_id_class').select2();
            $('.room_id_class').select2();
            $("#teacher_counter").val(++teacher_counter);
        });

        $(document).on("click", ".student_add_new", function () {
            var part = $("#student_part").html();
            var student_counter = $("#student_counter").val();
            $("#student_part_show").append(
                '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 10px" id="p_2_' + student_counter + '">'
                + part + '</div>');
            $("#student_part_show").append(
                '<div class="col-xs-1 col-sm-1 col-md-1" style="margin-top: 10px" id="p_1_' + student_counter + '"><div class="form-group"><p class="btn btn-danger btn_danger" unk_id="' + student_counter + '"><i class="fa fa-minus"></i></p></div>');
            $('.student_select2').select2();
            $("#student_counter").val(++student_counter);
        });

        $(document).on("click", ".btn_danger", function () {
            var unk_id = $(this).attr("unk_id");
            $("#p_2_" + unk_id).css('display', 'none');
            $("#p_1_" + unk_id).css('display', 'none');
        });

        new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_custom_icons"), {
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
