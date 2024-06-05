@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('home-filter')
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#home_filter" style="margin-right: 5px">
                                <span class="fas fa-filter"></span> Filtr
                            </button>
                        @endcan
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>Groups</h3>
                                        <p>{{ count($schedules) }}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-gamepad"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-blue">
                                    <div class="inner">
                                        <h3>Students</h3>
                                        <p>{{ count($students) }}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-fuchsia">
                                    <div class="inner">
                                        <h3>Teachers</h3>
                                        <p>{{ count($teachers) }}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="home_filter">
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
@endsection
