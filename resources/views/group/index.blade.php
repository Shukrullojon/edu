@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card card-xl-stretch mb-12 mb-xl-12">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Groups: {{ $groups->total() }}</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Filter">
                    <a href="#" class="btn btn-sm btn-active-primary" data-bs-toggle="modal"
                       data-bs-target="#group_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter
                    </a>
                </div>
            </div>
            <div class="card-body py-0">
                    <table class="table table-bordered">
                    <tr>
                        <th class="">#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Start Time</th>
                        <th>Cource</th>
                        <th>Max</th>
                        <th>Filial</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @php $i = (!empty(request()->get('page')) ? (request()->get('page') -1) * 20 : 0) + 1; @endphp
                    @foreach ($groups as $key => $group)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ \App\Helpers\TypeHelper::getGroupDayType($group->type) }}</td>
                            <td>{{ date('Y-m-d H:i',strtotime($group->start_time)) }}</td>
                            <td>{{ $group->cource->name }}</td>
                            <td>{{ $group->max_student }} ({{ $group->stdCount->number }})</td>
                            <td>@if(!empty($group->filial->name)) {{ $group->filial->name }} @endif</td>
                            <td>{{ \App\Helpers\StatusHelper::groupStatusGet($group->status) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="" style="margin-right: 10px" href="{{ route('group.show',$group->id) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a class="" style="margin-right: 2px" href="{{ route('group.edit',$group->id) }}">
                                        <span class="fa fa-edit" style="color: #562bb0"></span>
                                    </a>

                                    <form action="{{ route("group.destroy", $group->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <tfooter>
                    <tr>
                        <td colspan="9">

                            {{
                                $groups->appends([
                                    'page' => request()->get('page'),
                                    'name' => request()->get('name'),
                                    'filial_id' => request()->get('filial_id'),
                                    'status' => request()->get('status'),
                                    'type' => request()->get('type'),
                                    'cource_id' => request()->get('cource_id'),
                                ])
                            }}
                        </td>
                    </tr>
                </tfooter>
            </div>
        </div>
    </div>

    <div class="modal fade" id="group_filter" tabindex="-1" aria-hidden="true">
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
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Type:</strong>
                                    {!! Form::select('type', \App\Helpers\TypeHelper::$groupDayType,request()->get('type'), ['placeholder' => 'Type','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    {!! Form::select('status', \App\Helpers\StatusHelper::$groupStatus,request()->get('status'), ['placeholder' => 'Status','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Cource:</strong>
                                    {!! Form::select('cource_id',$cources, request()->get('cource_id'), ['placeholder' => 'Cource','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Filial:</strong>
                                    {!! Form::select('filial_id',$filials, request()->get('filial_id'), ['placeholder' => 'Filial','maxlength'=> 100,'class' => 'form-control']) !!}
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
