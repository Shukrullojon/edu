@extends('layouts.admin')

@section('styles')
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <section class="content">
        <form action="" method="GET">
        <div class="row container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                <select name="group_id" class="form-control">
                                    <option>Select</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->group_id }}" @if($group->group_id == request()->get('group_id')) selected @endif>{{ $group->group->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary btn-sm form-control">Find</button>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a href="{{ route("attendance.index") }}" class="nav-link @if(empty(request()->get('day_id'))) active @endif">All</a>
                                    </li>
                                    @foreach($days as $day)
                                        <li class="nav-item">
                                            <a href="{{ route("attendance.index",['day_id' => $day->id]) }}" class="nav-link @if(request()->get('day_id') == $day->id) active @endif">{{ $day->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @php
                            $i=1;
                        @endphp
                        @foreach($datas as $data)
                            <table>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data['group']['name'] ?? '' }}</td>
                                        <td>{{ substr($data['group']['cource'] ?? '',0,10) }}</td>
                                        <td>1-2</td>
                                        <td>{{ $data['group']['day'] }}</td>
                                        <td style="font-size: 10px">{{ $data['group']['time'] }}</td>
                                        <td>{{ substr($data['group']['lang'],0,3) }}</td>
                                        <td>{{ substr($data['group']['direction'],0,3) }}</td>
                                        @foreach($data['days'] as $key => $value)
                                            <td colspan="3" style="line-height: 15px">
                                                <p  style="margin: 0">{{ date("d.m.Y", strtotime($key)) }}</p>
                                                <hr style="margin: 0">
                                                <p  style="margin: 0">{{ date("D", strtotime($key)) }}</p>
                                            </td>
                                        @endforeach

                                    </tr>
                                    <tr>
                                        <td colspan="2">ID #</td>
                                        <td colspan="2">Name</td>
                                        <td colspan="2">Surname</td>
                                        <td colspan="2">Age</td>
                                        @foreach($data['days'] as $key => $value)
                                            <td colspan="3">{{ $value['teacher'] }}</td>
                                        @endforeach
                                    </tr>

                                    @foreach($data['students'] as $key_student => $value_student)
                                        <tr>

                                            <td colspan="2">{{ $value_student['id'] }}</td>
                                            <td colspan="2">{{ substr($value_student['name'] ?? '',0,8) }}</td>
                                            <td colspan="2">{{ substr($value_student['surname'] ?? '',0,8) }}</td>
                                            <td colspan="2">{{ $value_student['age'] ?? '' }}</td>
                                            @foreach($data['days'] as $key => $value_day)
                                                @php
                                                    $info = $value_day['students'][$value_student['id']] ?? [];
                                                @endphp
                                                @if(isset($info['attendance']))
                                                    <td>
                                                        <select class="optional_class my_select_class" name="attendance" schedule_id="{{ $info['schedule_id'] ?? 0 }}" id="id_{{ $info['schedule_id'] ?? 0 }}_attendance" @if((strtotime($info['date']) > strtotime(date("Y-m-d")) or $info['attendance'] == -1) or (strtotime($info['date']) < strtotime(date("Y-m-d")) and ($info['attendance'] == 1 or $info['attendance'] == 2))) disabled @endif>
                                                            @if(strtotime($info['date']) == strtotime(date("Y-m-d")) or $info['attendance'] == 2)
                                                                <option value=2 @if($info['attendance'] == 2) selected @endif>2</option>
                                                            @endif
                                                            @if(strtotime($info['date']) == strtotime(date("Y-m-d")) or $info['attendance'] == 1)
                                                                <option value=1 @if($info['attendance'] == 1) selected @endif>1</option>
                                                            @endif
                                                            <option value=0 @if($info['attendance'] == 0) selected @endif>➖</option>
                                                            <option value=3 @if($info['attendance'] == 3) selected @endif>➕</option>
                                                            @if(strtotime($info['date']) < strtotime(date("Y-m-d")))
                                                                <option value=5 @if($info['attendance'] == 5) selected @endif>🟡</option>
                                                            @endif
                                                            @if($info['attendance'] == 4)
                                                                <option value=4 @if($info['attendance'] == 4) selected @endif><span style="color: green">✔️</span></option>
                                                            @endif
                                                            @if($info['attendance'] == -1)
                                                                <option value=-1 @if($info['attendance'] == -1) selected @endif>❌️</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                @endif
                                                @if(isset($info['homework']))
                                                    <td>
                                                        <select class="optional_class my_select_class" name="homework" schedule_id="{{ $info['schedule_id'] ?? 0 }}" id="id_{{ $info['schedule_id'] ?? 0 }}_homework" @if(strtotime($info['date']) > strtotime(date("Y-m-d")) or $info['attendance'] == -1 or (strtotime($info['date']) < strtotime(date("Y-m-d")) and ($info['homework'] == 1 or $info['homework'] == 2))) disabled @endif>
                                                            @if(strtotime($info['date']) == strtotime(date("Y-m-d")) or $info['homework'] == 2))
                                                                <option value="2" @if($info['homework'] == 2) selected @endif>2</option>
                                                            @endif
                                                            @if(strtotime($info['date']) == strtotime(date("Y-m-d")) or $info['homework'] == 1))
                                                                <option value="1" @if($info['homework'] == 1) selected @endif>1</option>
                                                            @endif
                                                            <option value="4" @if($info['homework'] == 4) selected @endif>❕</option>
                                                            <option value="0" @if($info['homework'] == 0) selected @endif>➖</option>
                                                            @if(strtotime($info['date']) < strtotime(date("Y-m-d")))
                                                                <option value="3" @if($info['homework'] == 3) selected @endif>🟡</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                @endif
                                                @if(isset($info['ball']))
                                                    <td>
                                                        <select class="optional_class my_select_class" name="ball" schedule_id="{{ $info['schedule_id'] ?? 0 }}" id="id_{{ $info['schedule_id'] ?? 0 }}_ball" @if(strtotime($info['date']) != strtotime(date("Y-m-d")) or $info['attendance'] == -1) disabled @endif>
                                                            <option value="3" @if($info['ball'] == 3) selected @endif>️❤️</option>
                                                            <option value="2" @if($info['ball'] == 2) selected @endif>2</option>
                                                            <option value="1" @if($info['ball'] == 1) selected @endif>1</option>
                                                            <option value="-1" @if($info['ball'] == -1) selected @endif>◼️</option>
                                                            <option value="0" @if($info['ball'] == 0) selected @endif>0</option>
                                                        </select>
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                  @endforeach
                                </table>
                            <hr>
                        @endforeach
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).on("change",".optional_class", function () {
            var name = $(this).attr("name");
            var schedule_id = $(this).attr("schedule_id");
            var selected = $(this).val();
            console.log(name, schedule_id, selected);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'{{ route('attendanceChange') }}',
                data:{
                    'name' : name,
                    'schedule_id' : schedule_id,
                    'selected' : selected,
                },
                success:function(data) {
                    console.log(data);
                    if(data['status']){
                        $("#id_"+data['schedule']['id']+'_attendance').val(parseInt(data['schedule']['attend']));
                        $("#id_"+data['schedule']['id']+'_homework').val(parseInt(data['schedule']['homework']));
                        $("#id_"+data['schedule']['id']+'_ball').val(parseInt(data['schedule']['ball']));
                        var disabled = (parseInt(data['schedule']['attend']) == 0 || parseInt(data['schedule']['attend']) == 3) ? true : false;
                        $("#id_"+ data['schedule']['id'] + '_homework').prop('disabled', disabled);
                        $("#id_"+data['schedule']['id'] + '_ball').prop('disabled', disabled);
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

