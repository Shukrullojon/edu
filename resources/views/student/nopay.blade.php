@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Student</th>
                    <th class="min-w-100px">Group</th>
                    <th class="min-w-100px">Amount</th>
                    <th class="min-w-100px">Pay Amount</th>
                    <th class="min-w-100px">Month</th>
                    <th class="min-w-100px">Days</th>
                    <th class="min-w-100px">Status</th>
                    <th></th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                @foreach($pays as $pay)
                    <tr>
                        <td><i>{{ $pay->user->name ?? '' }} {{ $pay->user->surname ?? '' }}</i></td>
                        <td><i>{{ $pay->group->name ?? '' }}</i></td>
                        <td><i>{{ number_format($pay->amount,0,' ',' ') }} UZS</i></td>
                        <td><i>{{ number_format($pay->pay_amount,0,' ',' ') }} UZS</i></td>
                        <td><i>{{ $pay->month }}</i></td>
                        <td><i>{{ $pay->days }}</i></td>
                        <td><i>{{ \App\Helpers\StatusHelper::payStatusGet($pay->status) }}</i></td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_create_app{{ $pay->id }}"
                               style="margin-right: 2px" href="">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>
                        </td>
                    </tr>

                    {{--create modal form--}}
                    <div class="modal fade" id="kt_modal_create_app{{ $pay->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered mw-900px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2>{{ $pay->user->name ?? '' }} </h2>
                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="currentColor"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="currentColor"/>
								</svg>
							</span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <div class="modal-body py-lg-10 px-lg-10">
                                    <div
                                        class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                                        id="kt_modal_create_app_stepper">
                                        <form action="{{ route('studentPayUpdate', $pay->id) }}" method="POST"
                                              class="form" novalidate="novalidate" id="">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <label><strong>Pay Amount:</strong></label>
                                                    <input type="number" min="1" name="pay_amount"
                                                           value="{{ $pay->amount }}" placeholder="Pay Amount"
                                                           class="form-control">
                                                </div>

                                                <button type="submit" class="btn btn-primary form-control"
                                                        style="margin-left: 10px; margin-top:10px">Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $pays->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection
