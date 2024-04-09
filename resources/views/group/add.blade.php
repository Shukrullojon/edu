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

        {!! Form::model($group, ['method' => 'POST','route' => ['groupStdAdd', $group->id]]) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="student_id"><strong>Student:</strong></label> {!! Form::label('student_id',"*",['style'=>"color:red"]) !!}
                        <select name="student_id" id="student_id" class="form-control" data-control="select2">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name." ".$student->surname." ".$student->id_code }}</option>
                            @endforeach
                        </select>
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
