@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-body py-3">
                <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                    <tr>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>@if(!empty($student->student->name)) {{ $student->student->name ?? '' }} {{ $student->student->surname ?? '' }} {{ \App\Helpers\MaskHelper::changePhoneMask($student->student->phone ?? '') }} @endif</td>
                            <td>{{ $student->group_schedule->group->name ?? '' }} ({{ $student->group_schedule->plan_teacher->name ?? '' }}  {{ $student->group_schedule->plan_teacher->surname ?? '' }}) </td>
                            <td>{{ $student->group_schedule->date ?? '' }} ({{ $student->group_schedule->start_date ?? '' }}-{{ $student->group_schedule->end_date ?? '' }})</td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>

                <hr>

                <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                    <tr>
                        <th>Group</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    @foreach ($s_list as $key => $s)
                        <tr>
                            <td>{{ $s->group->name ?? '' }} ({{ $student->group_schedule->plan_teacher->name ?? '' }}  {{ $student->group_schedule->plan_teacher->surname ?? '' }}) </td>
                            <td>{{ $s->date ?? '' }} ({{ $s->start_date ?? '' }}-{{ $s->end_date ?? '' }})</td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

@endsection
