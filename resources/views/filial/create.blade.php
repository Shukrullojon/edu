@extends('layouts.admin')


@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Filial</h2>
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


        {!! Form::open(array('route' => 'filial.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['placeholder' => 'Name','required' => true, 'maxlength'=> 100,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('address', null, ['placeholder' => 'Address', 'required'=>true,'maxlength'=> 100,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('phone', null, ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Room Count:</strong> {!! Form::label('room_count',"*",['style'=>"color:red"]) !!}
                    {!! Form::number('room_count', null, ['required'=>true,'maxlength'=> 3, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$filialStatus,null, ['required'=>true,'class' => 'form-control']) !!}
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
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
