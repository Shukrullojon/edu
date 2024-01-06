@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

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

        {!! Form::model($user, ['method' => 'PATCH','route' => ['userchangeupdate']]) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name"><strong>Name:</strong></label>
                    {!! Form::text('name', null, ['readonly' => 'readonly','disabled'=>'disabled','autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="surname"><strong>Surname:</strong></label>
                    {!! Form::text('surname', null, ['readonly' => 'readonly','disabled'=>'disabled','autocomplete'=>'OFF','id'=>'surname','placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="phone"><strong>Phone:</strong></label>
                    {!! Form::text('phone', null, ['readonly' => 'readonly','disabled'=>'disabled','id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="email"><strong>Email:</strong></label>
                    {!! Form::text('email', null, ['readonly' => 'readonly','disabled'=>'disabled','autocomplete'=>'OFF','id'=>'email','placeholder' => 'Email','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label
                        for="currenct_password"><strong>Current Password:</strong></label>{!! Form::label('currenct_password',"*",['style'=>"color:red"]) !!}
                    {!! Form::password('currenct_password', ['autocomplete'=>'OFF','id'=>'currenct_password','placeholder' => 'Current Password','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="password"><strong>New Password:</strong></label>{!! Form::label('password',"*",['style'=>"color:red"]) !!}
                    {!! Form::password('password', ['autocomplete'=>'OFF','id'=>'password','placeholder' => 'Password','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="confirm-password"><strong>Confirm
                            Password:</strong></label>{!! Form::label('confirm-password',"*",['style'=>"color:red"]) !!}
                    {!! Form::password('confirm-password', ['autocomplete'=>'OFF','id'=>'confirm-password','placeholder' => 'Confirm Password','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
