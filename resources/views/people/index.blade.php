@extends('adminlte::page')

@section('title', 'Inicio - Personas')


@section('content')
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Provincia</th>
                                        <th>Código Postal</th>
                                        <th>Dirección</th>
                                        <th>Sexo</th>
                                        <th>Edad</th>
                                        <th>Dni</th>
                                        <th>Fecha de Nacimiento</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($people as $people)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $people->name }}</td>
                                            <td>{{ $people->lastname }}</td>
                                            <td>{{ $people->email }}</td>
                                            <td>{{ $people->province }}</td>
                                            <td>{{ $people->zip_code }}</td>
                                            <td>{!! Str::limit($people->direction, 20) !!}</td>
                                            <td>{{ $people->sex }}</td>
                                            <td>{{ $people->age }}</td>
                                            <td>{{ $people->dni }}</td>
                                            <td>{{ date('d/m/Y', strtotime($people->date_birth)) }}</td>

                                            <td>
                                                <form action="{{ route('people.destroy', $people->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('people.show', $people->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('people.edit', $people->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
