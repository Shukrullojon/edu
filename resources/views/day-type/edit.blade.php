@extends('layouts.admin')

@section('content')
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
        {!! Form::model($day_types, ['method' => 'PATCH','route' => ['day-type.update', $day_types->id]]) !!}

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label
                        for="name"><strong>Name:</strong></label> {!! Form::label('name',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', $day_types->name, ['autocomplete'=>'off','placeholder' => 'Name','class' => 'form-control',]) !!}
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <label
                        for="cource_id"><strong>Days:</strong></label> {!! Form::label('cource_id',"*",['style'=>"color:red"]) !!}
                        <select name="days[]" class="form-control" data-control="select2" id="day_for_type_edit">
                            @foreach (\App\Helpers\TypeHelper::$weekDays as $key => $item)
                                <option value="{{$key}}" >{{$item}}</option>
                            @endforeach
                        </select>
                </div>
            </div>





            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $("#day_for_type_edit").select2({
                multiple: true,
            });

            var something = <?php echo json_encode(json_decode($day_types->days)); ?>;
            $("#day_for_type_edit").val(something).trigger('change');

        });
    </script>

@endsection
