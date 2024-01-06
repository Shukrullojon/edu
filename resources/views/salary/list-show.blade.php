@extends('layouts.admin')

@section('content')

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-striped table-rounded table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Date</th>
                <th>Pay Amount</th>
                <th>Start</th>
                <th>End</th>
                <th>Time</th>
                <th>Sum</th>
            </tr>
            @php
                $totalDiff = 0;
                $totalAmount = 0;
            @endphp
            @foreach ($lists as $key => $l)
                @php
                    $totalDiff += $l->diff;
                    $totalAmount += ($l->pay_amount * $l->diff)/3600;

                    $hour = intval($l->diff / 3600);
                    $minut = intval($l->diff / 60 - $hour*60);
                    $secund = intval($l->diff - $minut * 60 - $hour * 60 * 60);
                @endphp
                <tr>
                    <td>{{ $l->date }}</td>
                    <td>{{ $l->pay_amount }}</td>
                    <td>{{ $l->start }}</td>
                    <td>{{ $l->end }}</td>
                    <td>{{ $hour }} h {{ $minut }} m {{ $secund }} s</td>
                    <td>{{ number_format(($l->pay_amount * $l->diff)/3600,0,' ',' ') }} UZS</td>
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
                <td></td>
                <td></td>
                <td>{{ $totalHour }} h {{ $totalMinut }} m {{ $totalSecund }} s</td>
                <td>{{ number_format($totalAmount,0,' ',' ') }} UZS</td>
            </tr>
        </table>
    </div>
@endsection
