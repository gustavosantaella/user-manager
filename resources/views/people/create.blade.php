@extends('adminlte::page')

@section('title', 'Crear Personas')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Personas</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('people.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('people.form')

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
