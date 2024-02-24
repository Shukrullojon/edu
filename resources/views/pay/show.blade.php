@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Percentage</th>
                <th>Balance</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{{ $pay->name }}</td>
                <td>{{ $pay->percentage }} %</td>
                <td>{{ number_format($pay->balance) }} UZS</td>
                <td>{{ \App\Helpers\StatusHelper::paymentStatusGet($pay->status) }}</td>
            </tr>
        </table>
    </div>
@endsection
