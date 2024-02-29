@extends('layouts.admin')


@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Employee Management</h2>
                <div>
                    <a class="btn btn-sm btn-active-success" href="{{ route('users.create') }}">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-plus"></span>
                        Create
                    </a>

                    <a href="#" class="btn btn-sm btn-active-primary" data-bs-toggle="modal" data-bs-target="#users_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Roles</th>
                <th>Positions</th>
                <th>Directions</th>
                <th>Days</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->name }} {{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ \App\Helpers\MaskHelper::changePhoneMask($user->phone) }}</td>
                    <td>{{ \App\Helpers\StatusHelper::adminStatusGet($user->status) }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            <ul>
                                @foreach($user->getRoleNames() as $v)
                                    <li>{{ $v }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->positions()))
                            <ul>
                                @foreach($user->positions as $position)
                                    <li>{{ $position->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->directions()))
                            <ul>
                                @foreach($user->directions as $direction)
                                    <li>{{ $direction->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->days()))
                            <ul>
                                @foreach($user->days as $day)
                                    <li class="">{{ $day->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('users.show',$user->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('users.edit',$user->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("users.destroy", $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none'
                                        onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span
                                        class="fa fa-trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="modal fade" id="users_filter" tabindex="-1" aria-hidden="true">
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
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>email:</strong>
                                        {!! Form::email('email', request()->get('email'), ['placeholder' => 'Email','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        {!! Form::text('phone', request()->get('phone'), ['id' => 'phone','placeholder' => 'Phone','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        {!! Form::select('status', \App\Helpers\StatusHelper::$adminStatus,request()->get('status'), ['placeholder' => 'Status','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Position:</strong>
                                        {!! Form::select('position_id', $positions,request()->get('position_id'), ['placeholder' => 'Position','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Direction:</strong>
                                        {!! Form::select('direction_id', $directions,request()->get('direction_id'), ['placeholder' => 'Direction','maxlength'=> 100,'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <strong>Day:</strong>
                                        {!! Form::select('day_id', $days,request()->get('day_id'), ['placeholder' => 'Day','maxlength'=> 100,'class' => 'form-control']) !!}
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

        {!! $data->render() !!}
    </div>
@endsection

@section('scripts')
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
