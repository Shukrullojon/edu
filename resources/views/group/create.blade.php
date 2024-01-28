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
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

    <script language="JavaScript" type="text/javascript">
        //$("#start_time").inputmask("yyyy-mm-dd hh:mm:ss");
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
