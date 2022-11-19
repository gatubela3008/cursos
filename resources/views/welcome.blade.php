<x-app-layout>

    <section class="bg-cover" style="background-image:url({{ asset('img/home/pexels-fox-1595391.jpg') }})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-extrabold text-4xl text-blue-900">
                    Domina la Ofimática con Soluciones EMGB
                </h1>
                <p class="text-red-700 font-bold text-lg mt-2">
                    En esta plataforma de cursos encontrarás la tegnología para aprender ofimática
                </p>

                <!-- component -->
                <!-- This is an example component -->
                @livewire('search')
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">
            CONTENIDO
        </h1>

        <div
            class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"
                        src="{{ asset('img/home/calculator-385506_640.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-gray-700 text-xl">
                        Cursos y Proyecto
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident expedita commodi quisquam
                        nostrum eos impedit neque, quo reprehenderit unde fugit veritatis quae. Inventore deserunt
                        voluptatem ex quas? Cumque, ab aliquid.
                    </p>

                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"
                        src="{{ asset('img/home/digital-marketing-1433427_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700 text-xl">
                        Manuales
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident expedita commodi quisquam
                        nostrum eos impedit neque, quo reprehenderit unde fugit veritatis quae. Inventore deserunt
                        voluptatem ex quas? Cumque, ab aliquid.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"
                        src="{{ asset('img/home/student-849825_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700 text-xl">
                        Blog
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident expedita commodi quisquam
                        nostrum eos impedit neque, quo reprehenderit unde fugit veritatis quae. Inventore deserunt
                        voluptatem ex quas? Cumque, ab aliquid.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"
                        src="{{ asset('img/home/laptop-2838921_640.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700 text-xl">
                        Desarrollo Web
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident expedita commodi quisquam
                        nostrum eos impedit neque, quo reprehenderit unde fugit veritatis quae. Inventore deserunt
                        voluptatem ex quas? Cumque, ab aliquid.
                    </p>
                </header>
            </article>

        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-3xl text-white">
            ¿No sabes qué curso llevar?
        </h1>
        <p class="text-center text-white">
            Dirígete al catálogo de cursos y fíltralos por categoría
        </p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de Cursos
            </a>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-center text-3xl text-gray-600 ">
            ÚLTIMOS CURSOS
        </h1>
        <p class="text-center text-gray-500 text-sm mb-6">
            Trabajo duro para seguir subiendo cursos
        </p>
        <div
            class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>
