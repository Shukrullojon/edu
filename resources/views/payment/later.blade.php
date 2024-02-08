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

        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Later</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ $pays->total() }} students</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                 title="Filter">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                   data-bs-target="#loan_student_filter">
                    <span class="svg-icon svg-icon-3"></span>
                    <span class="fa fa-filter"></span>
                    Filter
                </a>
            </div>

            <div class="modal fade" id="loan_student_filter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-900px">
                    <div class="modal-content">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"/>
                            </svg>
						</span>
                            </div>
                            <!--end::Close-->
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                            <div class="mb-10">
                                {!! Form::open(array('method'=>'GET')) !!}
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Group:</strong>
                                            {!! Form::select('group_id', $groups, request()->get('group_id'), ['placeholder' => 'Select a group','class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>Month:</strong>
                                            {!! Form::text('month', request()->get('month'), ['placeholder' => 'Month','maxlength'=> 100,'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <br>
                                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                    <th class="min-w-100px">Info</th>
                    <th class="min-w-100px">Date</th>
                    <th class="min-w-100px">Status</th>
                    <th></th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                @foreach($pays as $pay)
                    <tr>
                        <td>
                            <i><a href="{{ route('studentShow',$pay->user->id ?? '') }}">{{ $pay->user->name ?? '' }} {{ $pay->user->surname ?? '' }}</a></i>
                        </td>
                        <td><i>{{ $pay->group->name ?? '' }}</i></td>
                        <td><i>{{ number_format($pay->amount,0,' ',' ') }} UZS</i></td>
                        <td><i>{{ number_format($pay->pay_amount,0,' ',' ') }} UZS</i></td>
                        <td><i>{{ date("Y-m", strtotime($pay->month)) }}</i></td>
                        <td><i>{{ $pay->days }}</i></td>
                        <td><i>{{ $pay->info }}</i></td>
                        <td><i>{{ $pay->pay_date }}</i></td>
                        <td><i>{{ \App\Helpers\StatusHelper::payStatusGet($pay->status) }}</i></td>
                        <td>
                            @can('finance-update')
                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_create_app{{ $pay->id }}"
                                   style="margin-right: 2px" href="">
                                    <span class="fa fa-edit" style="color: #562bb0"></span>
                                </a>
                            @endcan
                        </td>
                    </tr>

                    <div class="modal fade" id="kt_modal_create_app{{ $pay->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered mw-900px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2></h2>
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
                                        <form action="{{ route('paymentPayUpdate') }}" method="POST" class="form"
                                              novalidate="novalidate" id="">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="user_id" value="{{ $pay->user_id }}">
                                            <input type="hidden" name="group_id" value="{{ $pay->group_id }}">
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $pay->id }}">
                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Amount:</strong></label>
                                                        <input type="number" min="1" name="amount"
                                                               value="{{ $pay->amount }}" placeholder="Amount"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Pay Amount:</strong></label>
                                                        <input type="number" min="1" name="pay_amount" value="0"
                                                               placeholder="Pay Amount" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-4 col-sm-4 col-md-4">
                                                    <div class="form-group">
                                                        <label><strong>Month(202312):</strong></label>
                                                        <input type="text" min="1" name="month"
                                                               value="{{ $pay->month }}" placeholder="Month"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label><strong>Days:</strong></label>
                                                        <input type="number" min="1" name="days"
                                                               value="{{ $pay->days }}" placeholder="Days"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label><strong>Type:</strong></label>
                                                        <select class="form-control" name="type">
                                                            <option></option>
                                                            @foreach(\App\Helpers\TypeHelper::$paymentType as $key => $t)
                                                                <option @if($pay->type == $key) selected @endif value="{{ $key }}">{{ $t }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-3 col-md-3">
                                                    <div class="form-group">
                                                        <label><strong>Status:</strong></label>
                                                        <select class="form-control" name="status" id="status" id_pay="{{ $pay->id }}">
                                                            @foreach(\App\Helpers\StatusHelper::$payStatus as $key => $t)
                                                                <option @if($key == $pay->status) selected @endif value="{{ $key }}">{{ $t }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-3 col-md-3" id="pay_date{{$pay->id}}"
                                                     style="display: none">
                                                    <div class="form-group">
                                                        <label><strong>Pay Date:</strong></label>
                                                        <input type="date" min="1" name="pay_date" value="{{ $pay->pay_date }}"
                                                               placeholder="Days" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label><strong>Info:</strong></label>
                                                        <textarea name="info" rows="3" class="form-control">
{{ $pay->info }}
                                                        </textarea>
                                                    </div>
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

@section('scripts')
    <script>
        $(document).on("change", "#status", function () {
            var value = $(this).val();
            var id_pay = $(this).attr('id_pay');
            if (value == 1) {
                $('#pay_date'+id_pay).css('display', '');
            } else if (value == 0) {
                $('#pay_date'+id_pay).css('display', 'none');
            } else if (value == 2) {
                $('#pay_date'+id_pay).css('display', 'none');
            }
        })
    </script>
@endsection
