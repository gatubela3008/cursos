@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Precio</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) !!}
                @error('name')
                    <span class="text-danger text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('value', 'Valor') !!}
                {!! Form::number('value', null, ['class' => 'form-control', 'step' => 0.01, 'min' => 0, 'max' => 5000]) !!}
                @error('value')
                    <span class="text-danger text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
