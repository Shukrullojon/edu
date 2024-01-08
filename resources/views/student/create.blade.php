@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Student</h2>
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


        {!! Form::open(array('route' => 'studentStore','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Surname:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Phone:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('phone', null, ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX",'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Parent Phone:</strong>
                    {!! Form::text('parent_phone', null, ['id' => 'parent_phone','placeholder' => "(XX)XXX-XX-XX",'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Group:</strong>
                    {!! Form::select('group_id', $groups, null, ['placeholder' => 'Select a group','class' => 'form-control','data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Event:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('event_id', $events,null, ['placeholder' => 'Select a event','class' => 'form-control', 'data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Placement Category:</strong>
                    {!! Form::select('pc_id', $pcs,null, ['placeholder' => 'Select a category','class' => 'form-control','data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Status:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$studentStatus,null, ['class' => 'form-control', 'data-control'=>"select2"]) !!}
                </div>
            </div>
            <hr style="color: #0c66ea; margin: 5px">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Cource:</strong>
                    {!! Form::select('cource_id', $cources,null, ['placeholder' => 'Select a cource','class' => 'form-control','data-control'=>"select2"]) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Language:</strong>
                    {!! Form::select('langs[]', $langs,[], ['placeholder' => 'Select a language','class' => 'form-control','data-control'=>"select2", 'multiple']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Day:</strong>
                    {!! Form::select('days[]', $days,[], ['placeholder' => 'Select a day','class' => 'form-control','data-control'=>"select2", 'multiple']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Interes Time(18:00):</strong>
                    {!! Form::text('interes_time', null, ['id' => 'interes_time','placeholder' => "xx:xx",'class' => 'form-control']) !!}
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
        $('#parent_phone').inputmask("(99)999-99-99");
    </script>
@endsection
