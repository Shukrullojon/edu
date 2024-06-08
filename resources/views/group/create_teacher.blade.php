@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Teacher</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ["group.store_teacher", $id],'method'=>'POST']) !!}
                            <div id="teacher_append">
                                <div class="div_helper_0">
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="begin_hour"><strong>Hour</strong></label>
                                                        <select name="begin_hour" id="begin_hour" class="form-control">
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="begin_minute"><strong>Begin Min</strong></label>
                                                        <select name="begin_minute" id="begin_hour" class="form-control">
                                                            <option value="00">00</option>
                                                            <option value="15">15</option>
                                                            <option value="30">30</option>
                                                            <option value="45">45</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="end_hour"><strong>End Hour</strong></label>
                                                        <select name="end_hour" id="end_hour" class="form-control">
                                                            <option value="06">06</option>
                                                            <option value="07">07</option>
                                                            <option value="08">08</option>
                                                            <option value="09">09</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="end_min"><strong>End Min</strong></label>
                                                        <select name="end_minute" id="end_minute" class="form-control">
                                                            <option value="00">00</option>
                                                            <option value="15">15</option>
                                                            <option value="30">30</option>
                                                            <option value="45">45</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <label for="teacher"><strong>Teacher</strong></label>
                                                {{--{!! Form::select('teacher_id',$teachers, null, ['id'=>'teacher','class' => 'form-control', 'data-control'=>"select2"]) !!}--}}
                                                <select class="form-control" name="teacher_id">
                                                    <option></option>
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="teacher"><strong>Direction</strong></label>
                                                {!! Form::select('direction_id',$directions, null, ['id'=>'direction','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label for="room"><strong>Room</strong></label>
                                                {!! Form::select('room_id', $rooms,null, ['id'=>'room','class' => 'form-control', 'data-control'=>"select2"]) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <br>
                                            <button type="submit" class="btn btn-primary form-control">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
