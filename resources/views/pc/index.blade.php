@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Placement Category Management</h2>
                <a class="btn btn-success" href="{{ route('pc.create') }}">Create</a>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th><b>Name</b></th>
                <th><b>Minute</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
            @foreach ($pcs as $key => $pc)
                <tr>
                    <td>{{ $pc->name }}</td>
                    <td>{{ $pc->minute }}</td>
                    <td>{{ \App\Helpers\StatusHelper::taskStatusGet($pc->status) }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="" title="Show" style="margin-right: 10px" href="{{ route('pc.show',$pc->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" title="Edit" style="margin-right: 2px" href="{{ route('pc.edit',$pc->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("pc.destroy", $pc->id) }}" method="POST" title="Change Status">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-random"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $pcs->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
