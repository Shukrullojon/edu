@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>USer</th>
                <th>Month</th>
                <th>Amount</th>
                <th>Pay Amount</th>
                <th>Status</th>
                <th>Type</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($salries as $key => $salary)
                <tr>
                    <td>{{ $salary->user_id }}</td>
                    <td>{{ $salary->month }}</td>
                    <td>{{ number_format($salary->salary,0,' ',' ') }}</td>
                    <td>{{ number_format($salary->pay_salary,0,' ',' ') }}</td>
                    <td>{{ \App\Helpers\StatusHelper::salaryStatusGet($salary->status) }}</td>
                    <td>{{ \App\Helpers\TypeHelper::getSalaryType($salary->type) }}</td>
                    <td>
                        <a class="" id="" style="margin-right: 10px" href="{{ route('salaryShow', $salary->id) }}">
                            <span class="fa fa-eye"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
