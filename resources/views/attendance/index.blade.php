@extends('layouts.admin')

@section('content')
    {!! Form::open(array('method'=>'GET')) !!}
    <div class="container-fluid">
        <div class="card card-xl-stretch" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        {!! Form::select('group_id',$groups, null, ['id'=>'group_id','class' => 'form-control', 'data-control'=>"select2"]) !!}
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary form-control">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    @if(!empty($group))
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-row-bordered  gy-3 gs-3">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="min-w-150px" rowspan="2">
                                            <br>
                                            {{ $group->name }}<br>
                                            {{ $group->cource->name }} <br>
                                            Every Day<br>

                                        </td>
                                        @foreach($group->schedules as $schedule)
                                            <td class="min-w-200px" rowspan="2">
                                                <br>
                                                {{ date("Y.m.d", strtotime($schedule->date)) }} <br>
                                                {{ $schedule->plan_teacher->name ?? '' }} {{ $schedule->plan_teacher->surname ?? '' }} <br>
                                                {{ $schedule->teacher->name ?? '--------' }} {{ $schedule->teacher->surname ?? '------' }}<br>
                                                {{ date("H:i", strtotime($schedule->start_date)) }} - {{ date("H:i",strtotime($schedule->end_date)) }}<br>
                                                {{ $schedule->direction->namex }} <br>
                                                Att/Bal/Home/Like<br>
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    @foreach($group->student as $s)
                                        <tr>
                                            <td>{{ $s->student->name ?? '' }} {{ $s->student->surname ?? '' }}</td>
                                            <td>
                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>X</option>
                                                    <option>*</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>1.5</option>
                                                    <option>0</option>
                                                    <option>-1</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>1.5</option>
                                                    <option>0</option>
                                                    <option>-1</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>-1</option>
                                                    <option>!</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>X</option>
                                                    <option>*</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>1.5</option>
                                                    <option>0</option>
                                                    <option>-1</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>1.5</option>
                                                    <option>0</option>
                                                    <option>-1</option>
                                                </select>

                                                <select class="">
                                                    <option></option>
                                                    <option>1</option>
                                                    <option>-1</option>
                                                    <option>!</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
