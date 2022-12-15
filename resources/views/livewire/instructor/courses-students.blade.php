<div>

    <h1 class="mb-4 text-2xl fond-bold">
        Estudiantes del Curso
    </h1>

    <x-table-responsive>

        <div class="px-6 py-4 ">
            <input type="text"
            class="w-full rounded-lg shadow-sm form-input "
            placeholder="Ingrese lo que va a buscar"
            wire:model="search">
        </div>

        @if ($students->count() > 0)

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase">
                            Nombre
                        </th>
                        <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase">
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
                                                class="object-cover object-center w-full h-full rounded-full" alt="">
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $student->name }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $student->email }}
                                </div>

                            </td>


                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

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
