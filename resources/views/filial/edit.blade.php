@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Filial</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($filial, ['method' => 'PATCH','route' => ['filial.update', $filial->id]]) !!}
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('name', null, ['autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => "form-control ".($errors->has('name') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="address"><strong>Address:</strong></label>{!! Form::label('address',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('address', null, ['autocomplete'=>'OFF','id'=>'address','placeholder' => 'Address','required'=>true,'class' => "form-control ".($errors->has('address') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('address'))
                                        <span class="error invalid-feedback">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="phone"><strong>Phone:</strong></label>{!! Form::label('phone',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('phone', null, ['autocomplete'=>'OFF','id'=>'phone','placeholder' => 'Phone','required'=>true,'class' => "form-control ".($errors->has('phone') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('phone'))
                                        <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="room_count"><strong>Room Count:</strong></label>{!! Form::label('room_count',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('room_count', null, ['autocomplete'=>'OFF','id'=>'room_count','placeholder' => 'Room Count','required'=>true,'class' => "form-control ".($errors->has('room_count') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('room_count'))
                                        <span class="error invalid-feedback">{{ $errors->first('room_count') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('status', \App\Models\Filial::$statuses,null, ['autocomplete'=>'OFF','id'=>'status','required'=>true,'class' => "form-control ".($errors->has('status') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('status'))
                                        <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Edit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
