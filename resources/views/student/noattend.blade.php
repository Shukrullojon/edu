@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Group</th>
                <th>Comment</th>
                <th width="280px"></th>
            </tr>
            @foreach ($noattends as $key => $noattend)
                <tr>
                    <td>{{ $noattend->student->name ?? '' }} {{ $noattend->student->surname ?? '' }}</td>
                    <td>{{ \App\Helpers\MaskHelper::changePhoneMask($noattend->student->phone) }}</td>
                    <td>{{ $noattend->group->name ?? '' }}</td>
                    <td>{{ $noattend->comment->comment ?? '' }}</td>
                    <td>
                        <a style="margin-right:10px;" data-bs-toggle="modal"
                           data-bs-target="#comment{{ $noattend->id }}" style="margin-right: 2px" href="">
                            <span class="fa fa-comment"></span>
                        </a>
                    </td>
                </tr>

                <div class="modal fade" id="comment{{ $noattend->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-900px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2></h2>
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24"
                                                         fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                              rx="1"
                                                              transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('noattendupdate',$noattend->id) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><strong>Comment:</strong></label>
                                            <textarea name="comment" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control"
                                            style="margin-left: 10px; margin-top:10px">Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection
