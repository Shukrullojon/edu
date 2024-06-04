@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Show Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }} {{ $user->surname }}</td>
                            </tr>

                            <tr>
                                <th>Phone</th>
                                <td>{{ \App\Helpers\MaskHelper::changePhoneMask($user->phone ?? '') }}</td>
                            </tr>

                            <tr>
                                <th>Roles</th>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        <ul>
                                            @foreach($user->getRoleNames() as $v)
                                                <li>{{ $v }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Filial</th>
                                <td>{{ $user->filial->name ?? '' }}</td>
                            </tr>

                            <tr>
                                <th>Direction</th>
                                <td>
                                    @if(!empty($user->directions()))
                                        <ul>
                                            @foreach($user->directions as $direction)
                                                <li>{{ $direction->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    {{ \App\Models\User::$staff_status[$user->status] ?? '' }}
                                </td>
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
