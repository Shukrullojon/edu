@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit User</h2>
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


        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="surname"><strong>Surname:</strong></label>{!! Form::label('surname',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('surname', null, ['autocomplete'=>'OFF','id'=>'surname','placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label
                        for="phone"><strong>Phone:</strong></label> {!! Form::label('phone',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('phone', null, ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label
                        for="email"><strong>Email:</strong></label>
                    {!! Form::text('email', null, ['autocomplete'=>'OFF','id'=>'email','placeholder' => 'Email','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="start"><strong>Start Time: (08:00)</strong></label>
                    {!! Form::text('start', null, ['id' => 'start','placeholder' => "", 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="end"><strong>End Time: (16:00)</strong></label>
                    {!! Form::text('end', null, ['id' => 'end', 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="salary"><strong>Salary:</strong></label>
                    {!! Form::text('salary', null, ['placeholder'=>'Salary', 'id' => 'salary', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="kpi"><strong>KPI:</strong></label>
                    {!! Form::text('kpi', null, ['placeholder'=>'KPI','id' => 'kpi', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="hourly"><strong>Hourly:</strong></label>
                    {!! Form::text('hourly', null, ['placeholder'=>'Hourly','id' => 'hourly', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="add_student"><strong>Add Student(%):</strong></label>
                    {!! Form::text('add_student', null, ['placeholder'=>'Add Student','id' => 'add_student', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="active_student"><strong>Active Student(%):</strong></label>
                    {!! Form::text('active_student', null, ['placeholder'=>'Active Student', 'id' => 'active_student', 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="password"><strong>Password:</strong></label>{!! Form::label('password',"*",['style'=>"color:red"]) !!}
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

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label
                        for="role"><strong>Role:</strong></label>{!! Form::label('role',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('roles[]', $roles,$userRole, ['id'=>'role','class' => 'form-control','multiple', 'data-control'=>'select2']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="direction"><strong>Directions:</strong></label>
                    {!! Form::select('directions[]', $directions,$user->directions, ['id'=>'direction','required'=>true,'data-control'=>'select2','class' => 'form-control form-select-solid','multiple']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="lang"><strong>Langs:</strong></label>
                    {!! Form::select('langs[]', $langs,$user->langs, ['id'=>'lang','required'=>true,'data-control'=>'select2','class' => 'form-control form-select-solid','multiple']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label
                        for="status"><strong>Status:</strong></label> {!! Form::label('status',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status',\App\Helpers\StatusHelper::$adminStatus, null, ['id' => 'status','required'=>true, 'class' => 'form-control']) !!}
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
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
