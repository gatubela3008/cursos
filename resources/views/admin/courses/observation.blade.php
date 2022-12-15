@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Observaciones del curso: {{ $course->title }}
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body px-4 py-4">

            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
            <div class="form-group">
                {!! Form::label('body', 'Observaciones del curso') !!}
                {!! Form::textarea('body', null) !!}
            </div>
            @error('body')
                <p><strong class="text-danger">{{ $message }}</strong></p>
            @enderror

            {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
