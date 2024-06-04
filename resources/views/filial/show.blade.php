@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Show Filial</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td>{{ $filial->name }}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $filial->address }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ $filial->phone }}</td>
                            </tr>

                            <tr>
                                <th>Room Count</th>
                                <td>{{ $filial->room_count }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{ \App\Models\Filial::$statuses[$filial->status] ?? '' }}</td>
                            </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
