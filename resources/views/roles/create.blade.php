@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Role</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'roles.store','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label
                                        for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('name', null, ['autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => "form-control ".($errors->has('name') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            @foreach($permission as $value)
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label>{{ Form::checkbox('permission[]', $value->name, false, ['class' => '']) }} {{ $value->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                            @if($errors->has('permission'))
                                <span class="error invalid-feedback">{{ $errors->first('permission') }}</span>
                            @endif


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
