@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card card-xl-stretch mb-12 mb-xl-12">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Results: {{ $pus->total() }}</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                     title="Filter">
                    <a href="#" class="btn btn-sm btn-active-primary" data-bs-toggle="modal"
                       data-bs-target="#placement_result_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter
                    </a>
                </div>
            </div>
            <div class="card-body py-0">
                <table class="table table-bordered">
                    <tr>
                        <th><b>#</b></th>
                        <th><b>User</b></th>
                        <th><b>Category</b></th>
                        <th><b>Attach User</b></th>
                        <th><b>Status</b></th>
                        <th><b>Number</b></th>
                        <th><b>Correct</b></th>
                        <th><b>Incorrect</b></th>
                        <th><b>Percentage</b></th>
                        <th><b>Time</b></th>
                        <th><b>Action</b></th>
                    </tr>
                    @php $i = (!empty(request()->get('page')) ? (request()->get('page') -1) * 40 : 0) + 1; @endphp
                    @foreach ($pus as $key => $p)
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
                            <td>{{ $p->user->name }}</td>
                            <td>{{ $p->pc->name }}</td>
                            <td>{{ $p->attach->name }}</td>
                            <td>{{ \App\Helpers\PTHelper::placementStatusGet($p->status) }}</td>
                            <td>{{ $number }}</td>
                            <td>{{ $correct }}</td>
                            <td>{{ $incorrect }}</td>
                            <td>{{ $percentage }} %</td>
                            <td>{{ $p->pc->minute }} @if($p->spend_time)
                                    ({{ $p->spend_time }})
                                @endif min
                            </td>
                            <td>
                                <a class="" title="Show" style="margin-right: 10px"
                                   href="{{ route('studentWorkResult',$p->id) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <tfooter>
                    <tr>
                        <td colspan="9">
                            {{
                                $pus->appends([
                                    'page' => request()->get('page'),
                                    'name' => request()->get('name'),
                                    'category_id' => request()->get('category_id')
                                ])
                            }}
                        </td>
                    </tr>
                </tfooter>
            </div>
        </div>
    </div>

    <div class="modal fade" id="placement_result_filter" tabindex="-1" aria-hidden="true">
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
                <div class="modal-body scroll-y">
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
                                    <strong>Category:</strong>
                                    {!! Form::select('category_id', $categories,request()->get('category_id'), ['placeholder' => 'Category','maxlength'=> 100,'class' => 'form-control']) !!}
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
