@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-lg-4 col-xs-6">

        <div class="card bg-purple rounded shadow">
            <div class="card-body">
                <div class="d-flex no-block align-items-center">
                    <div class="text-white">
                        <h2 class="text-white font-weight-bold">
                            <a href="{{ route('people.index') }}" class="text-white text-bold">
                                {{ $people->count() }}
                            </a>
                        </h2>
                        <h6 class="text-white">
                            <a href="{{ route('people.index') }}" class="text-white">
                                Personas Registradas
                            </a>
                        </h6>
                    </div>
                    <div class="ml-auto">
                        <span class="text-white display-6">
                            <a href="{{ route('people.index') }}" class="text-white">
                                <i class="fas fa-users"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
