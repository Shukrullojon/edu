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
                <th>User</th>
                <th>Month</th>
                <th>Amount</th>
                <th>Pay Amount</th>
                <th>Status</th>
                <th>Type</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($salries as $key => $salary)
                <tr>
                    <td>{{ $salary->user->name }}</td>
                    <td>{{ $salary->month }}</td>
                    <td>{{ number_format($salary->salary,0,' ',' ') }}</td>
                    <td>{{ number_format($salary->pay_salary,0,' ',' ') }}</td>
                    <td>{{ \App\Helpers\StatusHelper::salaryStatusGet($salary->status) }}</td>
                    <td>{{ \App\Helpers\TypeHelper::getSalaryType($salary->type) }}</td>
                    <td>
                        <a class="" id="" style="margin-right: 10px" href="{{ route('salaryShow', $salary->id) }}">
                            <span class="fa fa-eye"></span>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#kt_modal_create_app{{ $salary->id }}" style="margin-right: 2px" href="">
                            <span class="fa fa-edit" style="color: #562bb0"></span>
                        </a>
                    </td>
                </tr>
                {{--create modal form--}}
                <div class="modal fade" id="kt_modal_create_app{{ $salary->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-900px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>{{ $salary->user->name }}</h2>
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <div class="modal-body py-lg-10 px-lg-10">
                                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                                    <form action="{{ route('salaryUpdate', $salary->id) }}" method="POST" class="form" novalidate="novalidate" id="">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="pay_amount" max="{{ $salary->salary - $salary->pay_salary }}" placeholder="Pay Amount" required class="form-control">
                                        <button type="submit" class="btn btn-primary form-control" style="margin-left: 10px">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection
