@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Staff</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'staff.store','method'=>'POST']) !!}
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="name"><strong>Name:</strong></label>{!! Form::label('name',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('name', null, ['autocomplete'=>'OFF','id'=>'name','placeholder' => 'Name','required'=>true,'class' => "form-control ".($errors->has('name') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                 <div class="form-group">
                                    <label for="surname"><strong>Surname:</strong></label>{!! Form::label('surname',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('surname', null, ['autocomplete'=>'OFF','id'=>'surname','placeholder' => 'Surname','required'=>true,'class' => "form-control ".($errors->has('surname') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('surname'))
                                        <span class="error invalid-feedback">{{ $errors->first('surname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="filial_id"><strong>Filial:</strong></label>{!! Form::label('filial_id',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('filial_id', $filials,null, ['autocomplete'=>'OFF','id'=>'filial_id','required'=>true,'class' => "form-control ".($errors->has('filial_id') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('filial_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('filial_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="phone"><strong>Phone:</strong></label>{!! Form::label('phone',"*",['style'=>"color:red"]) !!}
                                    {!! Form::text('phone', null, ['autocomplete'=>'OFF','id'=>'phone', 'placeholder' => "(XX)XXX-XX-XX",'required'=>true,'class' => "form-control ".($errors->has('phone') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('phone'))
                                        <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="password"><strong>Password:</strong></label>{!! Form::label('password',"*",['style'=>"color:red"]) !!}
                                    {!! Form::password('password', ['autocomplete'=>'OFF','id'=>'password','placeholder' => 'Password','required'=>true,'class' => 'form-control']) !!}
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="confirm-password"><strong>Confirm Password:</strong></label>{!! Form::label('confirm-password',"*",['style'=>"color:red"]) !!}
                                    {!! Form::password('confirm-password', ['autocomplete'=>'OFF','id'=>'confirm-password','placeholder' => 'Confirm Password','required'=>true,'class' => 'form-control']) !!}
                                    @if($errors->has('confirm-password'))
                                        <span class="error invalid-feedback">{{ $errors->first('confirm-password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="roles"><strong>Roles:</strong></label>{!! Form::label('roles',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('roles[]', $roles,[], ['id'=>'roles','required'=>true,'class' => 'form-control','multiple', 'data-control'=>'select2']) !!}
                                    @if($errors->has('roles'))
                                        <span class="error invalid-feedback">{{ $errors->first('roles') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="directions"><strong>Directions:</strong></label>{!! Form::label('directions',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('directions[]', $directions,[], ['id'=>'directions','data-control'=>'select2','class' => 'form-control form-select-solid','multiple']) !!}
                                    @if($errors->has('directions'))
                                        <span class="error invalid-feedback">{{ $errors->first('directions') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="langs"><strong>Langs:</strong></label>{!! Form::label('langs',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('langs[]', $langs,[], ['id'=>'langs',/*'data-control'=>'select2',*/'class' => 'form-control form-select-solid','multiple' => true]) !!}
                                    @if($errors->has('langs'))
                                        <span class="error invalid-feedback">{{ $errors->first('langs') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="status"><strong>Status:</strong></label>{!! Form::label('status',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('status',\App\Models\User::$staff_status, null, ['id' => 'status','required'=>true, 'class' => 'form-control']) !!}
                                    @if($errors->has('status'))
                                        <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                                    @endif
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
