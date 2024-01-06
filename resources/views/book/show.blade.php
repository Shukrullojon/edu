@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $book->name }}
                </div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0">
                <tr>
                    <th>Count</th>
                    <th>Sale</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Date</th>
                </tr>
                @foreach ($counts as $key => $count)
                    <tr>
                        <td>{{ $count->count }}</td>
                        <td>{{ $count->sale }}</td>
                        <td>{{ $count->price }}</td>
                        <td>{{ $count->sell_price }}</td>
                        <td>{{ date("Y-m-d H:i", strtotime($count->created_at)) }}</td>
                    </tr>
                @endforeach
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $counts->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection
