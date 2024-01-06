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
            <tr>
                <td>{{ $salary->user->name }}</td>
                <td>{{ $salary->month }}</td>
                <td>{{ number_format($salary->salary,0,' ',' ') }}</td>
                <td>{{ number_format($salary->pay_salary,0,' ',' ') }}</td>
                <td>{{ \App\Helpers\StatusHelper::salaryStatusGet($salary->status) }}</td>
                <td>{{ \App\Helpers\TypeHelper::getSalaryType($salary->type) }}</td>
            </tr>
        </table>
    </div>
@endsection
