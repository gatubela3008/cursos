<x-instructor-layout>

    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">
        Información del curso
    </h1>

    <hr class="mt-2 mb-6">

    {!! Form::model($course, [
        'route' => ['instructor.courses.update', $course],
        'method' => 'put',
        'files' => true,
    ]) !!}

    @include('instructor.courses.partials.form')

    <div class="flex justify-end">
        {!! Form::submit('Actualizar información', ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer']) !!}
    </div>
    {!! Form::close() !!}

    <x-slot name='js'>

        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

        <script src="{{ asset('js/instructor/courses/form.js') }}">

        </script>
    </x-slot>
</x-app-layout>
