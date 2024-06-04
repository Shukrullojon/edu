@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Student</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($student, ['method' => 'PATCH','route' => ['student.update', $student->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Id Code:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('id_code', null, array('placeholder' => 'Id Code','class' => 'form-control')) !!}
                                </div>
                            </div>

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
                                    {!! Form::select('status', \App\Models\User::$student_status,$student->status, ['class' => 'form-control', 'data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Group:</strong>
                                    {!! Form::select('group_id', $groups, null, ['placeholder' => 'Select a group','class' => 'form-control','data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Series Number:</strong>
                                    {!! Form::text('series_number', null, ['placeholder' => '','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><strong>Image:</strong></label><br>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><strong>Docs:</strong></label><br>
                                    <input type="file" name="docs[]" multiple="multiple" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Comment:</strong>
                                    {!! Form::textarea('comment', null, ['placeholder' => '', 'rows' => 3,'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Interes Cource:</strong>
                                    {!! Form::select('cource_id', $cources, null, ['placeholder' => 'Select a Cource','class' => 'form-control','data-control'=>"select2"]) !!}
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <strong>Interes Day:</strong>
                                    {!! Form::select('day_id', $days, null, ['placeholder' => 'Select a Day','class' => 'form-control','data-control'=>"select2"]) !!}
                                </div>
                            </div>

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

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
