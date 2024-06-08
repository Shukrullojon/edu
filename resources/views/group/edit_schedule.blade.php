@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Schedule</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($schedule, ['method' => 'POST','route' => ['group.update_schedule', $schedule->id]]) !!}
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="begin_hour"><strong>Hour</strong></label>
                                                <select name="begin_hour" id="begin_hour" class="form-control">
                                                    <option value="06" @if(date("H", strtotime($schedule->begin_time)) == "06") selected @endif>06</option>
                                                    <option value="07" @if(date("H", strtotime($schedule->begin_time)) == "07") selected @endif>07</option>
                                                    <option value="08" @if(date("H", strtotime($schedule->begin_time)) == "08") selected @endif>08</option>
                                                    <option value="09" @if(date("H", strtotime($schedule->begin_time)) == "09") selected @endif>09</option>
                                                    <option value="10" @if(date("H", strtotime($schedule->begin_time)) == "10") selected @endif>10</option>
                                                    <option value="11" @if(date("H", strtotime($schedule->begin_time)) == "11") selected @endif>11</option>
                                                    <option value="12" @if(date("H", strtotime($schedule->begin_time)) == "12") selected @endif>12</option>
                                                    <option value="13" @if(date("H", strtotime($schedule->begin_time)) == "13") selected @endif>13</option>
                                                    <option value="14" @if(date("H", strtotime($schedule->begin_time)) == "14") selected @endif>14</option>
                                                    <option value="15" @if(date("H", strtotime($schedule->begin_time)) == "15") selected @endif>15</option>
                                                    <option value="16" @if(date("H", strtotime($schedule->begin_time)) == "16") selected @endif>16</option>
                                                    <option value="17" @if(date("H", strtotime($schedule->begin_time)) == "17") selected @endif>17</option>
                                                    <option value="18" @if(date("H", strtotime($schedule->begin_time)) == "18") selected @endif>18</option>
                                                    <option value="19" @if(date("H", strtotime($schedule->begin_time)) == "19") selected @endif>19</option>
                                                    <option value="20" @if(date("H", strtotime($schedule->begin_time)) == "20") selected @endif>20</option>
                                                    <option value="21" @if(date("H", strtotime($schedule->begin_time)) == "21") selected @endif>21</option>
                                                    <option value="22" @if(date("H", strtotime($schedule->begin_time)) == "22") selected @endif>22</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="begin_minute"><strong>Begin Min</strong></label>
                                                <select name="begin_minute" id="begin_minute" class="form-control">
                                                    <option value="00" @if(date("i", strtotime($schedule->begin_time)) == "0") selected @endif>00</option>
                                                    <option value="15" @if(date("i", strtotime($schedule->begin_time)) == "15") selected @endif>15</option>
                                                    <option value="30" @if(date("i", strtotime($schedule->begin_time)) == "30") selected @endif>30</option>
                                                    <option value="45" @if(date("i", strtotime($schedule->begin_time)) == "45") selected @endif>45</option>
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
                                                    <option value="06" @if(date("H", strtotime($schedule->end_time)) == "06") selected @endif>06</option>
                                                    <option value="07" @if(date("H", strtotime($schedule->end_time)) == "07") selected @endif>07</option>
                                                    <option value="08" @if(date("H", strtotime($schedule->end_time)) == "08") selected @endif>08</option>
                                                    <option value="09" @if(date("H", strtotime($schedule->end_time)) == "09") selected @endif>09</option>
                                                    <option value="10" @if(date("H", strtotime($schedule->end_time)) == "10") selected @endif>10</option>
                                                    <option value="11" @if(date("H", strtotime($schedule->end_time)) == "11") selected @endif>11</option>
                                                    <option value="12" @if(date("H", strtotime($schedule->end_time)) == "12") selected @endif>12</option>
                                                    <option value="13" @if(date("H", strtotime($schedule->end_time)) == "13") selected @endif>13</option>
                                                    <option value="14" @if(date("H", strtotime($schedule->end_time)) == "14") selected @endif>14</option>
                                                    <option value="15" @if(date("H", strtotime($schedule->end_time)) == "15") selected @endif>15</option>
                                                    <option value="16" @if(date("H", strtotime($schedule->end_time)) == "16") selected @endif>16</option>
                                                    <option value="17" @if(date("H", strtotime($schedule->end_time)) == "17") selected @endif>17</option>
                                                    <option value="18" @if(date("H", strtotime($schedule->end_time)) == "18") selected @endif>18</option>
                                                    <option value="19" @if(date("H", strtotime($schedule->end_time)) == "19") selected @endif>19</option>
                                                    <option value="20" @if(date("H", strtotime($schedule->end_time)) == "20") selected @endif>20</option>
                                                    <option value="21" @if(date("H", strtotime($schedule->end_time)) == "21") selected @endif>21</option>
                                                    <option value="22" @if(date("H", strtotime($schedule->end_time)) == "22") selected @endif>22</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="end_min"><strong>End Min</strong></label>
                                                <select name="end_minute" id="end_minute" class="form-control">
                                                    <option value="00" @if(date("i", strtotime($schedule->end_time)) == "0") selected @endif>00</option>
                                                    <option value="15" @if(date("i", strtotime($schedule->end_time)) == "15") selected @endif>15</option>
                                                    <option value="30" @if(date("i", strtotime($schedule->end_time)) == "30") selected @endif>30</option>
                                                    <option value="45" @if(date("i", strtotime($schedule->end_time)) == "45") selected @endif>45</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label for="teacher"><strong>Teacher</strong></label>
                                        <select name="teacher_id" class="form-control">
                                            <option></option>
                                            @foreach($teachers as $teacher)
                                                <option @if($teacher->id == $schedule->teacher_id) selected @endif value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
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
