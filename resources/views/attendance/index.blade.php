@extends('layouts.admin')

@section('content')
    {!! Form::open(array('method'=>'GET')) !!}
    <div class="container-fluid">
        <div class="card card-xl-stretch" style="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::select('group_id',$groupAll, request()->get('group_id'), ['placeholder' => 'Select','id'=>'group_id','class' => 'form-control btn-sm', 'data-control'=>"select2"]) !!}
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm form-control">Find</button>
                    </div>
                    <div class="col-md-9">
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a href="{{ route("attendanceIndex") }}" class="nav-link @if(empty(request()->get('day_id'))) active @endif">All</a>
                            </li>
                            @foreach($days as $day)
                                <li class="nav-item">
                                    <a href="{{ route("attendanceIndex",['day_id' => $day->id]) }}" class="nav-link @if(request()->get('day_id') == $day->id) active @endif">{{ $day->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    @if(!empty($groups))
        @foreach($groups as $group)
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="">
                        <div class="card-body">
                            <div class="table-bordered">
                                <table class="table table-bordered  gy-3 gs-3">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <tr style="width: 20px">
                                        <td rowspan="2">
                                            <br>
                                            {{ $group->name }}<br>
                                            {{ $group->cource->name }} <br>
                                            {{ $group->types() }} <br>
                                            {{--Every Day<br>--}}

                                        </td>
                                        @foreach($group->schedules as $schedule)
                                            <td class="" rowspan="2">
                                                <br>
                                                {{ date("Y.m.d", strtotime($schedule->date)) }}<br>
                                                {{ substr($schedule->plan_teacher->name ?? '',0,5) }} {{ substr($schedule->plan_teacher->surname ?? '',0,5) }}<br>
                                                {{ $schedule->teacher->name ?? '----' }} {{ $schedule->teacher->surname ?? '----' }}<br>
                                                {{ date("H:i", strtotime($schedule->start_date)) }}-{{ date("H:i",strtotime($schedule->end_date)) }}<br>
                                                {{ $schedule->direction->name }}<br>
                                                Att.Hom.Bal
                                            </td>
                                        @endforeach
                                    </tr>
                                    <tr style="width: 20px">
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    @foreach($group->student as $s)
                                        <tr style="width: 20px">
                                            <td>{{ $s->student->name ?? '' }} {{ $s->student->surname ?? '' }}</td>
                                            @foreach($group->schedules as $schedule)
                                                @php $info = $group->info($schedule->id ?? 0, $s->student->id ?? 0) @endphp
                                                @if(!empty($info))
                                                    <td>
                                                        <select class="optional_class my_select_class" name="attendance" id="id_{{$schedule->id}}_{{$s->student->id}}_attendance" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}" @if((strtotime($schedule->date) > strtotime(date("Y-m-d")) or $info->attend == -1) or (strtotime($schedule->date) < strtotime(date("Y-m-d")) and ($info->attend == 1 or $info->attend == 2))) disabled @endif>
                                                            @if(strtotime($schedule->date) == strtotime(date("Y-m-d")) or $info->attend == 2)
                                                                <option value=2 @if($info->attend == 2) selected @endif>2</option>
                                                            @endif
                                                            @if(strtotime($schedule->date) == strtotime(date("Y-m-d")) or $info->attend == 1)
                                                                <option value=1 @if($info->attend == 1) selected @endif>1</option>
                                                            @endif
                                                            <option value=0 @if($info->attend == 0) selected @endif>➖</option>
                                                            <option value=3 @if($info->attend == 3) selected @endif>➕</option>
                                                            @if(strtotime($schedule->date) < strtotime(date("Y-m-d")))
                                                                <option value=5 @if($info->attend == 5) selected @endif>🟡</option>
                                                            @endif
                                                            @if($info->attend == 4)
                                                                <option value=4 @if($info->attend == 4) selected @endif><span style="color: green">✔️</span></option>
                                                            @endif
                                                            @if($info->attend == -1)
                                                                <option value=-1 @if($info->attend == -1) selected @endif>❌️</option>
                                                            @endif
                                                        </select>

                                                        <select class="optional_class my_select_class" name="homework" id="id_{{$schedule->id}}_{{$s->student->id}}_homework" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}" @if(strtotime($schedule->date) > strtotime(date("Y-m-d")) or $info->attend == -1 or (strtotime($schedule->date) < strtotime(date("Y-m-d")) and ($info->homework == 1 or $info->homework == 2))) disabled @endif>
                                                            @if(strtotime($schedule->date) == strtotime(date("Y-m-d")) or $info->homework == 2))
                                                                <option value="2" @if($info->homework == 2) selected @endif>2</option>
                                                            @endif
                                                            @if(strtotime($schedule->date) == strtotime(date("Y-m-d")) or $info->homework == 1))
                                                                <option value="1" @if($info->homework == 1) selected @endif>1</option>
                                                            @endif
                                                            <option value="4" @if($info->homework == 4) selected @endif>❕</option>
                                                            <option value="0" @if($info->homework == 0) selected @endif>➖</option>
                                                            @if(strtotime($schedule->date) < strtotime(date("Y-m-d")))
                                                                <option value="3" @if($info->homework == 3) selected @endif>🟡</option>
                                                            @endif
                                                        </select>

                                                        <select class="optional_class my_select_class" name="ball" id="id_{{$schedule->id}}_{{$s->student->id}}_ball" schedule_id="{{ $schedule->id }}" student_id="{{ $s->student->id }}" @if(strtotime($schedule->date) != strtotime(date("Y-m-d")) or $info->attend == -1) disabled @endif>
                                                            <option value="3" @if($info->ball == 3) selected @endif>️❤️</option>
                                                            <option value="2" @if($info->ball == 2) selected @endif>2</option>
                                                            <option value="1" @if($info->ball == 1) selected @endif>1</option>
                                                            <option value="-1" @if($info->ball == -1) selected @endif>◼️</option>
                                                            <option value="0" @if($info->ball == 0) selected @endif>0</option>
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
        @endforeach
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
                    console.log(data);
                    if(data['status']){
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_homework').val(parseInt(data['schedule']['attend']));
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_homework').val(parseInt(data['schedule']['homework']));
                        $("#id_"+data['schedule']['group_schedule_id']+'_'+data['schedule']['student_id']+'_ball').val(parseInt(data['schedule']['ball']));
                        var disabled = (parseInt(data['schedule']['attend']) == 0 || parseInt(data['schedule']['attend']) == 3) ? true : false;
                        $("#id_" + data['schedule']['group_schedule_id'] + '_' + data['schedule']['student_id'] + '_homework').prop('disabled', disabled);
                        /*$("#id_" + data['schedule']['group_schedule_id'] + '_' + data['schedule']['student_id'] + '_ball').prop('disabled', disabled);*/
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
