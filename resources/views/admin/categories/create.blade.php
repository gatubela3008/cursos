@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) !!}
                @error('name')
                    <span class="text-danger text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {!! Form::submit('Agregar categoría', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
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
