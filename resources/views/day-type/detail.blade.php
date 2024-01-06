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

            {!! Form::model($group, ['method' => 'POST','route' => ['groupDetail', $group->id]]) !!}
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="room_id"><strong>Room:</strong></label>
                            {!! Form::select('room_id', $rooms,null, ['id'=>'room_id', 'class' => 'form-control', 'data-control'=>"select2"]) !!}
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="teacher_id"><strong>Teacher:</strong></label>
                            {!! Form::select('teacher_id', $teachers,null, ['id'=>'teacher_id','class' => 'form-control', 'data-control'=>"select2"]) !!}
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label
                                for="status"><strong>Status:</strong></label>
                            {!! Form::select('status', \App\Helpers\StatusHelper::$roomVsTeacherStatus,null, ['id'=>'status','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="begin_time"><strong>Begin
                                    Time:(12:00:00)</strong></label>
                            {!! Form::text('begin_time', null, ['id'=>'begin_time','placeholder' => 'xx:xx:xx','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="end_time"><strong>End Time:(13:00:00)</strong></label>
                            {!! Form::text('end_time', null, ['id'=>'end_time','placeholder' => 'xx:xx:xx','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="type"><strong>Type</strong></label>
                            {!! Form::select('type_detail', \App\Helpers\TypeHelper::$detailType ,null, ['id'=>'type','class' => 'form-control', 'data-control'=>"select2"]) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"><label for="amount"><strong>Amount</strong></label>
                            {!! Form::text('amount', null, ['id'=>'amount','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label
                                for="comment"><strong>Comment</strong></label>
                            {!! Form::textarea('comment', null, ['rows'=>3,'id'=>'comment','placeholder' => 'Comment','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <br>
                        <button type="submit"
                                class="btn btn-primary form-control">Submit
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
@endsection
