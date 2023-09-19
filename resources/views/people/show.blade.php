@extends('adminlte::page')

@section('title', '{{ $people->name }}')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('people.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="#" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {{ Form::label('Nombre') }}
                                            {{ Form::text('name', $people->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('Apellido') }}
                                            {{ Form::text('lastname', $people->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Lastname', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {{ Form::label('Correo') }}
                                            {{ Form::text('email', $people->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{ Form::label('Provincia') }}
                                            {{ Form::text('province', $people->province, ['class' => 'form-control' . ($errors->has('province') ? ' is-invalid' : ''), 'placeholder' => 'Province', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('province', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            {{ Form::label('Código Postal') }}
                                            {{ Form::text('zip_code', $people->zip_code, ['class' => 'form-control' . ($errors->has('zip_code') ? ' is-invalid' : ''), 'placeholder' => 'Zip Code', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('zip_code', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-9">
                                            {{ Form::label('Dirección') }}
                                            {{ Form::text('direction', $people->direction, ['class' => 'form-control' . ($errors->has('direction') ? ' is-invalid' : ''), 'placeholder' => 'Direction', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('direction', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            {{ Form::label('Sexo') }}
                                            {{ Form::text('sex', $people->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : ''), 'placeholder' => 'Sex', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('sex', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-3">
                                            {{ Form::label('Edad') }}
                                            {{ Form::text('age', $people->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => 'Age', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-3">
                                            {{ Form::label('DNI') }}
                                            {{ Form::text('dni', $people->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni', 'disabled' => 'disabled']) }}
                                            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                        <div class="form-group col-md-3">
                                            {{ Form::label('Fecha de nacimiento') }}
                                            @if ($people->date_birth)
                                                <br>
                                                {{ date('d/m/Y', strtotime($people->date_birth)) }}
                                            @else
                                                <span class="badge badge-secondary">No proporcionado</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
