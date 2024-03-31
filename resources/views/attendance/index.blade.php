@extends('layouts.admin')

@section('content')
    {!! Form::open(array('method'=>'GET')) !!}
    <div class="container-fluid">
        <div class="card card-xl-stretch" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::select('group_id',$groups, request()->get('group_id'), ['id'=>'group_id','class' => 'form-control', 'data-control'=>"select2"]) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('start_date', request()->get('start_date'), ['id'=>'start_date','class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-2">
                        {!! Form::date('end_date', request()->get('end_date'), ['id'=>'end_date','class' => 'form-control']) !!}
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
                                                {{ $schedule->plan_teacher->name ?? '' }} {{ $schedule->plan_teacher->surname ?? '' }}
                                                <br>
                                                {{ $schedule->teacher->name ?? '--------' }} {{ $schedule->teacher->surname ?? '------' }}
                                                <br>
                                                {{ date("H:i", strtotime($schedule->start_date)) }}
                                                - {{ date("H:i",strtotime($schedule->end_date)) }} ({{ $schedule->direction->name }})<br>
                                                Att/Home/Bal/Like <input type="checkbox" placeholder="Finish" class="">
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
                                            @foreach($group->schedules as $schedule)
                                                @php $info = $group->info($schedule->id, $s->student->id) @endphp
                                                @if(!empty($info))
                                                    <td>
                                                        <select class="optional_class" name="attendance" id="id_{{$schedule->id}}_{{$s->student->id}}_attendance" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}">
                                                            <option value="1" @if($info->attend == 1) selected @endif>1 ✅</option>
                                                            <option value="0.5" @if($info->attend == 0.5) selected @endif>0.5 ❕</option>
                                                            <option value="0" @if($info->attend == 0) selected @endif>0 ⛔️</option>
                                                            <option value="-1" @if($info->attend == -1) selected @endif>-1 ❌</option>
                                                        </select>

                                                        <select class="optional_class" name="homework" @if($info->attend == -1 or $info->attend == 0) disabled @endif id="id_{{$schedule->id}}_{{$s->student->id}}_homework" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}">
                                                            <option value="1" @if($info->homework == 1) selected @endif>1 ✅</option>
                                                            <option value="1.5" @if($info->homework == 1.5) selected @endif>1.5 🔥</option>
                                                            <option value="0" @if($info->homework == 0) selected @endif>0 ⛔️</option>
                                                            <option value="-1" @if($info->homework == -1) selected @endif>-1 ❌</option>
                                                        </select>

                                                        <select class="optional_class" name="ball" @if($info->attend == -1 or $info->attend == 0) disabled @endif id="id_{{$schedule->id}}_{{$s->student->id}}_ball" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}">
                                                            <option value="0" @if($info->ball == 0) selected @endif>0 ⛔️</option>
                                                            <option value="0.5" @if($info->ball == 0.5) selected @endif>0.5 ❕</option>
                                                            <option value="1" @if($info->ball == 1) selected @endif>1 ✅</option>
                                                        </select>

                                                        <select class="optional_class" name="like" style="" @if($info->attend == -1 or $info->attend == 0) disabled @endif id="id_{{$schedule->id}}_{{$s->student->id}}_like" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}">
                                                            <option value="0" @if($info->like == 0) selected @endif>0 ⛔️</option>
                                                            <option value="1" @if($info->like == 1) selected @endif>1 ✅</option>
                                                            <option value="-1" @if($info->like == -1) selected @endif>-1 ❌</option>
                                                        </select>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endforeach
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

@section('scripts')
    <script>
        $(document).on("change",".optional_class", function () {
            var name = $(this).attr("name");
            var schedule_id = $(this).attr("schedule_id");
            var student_id = $(this).attr("student_id");
            var selected = $(this).val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'{{ route('attendanceOptionalChange') }}',
                data:{
                    'name' : name,
                    'schedule_id' : schedule_id,
                    'student_id' : student_id,
                    'selected' : selected,
                },
                success:function(data) {
                    if(data['status']){
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_homework').val(data['schedule']['attend']);
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_homework').val(data['schedule']['homework']);
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_ball').val(data['schedule']['ball']);
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_like').val(data['schedule']['like']);
                        var disabled = (data['schedule']['attend'] == 0 || data['schedule']['attend'] == -1) ? true : false;
                        $("#id_" + data['schedule']['group_schedule_id'] + '_' + data['schedule']['student_id'] + '_homework').prop('disabled', disabled);
                        $("#id_" + data['schedule']['group_schedule_id'] + '_' + data['schedule']['student_id'] + '_ball').prop('disabled', disabled);
                        $("#id_" + data['schedule']['group_schedule_id'] + '_' + data['schedule']['student_id'] + '_like').prop('disabled', disabled);

                        toastr.options.timeOut = 1500; // 1.5s
                        toastr.success(data['message']);
                    }else{
                        toastr.warning(data['message']);
                    }
                }
            });
        });
    </script>
@endsection
