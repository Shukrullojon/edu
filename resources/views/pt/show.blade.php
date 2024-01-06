@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Placement Test</h2>
                    <br>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Question:</strong>
                    {{ $pt->question }}
                </div>

                <div class="form-group">
                    <strong>A:</strong>
                    {{ $pt->a }}
                </div>

                <div class="form-group">
                    <strong>B:</strong>
                    {{ $pt->b }}
                </div>

                <div class="form-group">
                    <strong>C:</strong>
                    {{ $pt->c }}
                </div>

                <div class="form-group">
                    <strong>D:</strong>
                    {{ $pt->d }}
                </div>

                <div class="form-group">
                    <strong>Answer:</strong>
                    {{ \App\Helpers\PTHelper::answerGet($pt->answer) }}
                </div>

                <div class="form-group">
                    <strong>Category:</strong>
                    {{ $pt->pc->name ?? '' }}
                </div>
            </div>
        </div>
    </div>
@endsection
