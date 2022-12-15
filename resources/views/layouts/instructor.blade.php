<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <div class="container grid grid-cols-5 gap-6 py-8">
            <aside>
                <h1 class="mb-4 text-lg font-bold">
                    Edición del curso
                </h1>

                <ul class="mb-8 text-sm text-gray-600">
                    <li
                        class="leading-7 mb-1 border-l-4
                            @routeIs('instructor.courses.edit', $course)
                                border-indigo-400
                            @else
                                border-transparent
                            @endif
                            pl-2">
                        <a href="{{ route('instructor.courses.edit', $course) }}">
                            Información del curso
                        </a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4
                            @routeIs('instructor.courses.curriculum', $course)
                                border-indigo-400
                            @else
                                border-transparent
                            @endif
                            pl-2">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}">
                            Lecciones del curso
                        </a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4
                            @routeIs('instructor.courses.goals', $course)
                                border-indigo-400
                            @else
                                border-transparent
                            @endif
                            pl-2">
                        <a href="{{ route('instructor.courses.goals', $course) }}">
                            Metas del curso
                        </a>
                    </li>
                    <li
                        class="leading-7 mb-1 border-l-4
                            @routeIs('instructor.courses.students', $course)
                                border-indigo-400
                            @else
                                border-transparent
                            @endif
                            pl-2">
                        <a href="{{ route('instructor.courses.students', $course) }}">
                            Estudiantes
                        </a>
                    </li>

                    @if ($course->observation)
                        <li
                            class="leading-7 mb-1 border-l-4
                        @routeIs('instructor.courses.observation', $course)
                            border-indigo-400
                        @else
                            border-transparent
                        @endif
                        pl-2">
                            <a href="{{ route('instructor.courses.observation', $course) }}">
                                Observaciones
                            </a>
                        </li>
                    @endif
                </ul>

                @switch($course->status)
                    @case(1)
                        {{-- Course::BORRADOR  --}}
                        <form action="{{ route('instructor.courses.status', $course) }}" method="post">
                            @csrf

                            <button class="text-sm rounded-lg btn btn-red">
                                Solicitar revisión
                            </button>
                        </form>
                    @break

                    @case(2)
                        {{-- Course::REVISION  --}}
                        <div class="text-gray-500 card">
                            <div class="card-body">
                                Este curso se encuentra en revisión
                            </div>
                        </div>
                    @break

                    @case(3)
                        {{-- Course::PUBLICADO  --}}
                        <div class="text-gray-500 card">
                            <div class="card-body">
                                Este curso se encuentra publicado
                            </div>
                        </div>
                    @break

                    @default
                @endswitch

            </aside>

            <div class="col-span-4 card">
                <main class="text-gray-600 card-body">

                    {{ $slot }}

                </main>
            </div>
        </div>
    </div>

    @stack('modals')
    @stack('js')

    @isset($js)
        {{ $js }}
    @endisset

    @livewireScripts
</body>

</html>
