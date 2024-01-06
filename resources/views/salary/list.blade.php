@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>User</th>
                <th>Month</th>
                <th>Amount</th>
                <th>Pay Amount</th>
                <th>Status</th>
                <th>Type</th>
            </tr>
            @foreach ($salaries as $key => $salary)
                <tr>
                    <td>{{ $salary->user->name }}</td>
                    <td>{{ $salary->month }}</td>
                    <td>{{ number_format($salary->salary,0,' ',' ') }}</td>
                    <td>{{ number_format($salary->pay_salary,0,' ',' ') }}</td>
                    <td>{{ \App\Helpers\StatusHelper::salaryStatusGet($salary->status) }}</td>
                    <td>{{ \App\Helpers\TypeHelper::getSalaryType($salary->type) }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    @if(count($hourly))
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-striped table-rounded table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Date</th>
                <th>Pay Amount</th>
                <th>Time</th>
                <th>Sum</th>
                <th></th>
            </tr>
            @php
                $totalDiff = 0;
                $totalAmount = 0;
            @endphp
            @foreach ($hourly as $key => $h)
                @php
                    $totalDiff += $h->diff;
                    $totalAmount += ($h->pay_amount * $h->diff)/3600;

                    $hour = intval($h->diff / 3600);
                    $minut = intval($h->diff / 60 - $hour*60);
                    $secund = intval($h->diff - $minut * 60 - $hour * 60 * 60);
                @endphp
                <tr>
                    <td>{{ $h->date }}</td>
                    <td>{{ number_format($h->pay_amount,0,' ',' ') }} UZS</td>
                    <td>{{ $hour }} h {{ $minut }} m {{ $secund }} s</td>
                    <td>{{ number_format(($h->pay_amount * $h->diff)/3600,0,' ',' ') }} UZS</td>
                    <td>
                        <a class="" id="" style="margin-right: 10px" href="{{ route('salaryListShow', $h->date) }}">
                            <span class="fa fa-eye"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            @php
                $totalHour = intval($totalDiff / 3600);
                $totalMinut = intval($totalDiff / 60 - $totalHour*60);
                $totalSecund = intval($totalDiff - $totalMinut * 60 - $totalHour * 60 * 60);
            @endphp
            <tr>
                <td>Total</td>
                <td></td>
                <td>{{ $totalHour }} h {{ $totalMinut }} m {{ $totalSecund }} s</td>
                <td>{{ number_format($totalAmount,0,' ',' ') }} UZS</td>
                <td></td>
            </tr>
        </table>
    </div>
    @endif
@endsection
