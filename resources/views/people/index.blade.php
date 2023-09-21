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
                            <div class="form-inline">
                                <form action="{{ route('people.index') }}" method="GET" class="">
                                    <!-- Input de búsqueda por nombre, con el nombre "search" -->
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="text" class="form-control" id="search_query" name="search_query"
                                                value="{{ request('search_query') }}">
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary btn-sm" type="submit">Buscar <i
                                                    class="fab fa-searchengin"></i></button>
                                        </div>
                                    </div>
                                    @if (request()->has('filters'))
                                        @foreach (request('filters') as $filter)
                                            <input type="hidden" name="filters[]" value="{{ $filter }}">
                                        @endforeach
                                    @endif

                                </form>

                                <button type="button" class="btn btn-primary btn-sm mx-3" data-toggle="modal"
                                    data-target="#filtersModal">
                                    Filtros
                                </button>
                            </div>


                            <!-- Modal de filtros -->
                            <div class="modal fade" id="filtersModal" tabindex="-1" role="dialog"
                                aria-labelledby="filtersModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="filtersModalLabel">Seleccionar filtros</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('people.index') }}" method="GET">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="name">
                                                            <label class="form-check-label">Nombre</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="lastname">
                                                            <label class="form-check-label">Apellido</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="province">
                                                            <label class="form-check-label">Provincia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="zip_code">
                                                            <label class="form-check-label">Codigo postal</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="direction">
                                                            <label class="form-check-label">Direccion</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="sex">
                                                            <label class="form-check-label">Sexo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="filters[]"
                                                                value="age">
                                                            <label class="form-check-label">Edad</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filters[]" value="dni">
                                                            <label class="form-check-label">DNI</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="filters[]" value="date_birth">
                                                            <label class="form-check-label">Fecha de nacimiento</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Aplicar filtros</button>
                                                @if (request()->has('search_query'))
                                                    <input type="hidden" name="search_query"
                                                        value="{{ request('search_query') }}">
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="float-right">
                                <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm float-right ml-2"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm float-right ml-2"
                                    data-toggle="modal" data-target="#staticBackdrop">
                                    Importar datos
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">importar datos</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('people.import') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                id="inputGroupFileAddon01">Subir
                                                                xlsx</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01"
                                                                aria-describedby="inputGroupFileAddon01" name="file"
                                                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile01">Seleccionar archivo: </label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Importar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('people.export') }}" target="_blank"
                                    class="btn btn-success btn-sm float-right ml-2">Exportar datos</a>

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
                <nav aria-label="Page navigation example" class="float-end float-right">
                    <ul class="pagination float-end">
                        @if ($persons->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $persons->previousPageUrl() }}">Previous</a></li>
                        @endif

                        @foreach ($persons->getUrlRange(1, $persons->lastPage()) as $page => $url)
                            @if ($page == $persons->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        @if ($persons->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $persons->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Captura el cambio en el input de archivo
            $('#inputGroupFile01').on('change', function() {
                // Obtiene el nombre del archivo seleccionado
                var fileName = $(this).val().split('\\').pop();

                // Actualiza el label con el nombre del archivo
                $('.custom-file-label').text(fileName);
            });

            // Valida que el archivo seleccionado tenga la extensión .xlsx
            $('form').on('submit', function(e) {
                var fileName = $('#inputGroupFile01').val();
                var extension = fileName.split('.').pop().toLowerCase();

                if (extension !== 'xlsx') {
                    e.preventDefault();
                    alert('Por favor, selecciona un archivo con extensión .xlsx.');
                }
            });
        });
    </script>

@stop
