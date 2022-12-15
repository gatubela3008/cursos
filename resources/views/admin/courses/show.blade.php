<x-app-layout>

    <section class="py-12 mb-12 bg-gray-700">
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                @if ($course->image)
                    <img class="object-cover w-full h-60" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img class="object-cover w-full h-60" src="{{ asset('img/cursos/pexels-fauxels-3184357.jpg') }}"
                        alt="">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">
                    {{ $course->title }}
                </h1>
                <h2 class="mb-3 text-xl">
                    {{ $course->subtitle }}
                </h2>
                <p>
                    <i class="pl-1 mr-4 text-sm fas fa-list"></i>
                    Nivel:
                    <span class="ml-4">
                        {{ $course->level->name }}
                    </span>
                </p>
                <p>
                    <i class="mr-4 text-sm fas fa-tags "></i>
                    Categoría:
                    <span class="ml-4">
                        {{ $course->category->name }}
                    </span>
                </p>
                <p>
                    <i class="mr-4 text-sm fas fa-users ""></i>
                    Matriculados:
                    <span class="ml-4">
                        {{ $course->students_count }}
                    </span>
                </p>
                <div class="flex">
                    <i class="pl-1 mr-4 text-sm far fa-star"></i>
                    <p>
                        Calificación:
                    </p>
                    <ul class="flex ml-4 text-sm">
                        <li class="mr-1">
                            <i class="fas fa-star {{ $course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star {{ $course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star {{ $course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                        </li>
                        <li class="mr-1">
                            <i
                                class="fas fa-star {{ $course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                        </li>
                        <li class="mr-1">
                            <i
                                class="fas fa-star  {{ $course->rating == 5 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open:true}" x-show="open">
                <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <strong class="font-bold">¡OCURRIÓ UN ERROR!</strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg x-on:click="open=false" class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif


        <div class="order-2 lg:order-1 lg:col-span-2">

            {{-- Metas --}}
            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-2 text-2xl font-bold">
                            Lo que aprenderás
                        </h1>
                    </div>
                    <div class="card-body">
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                            @forelse ($course->goals as $goal)
                                <li class="text-base text-gray-700">
                                    <i class="mr-2 text-gray-600 fas fa-check"></i>
                                    {{ $goal->name }}
                                </li>
                            @empty
                                <li class="text-base text-red-700">
                                    Este curso no tiene asignado ninguna meta
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </section>

            {{-- Secciones --}}
            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-2 text-3xl font-bold">
                            Temario
                        </h1>


                        @forelse ($course->sections as $section)
                            <article class="mb-2 shadow"
                                @if ($loop->first) x-data="{open: true }"
                        @else
                            x-data="{open: false }" @endif>

                                <header class="px-4 py-2 bg-gray-200 border border-gray-400 cursor-pointer">
                                    <h1 class="text-lg font-bold text-gray-600" x-on:click="open = !open">
                                        {{ $section->name }}
                                    </h1>
                                </header>
                                {{-- Leeciones --}}
                                <div class="px-2 py-2 bg-white" x-show="open">
                                    <ul class="grid grid-cols-1 gap-2">
                                        @forelse ($section->lessons as $lesson)
                                            <li class="text-base text-gray-700">
                                                <i class="mr-2 text-gray-600 fas fa-play-circle"></i>
                                                {{ $lesson->name }}
                                            </li>
                                        @empty
                                            <li class="text-base text-red-700">
                                                Esta sección no tiene ninguna lección
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </article>
                        @empty
                            <article class="py-2 text-base text-red-700">
                                Este curso no tiene asignado ninguna sección
                            </article>
                        @endforelse
                    </div>
                </div>
            </section>

            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold">
                            Requisitos
                        </h1>
                        <ul class="list-disc list-inside">
                            @forelse ($course->requirements as $requirement)
                                <li class="text-base text-gray-700">
                                    {{ $requirement->name }}
                                </li>
                            @empty
                                <article class="py-2 text-base text-red-700 ">
                                    Este curso no tiene asignado nungún requerimiento
                                </article>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </section>

            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold">
                            Descripción
                        </h1>
                        <div class="text-base text-gray-700">
                            {!! $course->description !!}
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="mb-4 card">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-xl"
                            src="{{ $course->teacher->profile_photo_url }}" title="{{ $course->teacher->name }}"
                            alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="text-lg font-bold text-gray-600">
                                Prof. {{ $course->teacher->name }}
                            </h1>
                            <a href="route('')" class="text-sm font-bold text-blue-400">
                                {{ '@' . Str::slug($course->teacher->name, '') }}
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4" method="POST">
                        @csrf
                        <button x-on:click="submit" class="w-full text-white bg-blue-500 btn">
                            Aprobar el curso
                        </button>
                    </form>

                    <a href="{{ route('admin.courses.observation', $course) }}" class="w-full block mt-4 text-center text-white bg-red-500 btn">
                        Observaciones del curso
                    </a>
                </div>
            </section>



        </div>
    </div>

</x-app-layout>
