@extends('layouts.admin')

@section('styles')
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @can('attendance-filter')
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#noattend_filter" style="margin-right: 5px">
                                <span class="fas fa-filter"></span> Filtr
                            </button>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Student</th>
                                <th>Teacher</th>
                                <th>Group</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($noattend as $noattend)
                                <tr>
                                    <td>{{ $noattend->student->name ?? '' }} {{ $noattend->student->surname ?? '' }} {{  \App\Helpers\MaskHelper::changePhoneMask($noattend->student->phone ?? '') }}</td>
                                    <td>{{ $noattend->teacher->name ?? '' }} {{ $noattend->teacher->surname ?? '' }}</td>
                                    <td>{{ $noattend->group->name ?? '' }}</td>
                                    <td>{{ $noattend->date }}</td>
                                    <td>{{ $noattend->comment }}</td>
                                    <td>{{ \App\Models\GroupSchedule::$schedule_status[$noattend->status] }}</td>
                                    <td>
                                        @can('attendance-edit')
                                            <a class="" href="{{ route('attendance.edit',$noattend->id) }}"
                                               style="margin-right: 2px">
                                                <span class="fa fa-edit" style="color: #562bb0"></span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="noattend_filter">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Filtr</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                {!! Form::open(['method'=>'GET']) !!}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Date:</strong>
                                                {!! Form::date('date', request()->get('date'), ['placeholder' => 'Date','maxlength'=> 100,'class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Filtr</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
    </section>

@endsection
