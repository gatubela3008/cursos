@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear un Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open() !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
