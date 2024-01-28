@extends('layouts.admin')
{{--
3. Can change student user and event
4. Payment history
5. Attend
6. Homework
--}}
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
                <h2 style="margin-left: 10px">{{ $student->name }} {{ $student->surname }}</h2>
                <p><b>Phone:</b> <a href="tel:{{ $student->phone }}">{{ \App\Helpers\MaskHelper::changePhoneMask($student->phone) }}</a></p>
                <p><b>Email:</b> {{ $student->email }}</p>
                <p><b>Group:</b> {{ $student->groupList->group->name ?? '' }} <i style="margin-left: 10px; color: blue" class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#update_group"></i></p>
                <p><b>Cource:</b> {{ $student->groupList->group->cource->name ?? '' }}</p>
                <p><b>Event:</b> {{ $student->event->event->name ?? '' }}</p>
                <p><b>Status:</b> {{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</p>
                <p><b>Like:</b> {{ count($student->likes) }}</p>
            </div>

            <div class="modal fade" id="update_group" tabindex="-1" aria-hidden="true">
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
                        </div>
                        <div class="modal-body scroll-y">
                            <div class="mb-10">
                                {!! Form::model($student,['method' => 'PATCH','route' => ['updateGroup', $student->id]]) !!}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Group:</strong>
                                                {!! Form::select('group_id', $groups,null, ['placeholder' => 'Group','maxlength'=> 100,'class' => 'form-control']) !!}
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

            <div class="card pt-2 mb-6 mb-xl-9">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h2>Events</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                            <tr class="text-start text-muted gs-0">
                                <th>#</th>
                                <th>Admin</th>
                                <th>Event</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        @php $i=1; @endphp
                        <tbody class="fs-6 fw-bold text-gray-600">
                            @foreach($student->events as $event)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $event->change->name }}</td>
                                    <td>{{ $event->event->name }}</td>
                                    <td>{{ date("Y-m-d", strtotime($event->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
                <div class="card-header border-0">
                    <div class="card-title">
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_groups">Groups</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_sms">Sms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_attendance">Attendance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_book">Books</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab_groups" role="tabpanel">
                            <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                <tr>
                                    <th>Group</th>
                                    <th>Cource</th>
                                    <th>Type</th>
                                    <th>Add</th>
                                    <th>Close</th>
                                    <th></th>
                                </tr>
                                @foreach ($student->groupLists as $key => $list)
                                    <tr>
                                        <td>{{ $list->group->name }}</td>
                                        <td>{{ $list->group->cource->name }}</td>
                                        <td>{{ \App\Helpers\TypeHelper::getGroupDayType($list->group->type) }}</td>
                                        <td>{{ date('Y-m-d',strtotime($list->created_at)) }}</td>
                                        <td>@if(!empty($list->closed_at)) {{ date('Y-m-d',strtotime($list->closed_at)) }}@endif</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab_sms" role="tabpanel">
                            <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                <tr>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Text</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($student->sms as $key => $s)
                                    <tr>
                                        <td>{{ \App\Helpers\MaskHelper::changePhoneMask(substr($s->phone,4,9)) }}</td>
                                        <td>{{ \App\Helpers\TypeHelper::getSmsType($s->type) }}</td>
                                        <td>{{ $s->text }}</td>
                                        <td>{{ \App\Helpers\StatusHelper::getSmsStatus($s->status) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab_attendance" role="tabpanel">
                            <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                <tr>
                                    <th>Teacher</th>
                                    <th>Group</th>
                                    <th>Date</th>
                                    <th>Attend</th>
                                    <th>Like</th>
                                    <th>H/W</th>
                                    <th>Comment</th>
                                </tr>
                                @foreach ($student->attend as $key => $att)
                                    <tr>
                                        <td>{{ $att->teacher->name ?? '' }}</td>
                                        <td><a href="{{ route('group.show',$att->group->id ?? 0) }}">{{ $att->group->name ?? '' }}</a></td>
                                        <td>{{ $att->date }}</td>
                                        <td>
                                            @if($att->attend == 2)
                                                ✅ Keldi
                                            @elseif($att->attend == 1)
                                                ⚠️ Kech Keldi
                                            @else
                                                ❌ Kemadi
                                            @endif
                                        </td>
                                        <td>{{ $att->like }}</td>
                                        <td>{{ $att->homework }}</td>
                                        <td title="{{ $att->comment->comment ?? '' }}">
                                            {{ $att->comment->comment ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab_book" role="tabpanel">
                            <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                <tr>
                                    <th>Book</th>
                                    <th>Count</th>
                                    <th>Price</th>
                                </tr>
                                @foreach ($student->books as $key => $book)
                                    <tr>
                                        <td>{{ $book->book->name ?? '' }}</td>
                                        <td>{{ number_format($book->count,0,',',',')  }}</td>
                                        <td>{{ number_format($book->price,0,',',',')  }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
                <div class="card-header border-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Payment</span>
                    </h3>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Payment">
                        <a style="margin-right:10px; color:green" data-bs-toggle="modal" data-bs-target="#student_payment{{ $student->id }}" style="margin-right: 2px" href="">
                            <span class="fa fa-credit-card"></span>
                        </a>

                        <div class="modal fade" id="student_payment{{ $student->id }}" tabindex="-1"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-900px">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2></h2>
                                        <div class="btn btn-sm btn-icon btn-active-color-primary"
                                             data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                              rx="1"
                                                              transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="modal-body py-lg-10 px-lg-10">
                                        <div
                                            class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                                            id="kt_modal_create_app_stepper">
                                            <form action="{{ route('studentPayUpdate') }}" method="POST">
                                                @csrf
                                                @method('patch')
                                                <div class="row">
                                                    <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                    <input type="hidden" name="group_id"
                                                           value="{{ $student->groupList->group_id }}">
                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label><strong>Amount:</strong></label>
                                                            <input type="number" min="1" name="amount"
                                                                   value="{{ $student->groupList->group->cource->price }}"
                                                                   placeholder="Amount" class="form-control">
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
                                                            <input type="text" min="1" name="month" value=""
                                                                   placeholder="Month" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label><strong>Days:</strong></label>
                                                            <input type="number" min="1" name="days" value="0"
                                                                   placeholder="Days" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label><strong>Type:</strong></label>
                                                            <select class="form-control" name="type">
                                                                @foreach(\App\Helpers\TypeHelper::$paymentType as $key => $t)
                                                                    <option value="{{ $key }}">{{ $t }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label><strong>Status:</strong></label>
                                                            <select class="form-control" name="status">
                                                                @foreach(\App\Helpers\StatusHelper::$payStatus as $key => $t)
                                                                    <option value="{{ $key }}">{{ $t }}</option>
                                                                @endforeach
                                                            </select>
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
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                            <tr class="text-start text-muted gs-0">
                                <th>#</th>
                                <th>Group</th>
                                <th>Amount</th>
                                <th>Pay</th>
                                <th>Month</th>
                                <th>Days</th>
                                <th>Type</th>
                                <th>Info</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        @php $i=1; @endphp
                        <tbody class="fs-6 fw-bold text-gray-600">
                            @foreach($student->payments as $payment)
                                <tr>
                                    <td><i>{{ $i++ }}</i></td>
                                    <td><i>{{ $payment->group->name }} <br> ({{ $payment->group->cource->name }})</i></td>
                                    <td><i>{{ number_format($payment->amount,0,' ',' ') }} UZS</i></td>
                                    <td><i>{{ number_format($payment->pay_amount,0,' ',' ') }} UZS</i></td>
                                    <td><i>{{ $payment->month ?? '' }}</i></td>
                                    <td><i>{{ $payment->days ?? '' }}</i></td>
                                    <td>
                                        @if(!empty($payment->type))<i>{{ \App\Helpers\TypeHelper::getPaymentType($payment->type) }}</i>@endif
                                    </td>
                                    <td>{{ $payment->info }}</td>
                                    <td>{{ $payment->pay_date }}</td>
                                    <td><i>{{ \App\Helpers\StatusHelper::payStatusGet($payment->status) }}</i></td>

                                    <td>
                                        <button onclick="" info="
                                        Student: {{ $payment->user->name ?? '' }} {{ $payment->user->surname ?? '' }} <br>
                                        Group: {{ $payment->group->name }} ({{ $payment->group->cource->name }}) <br>
                                        Amount: {{ number_format($payment->amount,0,' ',' ') }} UZS <br>
                                        Pay: {{ number_format($payment->pay_amount,0,' ',' ') }} UZS <br>
                                        Month: {{ date(date('Y-m', strtotime($payment->month))) }} <br>
                                        Type: @if(!empty($payment->type)){{ \App\Helpers\TypeHelper::getPaymentType($payment->type) }}@endif <br>
                                        Status: {{ \App\Helpers\StatusHelper::payStatusGet($payment->status) }} <br>
                                        " class="btn btn-sm print-std-info">
                                            <i class="fa fa-print"></i>
                                            Chop etish
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
                <div class="card-header border-0">
                    <div class="card-title">
                        <h2>Test</h2>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                            <tr class="text-start text-muted gs-0">
                                <th>#</th>
                                <th>Category</th>
                                <th>Number</th>
                                <th>Correct</th>
                                <th>Incorrect</th>
                                <th>Percentage</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        @php $i = 1; @endphp
                        <tbody class="fs-6 fw-bold text-gray-600">
                            @foreach($student->pu as $p)
                                @php
                                    $number = count($p->pur);
                                    $correct = 0;
                                    $incorrect = 0;
                                    $percentage = 0;
                                    foreach ($p->pur as $t){
                                        if ($t->answer == $t->pt->answer)
                                            $correct++;
                                        else
                                            $incorrect++;
                                    }
                                    if ($number != 0)
                                        $percentage = round($correct/$number * 100);
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $p->pc->name }}</td>
                                    <td>{{ $number }}</td>
                                    <td>{{ $correct }}</td>
                                    <td>{{ $incorrect }}</td>
                                    <td>{{ $percentage }} %</td>
                                    <td>{{ $p->pc->minute }} ({{ $p->spend_time }}) min</td>
                                    <td>
                                        <a href="{{ route('studentWorkResult',$p->id) }}">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).on("click", ".print-std-info", function() {
            var info = $(this).attr('info');
            var myWindow = window.open('','','width=1000,height=1000')
            myWindow.document.write(info)
            myWindow.print();
        });
    </script>
@endsection
