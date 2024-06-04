@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <ul class="nav nav-tabs btn btn-sm" id="myTab" role="tablist">
                                <a href="{{ route("student.index") }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(empty(request()->get('status'))) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            All <span class="badge bg-secondary">{{ ($cnt[0] ?? 0) + ($cnt[1] ?? 0) + ($cnt[2] ?? 0) + ($cnt[3] ?? 0) + ($cnt[4] ?? 0) + ($cnt[5] ?? 0) + ($cnt[6] ?? 0) }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 1]) }}" style="margin-right: 3px">
                                    <li>
                                        <button class="nav-link @if(request()->get('status') == 1) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Reception <span class="badge bg-secondary">{{ $cnt[1] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 2]) }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 2) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            First Lesson <span class="badge bg-secondary">{{ $cnt[2] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 3]) }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 3) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Waiting <span class="badge bg-secondary">{{ $cnt[3] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 4]) }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 4) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Active <span class="badge bg-secondary">{{ $cnt[4] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 5]) }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 5) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Frozen <span class="badge bg-secondary">{{ $cnt[5] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 6]) }}" style="margin-right: 3px">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 6) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Left <span class="badge bg-secondary">{{ $cnt[6] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>

                                <a href="{{ route("student.index",["status" => 21]) }}">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link @if(request()->get('status') == 21) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            Archive <span class="badge bg-secondary">{{ $cnt[21] ?? 0 }}</span>
                                        </button>
                                    </li>
                                </a>
                            </ul>
                        </h3>

                        @can('student-create')
                            <a href="{{ route('student.create',['status' => request()->get('status')]) }}" class="btn btn-success btn-sm float-right" style="margin-top: 7px">
                                <span class="fas fa-plus-circle"></span>
                                Create
                            </a>
                        @endcan

                        @can('student-filter')
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#student_filter" style="margin-right: 5px; margin-top: 7px">
                                <span class="fas fa-filter"></span> Filtr
                            </button>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <!-- Data table -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                    <th>Image</th>
                                @endif
                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                    <th>Id Code</th>
                                @endif
                                <th>Name</th>
                                <th>Phone</th>
                                @if(request()->get('status') == 1 or request()->get('status') == 2 or request()->get('status') == 3)
                                    <th>Interes(Cource, Day, Hour)</th>
                                @endif
                                @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                    <th>Group</th>
                                @endif
                                <th>Status</th>
                                <th></th>
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
                                                    @if(!empty($student->interes_cource->name)) {{ $student->interes_cource->name ?? '' }} / {{ $student->interes_day->name ?? '' }} / {{ date("H:i", strtotime($student->interes_time)) }} @endif
                                                </i>
                                            </td>
                                        @endif

                                        @if(request()->get('status') != 1 and request()->get('status') != 2 and request()->get('status') != 3)
                                            <td><i>{{ $student->group_info->group->name ?? '' }}</i></td>
                                        @endif
                                        <td><i>{{ \App\Models\User::$student_status[$student->status] ?? '' }}</i></td>
                                        <td class="" width="15px">
                                            <div class="btn-group">
                                                @can('student-show')
                                                    <a class="" href="{{ route('student.show',$student->id) }}" style="margin-right: 7px">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                @endcan

                                                @can('student-edit')
                                                    <a class="" href="{{ route('student.edit',$student->id) }}" style="margin-right: 2px">
                                                        <span class="fa fa-edit" style="color: #562bb0"></span>
                                                    </a>
                                                @endcan

                                                @can('student-destroy')
                                                    <form action="{{ route("student.destroy", $student->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button"
                                                                style='display:inline; border:none; background: none'
                                                                onclick="if (confirm('Are you sure?')) { this.form.submit() } "><span
                                                                class="fa fa-trash"></span></button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="12">
                                        {{ $students->withQueryString()->links()   }}
                                    </td>
                                </tr>
                            </tfooter>
                        </table>

                        <div class="modal fade" id="student_filter">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Фильтр</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::open(['method'=>'GET']) !!}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    {!! Form::text('name', request()->get('name'), ['placeholder' => 'Name','maxlength'=> 100,'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Surname:</strong>
                                                    {!! Form::text('surname', request()->get('surname'), ['placeholder' => 'Surname','maxlength'=> 100,'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Group:</strong>
                                                    {!! Form::select('group_id', $groups,request()->get('group_id'), ['placeholder' => '','maxlength'=> 100,'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Status:</strong>
                                                    {!! Form::select('status', \App\Models\User::$student_status,request()->get('status'), ['placeholder' => '','maxlength'=> 100,'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрывать</button>
                                        <button type="submit" class="btn btn-primary">Фильтр</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
