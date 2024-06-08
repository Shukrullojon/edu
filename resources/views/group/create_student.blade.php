@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Student</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ["group.store_student", $id],'method'=>'POST']) !!}
                            <div class="row" id="student_part_show">
                                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px" id="p_2_0">
                                    <div class="form-group">
                                        <p style="margin: 0px">Students</p>
                                        <select class="form-control select2" name="students[]" id="choose_student" multiple="multiple">
                                            <option value=""></option>
                                            @foreach($students as $student)
                                                <option
                                                    value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }} {{ $student->phone }} {{ $student->id_code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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

