@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Book Management</h2>
                <a class="btn btn-success" href="{{ route('book.create') }}">Create</a>
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
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0">
                <tr>
                    <th>Name</th>
                    <th>Came</th>
                    <th>Given</th>
                    <th>Remain</th>
                    <th>Action</th>
                </tr>
                @foreach ($books as $key => $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ number_format($book->book_sum->count ?? 0 ,0,',',',') }}</td>
                        <td>{{ number_format($book->book_sum->sale ?? 0,0,',',',') }}</td>
                        <td>{{ number_format($book->book_sum->count - $book->book_sum->sale, 0, ',',',') }}</td>
                        <td>
                            <div class="btn-group">
                                <a data-bs-toggle="modal" data-bs-target="#book_count{{ $book->id }}" style="margin-right: 10px" href="">
                                    <span class="fa fa-plus" style="color: #0bb783"></span>
                                </a>

                                <a class="" style="margin-right: 10px" href="{{ route('book.show',$book->id) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="" style="margin-right: 2px" href="{{ route('book.edit',$book->id) }}">
                                    <span class="fa fa-edit" style="color: #562bb0"></span>
                                </a>

                                <form action="{{ route("book.destroy", $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                                </form>

                                <div class="modal fade" id="book_count{{ $book->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-900px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2></h2>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                         fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                              transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                              transform="rotate(45 7.41422 6)" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="modal-body py-lg-10 px-lg-10">
                                                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
                                                    <form action="{{ route('bookCountAdd') }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="row">
                                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label><strong>Count:</strong></label>
                                                                    <input type="number" min="1" name="count" value="" placeholder="Count" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label><strong>Price:</strong></label>
                                                                    <input type="number" min="1" name="price" value="" placeholder="Price" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label><strong>Sell Price:</strong></label>
                                                                    <input type="number" min="1" name="sell_price" value="" placeholder="Sell Price" class="form-control">
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary form-control" style="margin-left: 10px; margin-top:10px">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $books->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection
