@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Tests: {{ $pts->total() }}</span>
                </h3>
                <div>
                    <a class="btn btn-sm btn-active-success" href="{{ route('pt.create') }}">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-plus"></span>
                        Create
                    </a>

                    <a href="#" class="btn btn-sm btn-active-primary" data-bs-toggle="modal"
                       data-bs-target="#test_filter">
                        <span class="svg-icon svg-icon-3"></span>
                        <span class="fa fa-filter"></span>
                        Filter
                    </a>
                </div>
            </div>

            <div class="card-body py-3">
                <table class="table table-bordered">
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Question</b></th>
                        <th><b>A</b></th>
                        <th><b>B</b></th>
                        <th><b>D</b></th>
                        <th><b>D</b></th>
                        <th><b>Answer</b></th>
                        <th><b>Category</b></th>
                        <th><b>Action</b></th>
                    </tr>
                    @php $i = (!empty(request()->get('page')) ? (request()->get('page') -1) * 20 : 0) + 1; @endphp
                    @foreach ($pts as $key => $pt)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $pt->question }}</td>
                            <td>{{ $pt->a }}</td>
                            <td>{{ $pt->b }}</td>
                            <td>{{ $pt->c }}</td>
                            <td>{{ $pt->d }}</td>
                            <td>{{ \App\Helpers\PTHelper::answerGet($pt->answer) }}</td>
                            <td>{{ $pt->pc->name ?? '' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="" style="margin-right: 10px" href="{{ route('pt.show',$pt->id) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a class="" style="margin-right: 2px" href="{{ route('pt.edit',$pt->id) }}">
                                        <span class="fa fa-edit" style="color: #562bb0"></span>
                                    </a>

                                    <form action="{{ route("pt.destroy", $pt->id) }}" method="POST">
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
                <tfooter>
                    <tr>
                        <td colspan="9">
                            {{
                                $pts->appends([
                                    'page' => request()->get('page'),
                                    'question' => request()->get('question'),
                                    'category_id' => request()->get('category_id')
                                ])
                            }}
                        </td>
                    </tr>
                </tfooter>
            </div>
        </div>
    </div>


    <div class="modal fade" id="test_filter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"/>
                            </svg>
						</span>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body scroll-y">
                    <div class="mb-10">
                        {!! Form::open(array('method'=>'GET')) !!}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Question:</strong>
                                    {!! Form::text('question', request()->get('question'), ['placeholder' => 'Question','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    {!! Form::select('category_id',$categories, request()->get('category_id'), ['placeholder' => 'Category','maxlength'=> 100,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
