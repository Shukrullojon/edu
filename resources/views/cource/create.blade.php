@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Cource</h2>
                </div>
            </div>
        </div>
    </div>

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


        {!! Form::open(array('route' => 'cource.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['autocomplete'=>'off','id'=>'name','placeholder' => 'Name','class' => 'form-control']) !!}
                    @error('name')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="time"><strong>Time(min):</strong></label>{!! Form::label('time',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('time', null, ['autocomplete'=>'off','placeholder' => 'Time','id'=>'time','class' => 'form-control']) !!}
                    @error('time')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="during"><strong>During(month):</strong></label>{!! Form::label('during',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('during', null, ['autocomplete'=>'off','placeholder' => 'During','id'=>'during','class' => 'form-control']) !!}
                    @error('during')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="price"><strong>Price:</strong></label>{!! Form::label('price',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('price', null, ['autocomplete'=>'off','placeholder' => 'Price','id'=>'price','class' => 'form-control']) !!}
                    @error('price')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="one_price"><strong>One Price:</strong></label>{!! Form::label('one_price',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('one_price', null, ['autocomplete'=>'off','placeholder' => 'One Price','id'=>'one_price','class' => 'form-control']) !!}
                    @error('one_price')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="info"><strong>Info:</strong></label>
                    {!! Form::textarea('info', null, ['autocomplete'=>'off', 'placeholder' => 'Info','id'=>'info','rows'=>3,'class' => 'form-control']) !!}
                    @error('info')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="filial_id"><strong>Filial:</strong></label>{!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('filial_id', $filials,null, ['id'=>'filial_id','class' => 'form-control']) !!}
                    @error('filial_id')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$courceStatus,null, ['class' => 'form-control']) !!}
                    @error('status')
                    <p style="color: red" class="error">{{ $message }}</p>
                    @enderror
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

