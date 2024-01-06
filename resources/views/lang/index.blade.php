@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Language Management</h2>
                <a class="btn btn-success" href="{{ route('lang.create') }}">Create</a>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($langs as $key => $lang)
                    <tr>
                        <td>{{ $lang->name }}</td>

                        <td>
                            <div class="btn-group">
                                <a class="" style="margin-right: 10px" href="{{ route('lang.show',$lang->id) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="" style="margin-right: 2px" href="{{ route('lang.edit',$lang->id) }}">
                                    <span class="fa fa-edit" style="color: #562bb0"></span>
                                </a>

                                <form action="{{ route("lang.destroy", $lang->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $langs->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection
