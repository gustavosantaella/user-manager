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
                                            <td>
                                                @if ($people->date_birth)
                                                    {{ date('d/m/Y', strtotime($people->date_birth)) }}
                                                @else
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('people.destroy', $people->id) }}" method="POST"
                                                    class="d-flex align-items-center">
                                                    <a class="mr-2" href="{{ route('people.show', $people->id) }}"><i
                                                            class="fa fa-fw fa-eye text-primary"></i></a>
                                                    <a class="mr-2" href="{{ route('people.edit', $people->id) }}"><i
                                                            class="fa fa-fw fa-edit text-success"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                                        <i class="fa fa-fw fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $people->links() !!} --}}
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
