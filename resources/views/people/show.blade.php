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

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $people->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $people->lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $people->email }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $people->province }}
                        </div>
                        <div class="form-group">
                            <strong>Código Postal:</strong>
                            {{ $people->zip_code }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $people->direction }}
                        </div>
                        <div class="form-group">
                            <strong>Sexo:</strong>
                            {{ $people->sex }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $people->age }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $people->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de nacimiento:</strong>
                            {{ date('d/m/Y', strtotime($people->date_birth)) }}
                        </div>

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
