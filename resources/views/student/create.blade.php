@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Student</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
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


        {!! Form::open(array('route' => 'studentStore','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Name:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Surname:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Phone:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('phone', null, ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX",'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Status:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status', \App\Helpers\StatusHelper::$studentStatus,null, ['class' => 'form-control', 'data-control'=>"select2"]) !!}
                </div>
            </div>

            @if(request()->get('status') == 1)
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Interes Cource:</strong>
                        {!! Form::select('cource_id', $cources, null, ['placeholder' => 'Select a Cource','class' => 'form-control','data-control'=>"select2"]) !!}
                    </div>
                </div>
            @endif

            @if(request()->get('status') == 1)
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Interes Day:</strong>
                        {!! Form::select('day_id', $days, null, ['placeholder' => 'Select a Day','class' => 'form-control','data-control'=>"select2"]) !!}
                    </div>
                </div>
            @endif

            @if(request()->get('status') == 1)
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Interes Time:</strong>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="interes_hour" id="interes_hour" class="form-control">
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="interes_minute" id="end_minute" class="form-control">
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script>
        $('#phone').inputmask("(99)999-99-99");
        $('#parent_phone').inputmask("(99)999-99-99");
    </script>
@endsection
