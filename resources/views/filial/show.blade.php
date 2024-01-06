@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{{ $filial->name }}</td>
                <td>{{ $filial->address }}</td>
                <td>{{ \App\Helpers\MaskHelper::changePhoneMask($filial->phone) }}</td>
                <td>{{ \App\Helpers\StatusHelper::filialStatusGet($filial->status) }}</td>
            </tr>
        </table>
    </div>
@endsection
