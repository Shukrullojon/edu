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

        {!! Form::model($group, ['method' => 'PATCH','route' => ['group.update', $group->id]]) !!}
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
                    <label for="start_time"><strong>Start
                            Time:</strong></label> {!! Form::label('start_time',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('start_time', null, ['placeholder' => 'YYYY-mm-dd HH:mm:ss','class' => 'form-control','id' => 'start_time']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="type"><strong>Type:</strong></label> {!! Form::label('type',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('type', \App\Helpers\TypeHelper::$groupDayType,null, ['id'=>'type','class' => 'form-control']) !!}
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
                    <label for="max_teacher"><strong>Max Teacher:</strong></label> {!! Form::label('max_teacher',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('max_teacher', null, ['id'=>'max_teacher','placeholder' => 'Max Teacher','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="cource_id"><strong>Cource:</strong></label> {!! Form::label('cource_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('cource_id', $cources,null, ['id'=>'cource_id','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="filial_id"><strong>Filial:</strong></label> {!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('filial_id', $filials,null, ['id' => 'filial_id','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$groupStatus ,null, ['id'=>'status','class' => 'form-control']) !!}
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
    <script>
        $("#start_time").inputmask("yyyy-mm-dd hh:mm:ss");
    </script>
@endsection
