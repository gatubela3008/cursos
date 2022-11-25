<x-app-layout>

    <section class="bg-cover" style="background-image:url({{ asset('img/cursos/employee-3005501_1920.jpg') }})">
        <div class="container py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-extrabold text-4xl text-gray-900">
                    Los mejores cursos de Ofimática
                </h1>
                <p class="text-amber-300 font-bold text-lg mt-2 text-right">
                    Excel, Word, PowerPoint, Access, Outlook
                </p>

                @livewire('search')
            </div>

        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>
