@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Group</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'group.store','method'=>'POST']) !!}
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label><strong>Start Hour</strong></label>
                                            <select class="form-control" name="start_hour">
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label><strong>Minute</strong></label>
                                            <select class="form-control" name="start_minute">
                                                <option value="00">00</option>
                                                <option value="15">15</option>
                                                <option value="30">30</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group"><label for="day_id"><strong>Day:</strong></label>
                                    {!! Form::label('day_id',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('day_id',$days,null, ['id'=>'day_id','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group"><label for="Language"><strong>Language:</strong></label>
                                    {!! Form::label('Language',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('lang_id',$langs,null, ['id'=>'Language','class' => 'form-control']) !!}
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
                                    {!! Form::select('status', \App\Models\Group::$group_status,null, ['id'=>'status','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" name="teacher_counter" value="2" id="teacher_counter">
                        <div class="row" id="teacher_part" style="display: none">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="begin_hour"><strong>Hour</strong></label>
                                            <select name="teacher[2][begin_hour]" id="begin_hour" class="form-control begin_hour_class">
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="begin_minute"><strong>Begin Min</strong></label>
                                            <select name="teacher[2][begin_minute]" id="begin_minute" class="form-control begin_minute_class">
                                                <option value="00">00</option>
                                                <option value="15">15</option>
                                                <option value="30">30</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="end_hour"><strong>End Hour</strong></label>
                                            <select name="teacher[2][end_hour]" id="end_hour" class="form-control end_hour_class">
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="begin_minute"><strong>End Min</strong></label>
                                            <select name="teacher[2][end_minute]" id="end_minute" class="form-control end_minute_class">
                                                <option value="00">00</option>
                                                <option value="15">15</option>
                                                <option value="30">30</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="teacher"><strong>Teacher</strong></label>
                                    {!! Form::select('teacher[2][teacher_id]',$teachers, null, ['id'=>'teacher','class' => 'form-control teacher_id_class', 'data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="direction_id"><strong>Direction</strong></label>
                                    {!! Form::select('teacher[2][direction_id]',$directions, null, ['id'=>'direction_id','class' => 'form-control direction_id_class']) !!}
                                </div>
                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="form-group">
                                    <label for="room_id"><strong>Room</strong></label>
                                    {!! Form::select('teacher[2][room_id]', $rooms,null, ['id'=>'room_id','class' => 'form-control room_id_class']) !!}
                                </div>
                            </div>
                        </div>

                        <div id="teacher_append">
                            <div class="div_helper_0">
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="begin_hour"><strong>Hour</strong></label>
                                                    <select name="teacher[1][begin_hour]" id="begin_hour" class="form-control">
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="begin_minute"><strong>Begin Min</strong></label>
                                                    <select name="teacher[1][begin_minute]" id="begin_hour" class="form-control">
                                                        <option value="00">00</option>
                                                        <option value="15">15</option>
                                                        <option value="30">30</option>
                                                        <option value="45">45</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="end_hour"><strong>End Hour</strong></label>
                                                    <select name="teacher[1][end_hour]" id="end_hour" class="form-control">
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="end_min"><strong>End Min</strong></label>
                                                    <select name="teacher[1][end_minute]" id="end_minute" class="form-control">
                                                        <option value="00">00</option>
                                                        <option value="15">15</option>
                                                        <option value="30">30</option>
                                                        <option value="45">45</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="teacher"><strong>Teacher</strong></label>
                                            {!! Form::select('teacher[1][teacher_id]',$teachers, null, ['id'=>'teacher','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="teacher"><strong>Direction</strong></label>
                                            {!! Form::select('teacher[1][direction_id]',$directions, null, ['id'=>'direction','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="room"><strong>Room</strong></label>
                                            {!! Form::select('teacher[1][room_id]', $rooms,null, ['id'=>'room','class' => 'form-control', 'data-control'=>"select2"]) !!}
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

                        <hr style="margin: 0px">
                        <input type="hidden" name="student_counter" value="1" id="student_counter">
                        <div class="row" id="student_part_show">
                            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px" id="p_2_0">
                                <div class="form-group">
                                    <p style="margin: 0px">Students</p>
                                    <select class="form-control select2" name="students[]" id="choose_student" multiple="multiple">
                                        <option value=""></option>
                                        @foreach($students as $student)
                                            <option
                                                value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }} {{ $student->phone }} {{ $student->id_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).on("click", ".btn_plus_teacher", function () {
            var teacher_counter = parseInt($("#teacher_counter").val());
            teacher_counter ++;
            console.log(teacher_counter);
            var part = $("#teacher_part").html();
            $("#teacher_append").append(
                '<div class="div_helper_' + teacher_counter + '"><div class="row">' + part +
                '<div class="col-xs-2 col-sm-2 col-md-2"><div class="form-group"><br><p class="btn btn-success btn_plus_teacher"><i class="fa fa-plus"></i></p> <p class="btn btn-danger"><i class="fa fa-minus"></i></p></div></div><div></div>'
            );
            $('#begin_hour').attr('name', 'teacher[' + teacher_counter + '][begin_hour]');
            $('#begin_minute').attr('name', 'teacher[' + teacher_counter + '][begin_minute]');
            $('#end_hour').attr('name', 'teacher[' + teacher_counter + '][end_hour]');
            $('#end_minute').attr('name', 'teacher[' + teacher_counter + '][end_minute]');
            $('#teacher').attr('name', 'teacher[' + teacher_counter + '][teacher_id]');
            $('#direction_id').attr('name', 'teacher[' + teacher_counter + '][direction_id]');
            $('#room_id').attr('name', 'teacher[' + teacher_counter + '][room_id]');
            $("#teacher_counter").val(teacher_counter);
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

