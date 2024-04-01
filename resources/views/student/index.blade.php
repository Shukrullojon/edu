@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <!--begin::Tables Widget 9-->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <a href="{{ route("studentIndex") }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(empty(request()->get('status'))) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                All <span class="badge bg-secondary">{{ ($cnt[0] ?? 0) + ($cnt[1] ?? 0) + ($cnt[2] ?? 0) + ($cnt[3] ?? 0) + ($cnt[4] ?? 0) + ($cnt[5] ?? 0) + ($cnt[6] ?? 0) }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 1]) }}">
                        <li>
                            <button class="nav-link @if(request()->get('status') == 1) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Reception <span class="badge bg-secondary">{{ $cnt[1] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 2]) }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request()->get('status') == 2) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                First Lesson <span class="badge bg-secondary">{{ $cnt[2] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 3]) }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request()->get('status') == 3) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Waiting <span class="badge bg-secondary">{{ $cnt[3] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 4]) }}">
                        <li class="nav-item" role="presentation">
                            <a href="{{ route("studentIndex",["status" => 4]) }}">
                                <button class="nav-link @if(request()->get('status') == 4) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Active <span class="badge bg-secondary">{{ $cnt[4] ?? 0 }}</span>
                                </button>
                            </a>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 5]) }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request()->get('status') == 5) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Frozen <span class="badge bg-secondary">{{ $cnt[5] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 6]) }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request()->get('status') == 6) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Left <span class="badge bg-secondary">{{ $cnt[6] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                    <a href="{{ route("studentIndex",["status" => 21]) }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(request()->get('status') == 21) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Archive <span class="badge bg-secondary">{{ $cnt[0] ?? 0 }}</span>
                            </button>
                        </li>
                    </a>

                </ul>

                <div>
                    <a class="btn btn-sm btn-active-success" href="{{ route('studentCreate', ['status' => request()->get('status')]) }}">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-plus"></span>
                        Create
                    </a>

                    <a href="#" class="btn btn-sm btn-active-primary" data-bs-toggle="modal"
                       data-bs-target="#active_student_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter
                    </a>
                </div>
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
                            @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                <th class="min-w-200px">Image</th>
                            @endif
                            @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                <th class="min-w-200px">Id Code</th>
                            @endif
                            <th class="min-w-200px">Name</th>
                            <th class="min-w-150px">Phone</th>
                            @if(request()->get('status') == 1 or request()->get('status') == 2 or request()->get('status') == 3)
                                <th class="min-w-150px">Interes(Cource, Day, Hour)</th>
                            @endif
                            @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                <th class="min-w-150px">Group</th>
                            @endif
                            <th class="min-w-150px">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                    <td>@if($student->image) <img src="{{ asset('public/image/'.$student->image) }}" height="60px"> @endif</td>
                                @endif

                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                    <td><i>{{ $student->id_code }}</i></td>
                                @endif

                                <td><i>{{ $student->name }} {{ $student->surname }}</i></td>
                                <td><i>{{ \App\Helpers\MaskHelper::changePhoneMask($student->phone) }}</i></td>
                                @if(request()->get('status') == 1 or request()->get('status') == 2 or request()->get('status') == 3)
                                    <td>
                                        <i>
                                            @if(!empty($student->cource->name)) {{ $student->cource->name ?? '' }} / {{ $student->day->name ?? '' }} / {{ date("H:i", strtotime($student->interes_time)) }} @endif
                                        </i>
                                    </td>
                                @endif

                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                     <td><i>{{ $student->group->name ?? '' }}</i></td>
                                @endif
                                <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>
                                <td>
                                    <div class="btn-group">
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
                                                        <input type="hidden" name="group_id" value="{{ $student->groupList->group_id ?? '' }}">
                                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                                            <div class="form-group">
                                                                <label><strong>Amount:</strong></label>
                                                                <input type="number" min="1" name="amount" value="{{ $student->groupList->group->cource->price ?? 0 }}" placeholder="Amount" class="form-control">
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
                            <tr>
                                <td colspan="9">
                                    {{ $students->links() }}
                                </td>
                            </tr>
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
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <div class="mb-10">
                        {!! Form::open(array('method'=>'GET')) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Phone:</strong>
                                    {!! Form::text('phone', request()->get('phone'), ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'maxlength'=> 13, 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Group:</strong>
                                    {!! Form::select('group_id', $groups, request()->get('group_id'), ['placeholder' => 'Select a group','class' => 'form-control']) !!}
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
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
