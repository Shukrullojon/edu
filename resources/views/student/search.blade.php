@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <!--begin::Tables Widget 9-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Search Students</span>
                    <span class="text-muted mt-1 fw-bold fs-7">{{ count($students) }} students</span>
                </h3>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-200px">Name</th>
                            <th class="min-w-150px">Phone</th>
                            <th class="min-w-150px">Event</th>
                            <th class="min-w-150px">Group</th>
                            <th class="min-w-150px">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td><i>{{ $student->name }} {{ $student->surname }}</i></td>
                                <td><i>{{ \App\Helpers\MaskHelper::changePhoneMask($student->phone) }}</i></td>
                                <td><i>{{ $student->event->event->name ?? '' }}</i></td>
                                <td><i>{{ $student->groupList->group->name ?? '' }}({{ $student->groupList->group->cource->name ?? '' }})</i></td>
                                <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>
                                <td>
                                    <div class="btn-group">

                                        <a style="margin-right:10px; color:green" data-bs-toggle="modal" data-bs-target="#student_payment{{ $student->id }}" style="margin-right: 2px" href="">
                                            <span class="fa fa-credit-card"></span>
                                        </a>

                                        <a class="" style="margin-right: 10px" target="_blank"
                                           href="{{ route('studentShow',$student->id) }}">
                                            <span class="fa fa-eye"></span>
                                        </a>

                                        <a class="" style="margin-right: 2px"
                                           href="{{ route('studentEdit',$student->id) }}">
                                            <span class="fa fa-edit" style="color: #562bb0"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="student_payment{{ $student->id }}" tabindex="-1" aria-hidden="true">
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
                                            </div>
                                        </div>
                                        <div class="modal-body py-lg-10 px-lg-10">
                                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                                                <form action="{{ route('studentPayUpdate') }}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="row">
                                                        <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                        <input type="hidden" name="group_id" value="{{ $student->groupList->group_id }}">
                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Amount:</strong></label>
                                                                <input type="number" min="1" name="amount" value="{{ $student->groupList->group->cource->price }}" placeholder="Amount" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Pay Amount:</strong></label>
                                                                <input type="number" min="1" name="pay_amount" value="0" placeholder="Pay Amount" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Month(202312):</strong></label>
                                                                <input type="text" min="1" name="month" value="" placeholder="Month" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Days:</strong></label>
                                                                <input type="number" min="1" name="days" value="0" placeholder="Days" class="form-control">
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
                                                        <button type="submit" class="btn btn-primary form-control" style="margin-left: 10px; margin-top:10px">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                        <tfooter>

                        </tfooter>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="active_student_filter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog mw-650px">
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

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#phone').inputmask("(99)999-99-99");
        $("#select2Input").select2({ dropdownParent: "#modal-container" });
    </script>
@endsection
