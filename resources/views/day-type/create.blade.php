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

        {!! Form::open(array('route' => 'day-type.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label> {!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['autocomplete'=>'off','placeholder' => 'Name','class' => 'form-control']) !!}
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="cource_id"><strong>Days:</strong></label> {!! Form::label('cource_id',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('days[]', \App\Helpers\TypeHelper::$weekDays,null, ['class' => 'form-control','data-control'=>"select2",'id' => 'day_for_type']) !!}
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
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}

    <script language="JavaScript" type="text/javascript">

        $(document).ready(function() {
            $("#day_for_type").select2({
                multiple: true,
            });
        });

    </script>
@endsection
