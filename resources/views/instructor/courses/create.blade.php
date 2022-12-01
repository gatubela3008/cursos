<x-app-layout>

    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">
                    CREAR NUEVO CURSO
                </h1>
                <hr class="mt.2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store', 'autocomplete' => 'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Crear nuevo curso', ['class' => 'cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name='js'>

        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

        <script src="{{ asset('js/instructor/courses/form.js') }}">

        </script>
    </x-slot>
</x-app-layout>
