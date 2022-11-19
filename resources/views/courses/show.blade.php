<x-app-layout>

    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">
                    {{ $course->title }}
                </h1>
                <h2 class="text-xl mb-3">
                    {{ $course->subtitle }}
                </h2>
                <p>
                    <i class="fas fa-list mr-4 text-sm pl-1"></i>
                    Nivel:
                    <span class="ml-4">
                        {{ $course->level->name }}
                    </span>
                </p>
                <p>
                    <i class="fas fa-tags mr-4 text-sm "></i>
                    Categoría:
                    <span class="ml-4">
                        {{ $course->category->name }}
                    </span>
                </p>
                <p>
                    <i class="fas fa-users mr-4 text-sm ""></i>
                    Matriculados:
                    <span class="ml-4">
                        {{ $course->students_count }}
                    </span>
                </p>
                <div class="flex">
                    <i class="far fa-star mr-4 text-sm pl-1"></i>
                    <p>
                        Calificación:
                    </p>
                    <ul class="ml-4 text-sm flex">
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

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:order-1 lg:col-span-2">
            <section class="mb-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="font-bold text-2xl mb-2">
                            Lo que aprenderás
                        </h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                            @foreach ($course->goals as $goal)
                                <li class="text-base text-gray-700">
                                    <i class="fas fa-check text-gray-600 mr-2"></i>
                                    {{ $goal->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold mb-2 text-3xl">
                    Temario
                </h1>

                @foreach ($course->sections as $section)
                    <article class="mb-2 shadow"
                        @if ($loop->first) x-data="{open: true }"
                        @else
                            x-data="{open: false }" @endif>

                        <header class="border border-gray-400 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600" x-on:click="open = !open">
                                {{ $section->name }}
                            </h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base">
                                        <i class="fas fa-play-circle mr-2 text-gray-600"></i>
                                        {{ $lesson->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach

            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl">
                    Requisitos
                </h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">

                            {{ $requirement->name }}
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl">
                    Descripción
                </h1>
                <div class="text-gray-700 text-base">
                    {{ $course->description }}
                </div>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 shadow-xl object-cover rounded-full"
                            src="{{ $course->teacher->profile_photo_url }}" title="{{ $course->teacher->name }}"
                            alt="{{ $course->teacher->name }}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-600 text-lg">
                                Prof. {{ $course->teacher->name }}
                            </h1>
                            <a href="route('')" class="text-blue-400 text-sm font-bold">
                                {{ '@' . Str::slug($course->teacher->name, '') }}
                            </a>
                        </div>
                    </div>

                    @can('enrolled', $course)
                        <a href="{{ route('courses.status', $course) }}" class="btn btn-block btn-red mt-4">
                            Continuar con el curso
                        </a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="post">
                            @csrf

                            <button class="btn btn-block btn-red mt-4">
                                Llevar este curso
                            </button>
                        </form>
                    @endcan



                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}"
                            alt="">
                        <div class="ml-3">
                            <h1>
                                <a href="{{ route('courses.show', $similar) }}" class="font-bold text-gray-500 mb-3">
                                    {{ Str::limit($similar->title, 40) }}
                                </a>
                                <div class="flex items-center">
                                    <img class="h-8 w-8 object-cover rounded-full shadow"
                                        src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                    <p class="text-sm text-gray-700 ml-2">
                                        Pf. {{ $similar->teacher->name }}
                                    </p>

                                </div>
                                <p class="text-sm">
                                    <i class="fas fa-star text-green-400"></i>{{ $similar->rating }}
                                </p>
                            </h1>
                        </div>
                    </article>
                @endforeach
            </aside>

        </div>
    </div>

</x-app-layout>
