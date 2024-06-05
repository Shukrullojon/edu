@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Attendance</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($schedule, ['method' => 'PATCH','route' => ['attendance.update', $schedule->id]]) !!}
                        <div class="row">
                            <input type="hidden" name="date" value="{{ $schedule->date }}">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="comment"><strong>Comment:</strong></label>
                                    {!! Form::text('comment', null, ['autocomplete'=>'OFF','id'=>'comment','placeholder' => 'Comment','required'=>true,'class' => "form-control ".($errors->has('comment') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('comment'))
                                        <span class="error invalid-feedback">{{ $errors->first('comment') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('status', \App\Models\GroupSchedule::$schedule_status,$schedule->status, ['autocomplete'=>'OFF','id'=>'status','placeholder' => '','required'=>true,'class' => "form-control ".($errors->has('status') ? 'is-invalid' : '')]) !!}
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
