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
                            <!-- Agregar el formulario de búsqueda y filtros aquí -->
                            <div class="mb-3">
                                <form action="{{ route('people.index') }}" method="GET" class="form-inline">
                                    <!-- Input de búsqueda por nombre, con el nombre "search" -->
                                    <div class="form-group">
                                        <label for="search">Buscar por nombre:</label>
                                        <input type="text" class="form-control" id="search" name="search"
                                            value="{{ request('search') }}">
                                    </div>

                                    <!-- Multiselect para los filtros -->
                                    <div class="form-group ml-3">
                                        <label for="filters">Filtrar por:</label>
                                        <select class="form-control select2" id="filters" name="filters[]"
                                            multiple="multiple">
                                            <option value="name" @if (in_array('name', request('filters', []))) selected @endif>Nombre
                                            </option>
                                            <option value="lastname" @if (in_array('lastname', request('filters', []))) selected @endif>
                                                Apellido</option>
                                            <option value="email" @if (in_array('email', request('filters', []))) selected @endif>Correo
                                            </option>
                                            <option value="province" @if (in_array('province', request('filters', []))) selected @endif>
                                                Provincia</option>
                                            <!-- Agrega más opciones para otros campos de filtro aquí -->
                                        </select>
                                    </div>

                                    <!-- Botón de búsqueda -->
                                    <button type="submit" class="btn btn-primary ml-3">Buscar</button>
                                </form>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-3">
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

                                            <td>
                                                @if ($people->name)
                                                    {{ $people->name }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->lastname)
                                                    {{ $people->lastname }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->email)
                                                    {{ $people->email }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->province)
                                                    {{ $people->province }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->zip_code)
                                                    {{ $people->zip_code }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->direction)
                                                    {!! Str::limit($people->direction, 20) !!}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->sex)
                                                    {{ $people->sex }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->age)
                                                    {{ $people->age }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->dni)
                                                    {{ $people->dni }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($people->date_birth)
                                                    {{ date('d/m/Y', strtotime($people->date_birth)) }}
                                                @else
                                                    <span class="badge badge-secondary">No proporcionado</span>
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
    <!-- Select2 --->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <!-- Select2 --->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
@stop
