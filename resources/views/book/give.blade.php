@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <strong>Student:</strong>
                            <select name="user_id" class="form-control" data-control="select2">
                                <option value="0">Select</option>
                                @foreach($students as $student)
                                    <option
                                        value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}   {{ $student->id_code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <strong>Book:</strong>
                            <select id="book_id" name="book_id" class="form-control" data-control="select2">
                                <option value="0">Select</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <strong>Count:</strong>
                            <input type="number" id="count" value="1" name="count" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary" style="margin-top: 18px">Give
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0">
                <tr>
                    <th>Book</th>
                    <th>Student</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
                @foreach ($gives as $key => $give)
                    <tr>
                        <td>{{ $give->book->name ?? '' }}</td>
                        <td>{{ $give->user->name ?? '' }} {{ $give->user->surname ?? '' }}</td>
                        <td>{{ $give->count }}</td>
                        <td>{{ number_format($give->price,0,',',',') }}</td>
                        <td>{{ date("Y-m-d H:i", strtotime($give->created_at)) }}</td>
                    </tr>
                @endforeach
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $gives->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection

