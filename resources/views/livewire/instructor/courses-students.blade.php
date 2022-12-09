<div>
    <x-slot name='course'>
        {{  $course->slug }}
    </x-slot>

    <h1 class="text-2xl fond-bold mb-4">
        Estudiantes del Curso
    </h1>

    <x-table-responsive>

        <div class="px-6 py-4 ">
            <input type="text"
            class="rounded-lg w-full form-input shadow-sm "
            placeholder="Ingrese lo que va a buscar"
            wire:model="search">
        </div>

        @if ($students->count() > 0)

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            email
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img src="{{ $student->profile_photo_url }}"
                                                class="w-full h-full rounded-full object-cover object-center" alt="">
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-gray-900 text-sm font-medium">
                                            {{ $student->name }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-900 text-sm">
                                    {{ $student->email }}
                                </div>

                            </td>


                            <td class="py-4 px-6 whitespace-nowrap text-sm text-right font-medium">

                                <a href=""
                                    class="text-indigo-600 hover:text-indigo-900">
                                    Ver
                                </a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <div class="px-6 py-4 whitespace-nowrap">
                {{ $students->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                No hay nigun registro que coincida con la busqueda
            </div>
        @endif
    </x-table-responsive>
</div>
