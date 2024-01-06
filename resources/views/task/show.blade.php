@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Show Task</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Name</th>
                    <th class="min-w-100px">Time</th>
                    <th class="min-w-100px">Day</th>
                    <th class="min-w-125px">Type</th>
                    <th class="min-w-125px">User</th>
                    <th class="min-w-125px">Attach User</th>
                    <th class="min-w-125px">Close User</th>
                    <th class="min-w-125px">Status</th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                <tr>
                    <td>
                        <i>{{ $task->name }}</i>
                    </td>
                    <td>
                        <i>{{ $task->time }}</i>
                    </td>
                    <td>
                        <i>{{ \App\Helpers\DayHelper::getDay($task->day) }}</i>
                    </td>

                    <td>
                        <i>{{ \App\Helpers\TypeHelper::getDayType($task->type) }}</i>
                    </td>

                    <td>
                        <i>{{ $task->user->name ?? '' }}</i>
                    </td>

                    <td>
                        <i>{{ $task->attach_user->name ?? '' }}</i>
                    </td>

                    <td>
                        <i>{{ $task->close_user->name ?? '' }}</i>
                    </td>

                    <td>
                        <i>{{ \App\Helpers\StatusHelper::taskStatusGet($task->status) }}</i>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Comments</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Comment</th>
                    <th class="min-w-100px">User</th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                @foreach($task->comments as $comment)
                    <tr>
                        <td><i>{{ $comment->comment }}</i></td>
                        <td><i>{{ $comment->user->name }}</i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
