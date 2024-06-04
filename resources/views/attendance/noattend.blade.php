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

                    </div>

                    <div class="card-body">
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Group</th>
                                <th>Date</th>
                                <th>Students</th>
                                <th>No Attend</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group['name'] }}</td>
                                        <td>{{ $group['date'] }}</td>
                                        <td>{{ $group['students'] }}</td>
                                        <td>{{ $group['noattend'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                            <thead>
                                <tr>
                                    <th>Student</th>
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
                                        <td>{{ $noattend->student->name ?? '' }}</td>
                                        <td>{{ $noattend->group->name ?? '' }}</td>
                                        <td>{{ $noattend->date }}</td>
                                        <td>{{ $noattend->comment }}</td>
                                        <td>{{ $noattend->status }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
