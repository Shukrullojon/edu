@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Time</th>
                <th>During</th>
                <th>Info</th>
                <th>Price</th>
                <th>One Price</th>
                <th>Filial</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{{ $cource->name }}</td>
                <td>{{ $cource->time }} min</td>
                <td>{{ $cource->during }} month</td>
                <td>{{ $cource->info }}</td>
                <td>{{ number_format($cource->price,0,' ',' ') }}</td>
                <td>{{ number_format($cource->one_price,0,' ',' ') }}</td>
                <td>@if(!empty($cource->filial->name)) {{ $cource->filial->name }} @endif</td>
                <td>{{ \App\Helpers\StatusHelper::courceStatusGet($cource->status) }}</td>
            </tr>
        </table>
    </div>
@endsection
