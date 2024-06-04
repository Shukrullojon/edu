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
                        {!! Form::model($cource, ['method' => 'PATCH','route' => ['cource.update', $cource->id]]) !!}
                        <div class="row">

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('name', null, ['autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => "form-control ".($errors->has('name') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="time"><strong>Time(Min):</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('time', null, ['autocomplete'=>'OFF','id'=>'time','placeholder' => 'Time','required'=>true,'class' => "form-control ".($errors->has('time') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('time'))
                                        <span class="error invalid-feedback">{{ $errors->first('time') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="during"><strong>During(Month):</strong></label>{!! Form::label('during',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('during', null, ['autocomplete'=>'OFF','id'=>'during','placeholder' => 'During','required'=>true,'class' => "form-control ".($errors->has('during') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('during'))
                                        <span class="error invalid-feedback">{{ $errors->first('during') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="price"><strong>Price:</strong></label>{!! Form::label('price',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('price', null, ['autocomplete'=>'OFF','id'=>'price','placeholder' => 'Price','required'=>true,'class' => "form-control ".($errors->has('price') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('price'))
                                        <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="filial_id"><strong>Filial:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('filial_id', $filials,$cource->filial_id, ['autocomplete'=>'OFF','id'=>'filial_id','required'=>true,'class' => "form-control ".($errors->has('filial_id') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('filial_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('filial_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('status', \App\Models\Cource::$statuses,$cource->status, ['autocomplete'=>'OFF','id'=>'status','required'=>true,'class' => "form-control ".($errors->has('status') ? 'is-invalid' : '')]) !!}
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
