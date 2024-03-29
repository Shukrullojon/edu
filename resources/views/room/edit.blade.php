@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Room</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {!! Form::model($room, ['method' => 'PATCH','route' => ['room.update', $room->id]]) !!}
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="filial_id"><strong>Filial:</strong></label> {!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('filial_id', $filials,null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$roomStatus,null, ['class' => 'form-control']) !!}
                </div>
            </div>

            {{--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tasks:</strong>
                    <br/>
                    @foreach($tasks as $task)
                        <label>{{ Form::checkbox('tasks[]', $task->id, false, array('class' => 'name')) }}
                            {{ $task->name }}</label>
                        <br/>
                    @endforeach
                </div>
            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
