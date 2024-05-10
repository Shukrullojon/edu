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
                        <th></th>
                    </tr>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->attend }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </table>
                <tfooter>

                </tfooter>
            </div>
        </div>
    </div>

@endsection
