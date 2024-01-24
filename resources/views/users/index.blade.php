@extends('layouts.admin')


@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>User Management</h2>
                <a class="btn btn-success" href="{{ route('users.create') }}">Create</a>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Roles</th>
                <th>Directions</th>
                <th>Days</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->name }} {{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ \App\Helpers\MaskHelper::changePhoneMask($user->phone) }}</td>
                    <td>{{ \App\Helpers\StatusHelper::adminStatusGet($user->status) }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            <ul>
                                @foreach($user->getRoleNames() as $v)
                                    <li>{{ $v }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->directions()))
                            <ul>
                                @foreach($user->directions as $direction)
                                    <li>{{ $direction->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->days()))
                            <ul>
                                @foreach($user->days as $day)
                                    <li class="">{{ $day->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('users.show',$user->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('users.edit',$user->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("users.destroy", $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none'
                                        onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span
                                        class="fa fa-trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>


        {!! $data->render() !!}
    </div>
@endsection
