<x-app-layout>

    <section class="py-12 mb-12 bg-gray-700">
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                <img class="object-cover w-full h-60" src="{{ Storage::url($course->image->url) }}" alt="">
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
                            <i class="fas fa-star {{ $course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
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
        <div class="order-2 lg:order-1 lg:col-span-2">
            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-2 text-2xl font-bold">
                            Lo que aprenderás
                        </h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                            @foreach ($course->goals as $goal)
                                <li class="text-base text-gray-700">
                                    <i class="mr-2 text-gray-600 fas fa-check"></i>
                                    {{ $goal->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mb-2 text-3xl font-bold">
                            Temario
                        </h1>

                        @foreach ($course->sections as $section)
                            <article class="mb-2 shadow"
                                @if ($loop->first) x-data="{open: true }"
                        @else
                            x-data="{open: false }" @endif>

                                <header class="px-4 py-2 bg-gray-200 border border-gray-400 cursor-pointer">
                                    <h1 class="text-lg font-bold text-gray-600" x-on:click="open = !open">
                                        {{ $section->name }}
                                    </h1>
                                </header>

                                <div class="px-4 py-2 bg-white shadow-md" x-show="open">
                                    <ul class="grid grid-cols-1 gap-2">
                                        @foreach ($section->lessons as $lesson)
                                            <li class="text-base text-gray-700">
                                                <i class="mr-2 text-gray-600 fas fa-play-circle"></i>
                                                {{ $lesson->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
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
                            @foreach ($course->requirements as $requirement)
                                <li class="text-base text-gray-700">

                                    {{ $requirement->name }}
                                </li>
                            @endforeach
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

            @livewire('courses-review', ['course' => $course])

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

                    @can('enrolled', $course)
                        <a href="{{ route('courses.status', $course) }}" class="mt-4 btn btn-block btn-red">
                            Continuar con el curso
                        </a>
                    @else
                        @if ($course->price->value == 0)
                            <form action="{{ route('courses.enrolled', $course) }}" method="post">
                                @csrf
                                <p class="font-bold text-2xl text-gray-500 mt-3 mb-4">GRATIS</p>
                                <button class="mt-4 btn btn-block btn-red">
                                    Llevar este curso
                                </button>
                            </form>
                        @else
                            <a href="" class="mt-4 btn btn-block btn-red">
                                <p class="font-bold text-2xl text-gray-500 mt-3 mb-4">US$ {{ $course->price->value == 0 }}</p>
                                Comprar este curso
                            </a>
                        @endif
                    @endcan



                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="object-cover w-40 h-32" src="{{ Storage::url($similar->image->url) }}"
                            alt="">
                        <div class="ml-3">
                            <h1>
                                <a href="{{ route('courses.show', $similar) }}" class="mb-3 font-bold text-gray-500">
                                    {{ Str::limit($similar->title, 40) }}
                                </a>
                                <div class="flex items-center">
                                    <img class="object-cover w-8 h-8 rounded-full shadow"
                                        src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                    <p class="ml-2 text-sm text-gray-700">
                                        Pf. {{ $similar->teacher->name }}
                                    </p>

                                </div>
                                <p class="text-sm">
                                    <i class="text-green-400 fas fa-star"></i>{{ $similar->rating }}
                                </p>
                            </h1>
                        </div>
                    </article>
                @endforeach
            </aside>

        </div>
    </div>

</x-app-layout>
