@extends('layouts.admin')

@section('content')

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Work Date</th>
                <th>Salary List</th>
                <th>Roles</th>
                <th>Positions</th>
                <th>Directions</th>
                <th>Days</th>
                <th>Languages</th>
            </tr>
            <tr>
                <td>{{ $user->name }} {{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ \App\Helpers\MaskHelper::changePhoneMask($user->phone) }}</td>
                <td>{{ \App\Helpers\StatusHelper::adminStatusGet($user->status) }}</td>
                <td>
                    <ul>
                        <li>Start: {{ date('H:i', strtotime($user->start)) }}</li>
                        <li>End: {{ date('H:i', strtotime($user->end)) }}</li>
                    </ul>
                </td>
                <td>
                    <ul>
                        @if(!empty($user->salary)) <li>Salary: {{ number_format($user->salary,0,' ',' ') }} UZS</li> @endif
                        @if(!empty($user->kpi)) <li>KPI: {{ number_format($user->kpi,0,' ',' ') }} UZS</li> @endif
                        @if(!empty($user->hourly)) <li>Hourly: {{ number_format($user->hourly,0,' ',' ') }} UZS</li> @endif
                        @if(!empty($user->add_student)) <li>Add Student: {{ number_format($user->add_student,0,' ',' ') }} UZS</li> @endif
                        @if(!empty($user->active_student)) <li>Active Student: {{ number_format($user->active_student,0,' ',' ') }} UZS</li> @endif
                    </ul>
                </td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        <ul>
                            @foreach($user->getRoleNames() as $v)
                                <li>{{ $v }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if(!empty($user->positions()))
                        <ul>
                            @foreach($user->positions as $position)
                                <li>{{ $position->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    @if(!empty($user->directions))
                        <ul>
                            @foreach($user->directions as $direction)
                                <li>{{ $direction->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                <td>
                    @if(!empty($user->days))
                        <ul>
                            @foreach($user->days as $day)
                                <li>{{ $day->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                <td>
                    @if(!empty($user->langs))
                        <ul>
                            @foreach($user->langs as $lang)
                                <li>{{ $lang->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </table>
    </div>

@endsection
