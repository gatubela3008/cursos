<div class="container py-8">
    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input type="text"
            class="rounded-lg form-input flex-1 shadow-sm"
            placeholder="Ingrese lo que va a buscar"
            wire:model="search"
            wire:keydown="limpiar_page">

            <a href="{{ route('instructor.courses.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded h-12 ml-2">
                Crear nuevo curso
            </a>
        </div>

        @if ($courses->count() > 0)

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Calificación
                        </th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">

                                        @isset($course->image)
                                            <img id="picture" class="w-full h-full rounded-full object-cover object-center"
                                                src="{{ Storage::url($course->image->url) }}" alt="">
                                        @else
                                            <img src="{{ asset('img/cursos/pexels-fauxels-3184357.jpg') }}"
                                                class="w-full h-full rounded-full object-cover object-center" alt="">
                                        @endisset

                                    </div>

                                    <div class="ml-4">
                                        <div class="text-gray-900 text-sm font-medium">
                                            {{ Str::limit($course->title, 65, '...') }}
                                        </div>
                                        <div class="text-gray-500 text-sm">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-gray-900 text-sm">
                                    {{ $course->students->count() }}
                                </div>
                                <div class="text-gray-500 text-sm">
                                    Alumnos matriculados
                                </div>
                            </td>

                            <td class="px-5 py-5 whitespace-nowrap">
                                <div class="text-gray-900 text-sm flex items-center">
                                    {{ $course->rating }}
                                    <ul class="text-sm flex ml-2">
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star {{ $course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star {{ $course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star {{ $course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star {{ $course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fas fa-star {{ $course->rating == 5 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">
                                    Valoración del curso
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($course->status)
                                    @case(1)
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">
                                                Borrador
                                            </span>
                                        </span>
                                    @break

                                    @case(2)
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                            <span class="relative">
                                                Revisión
                                            </span>
                                        </span>
                                    @break

                                    @case(3)
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">
                                                Publicado
                                            </span>
                                        </span>
                                    @break

                                    @default
                                @endswitch

                            </td>

                            <td class="py-4 px-6 whitespace-nowrap text-sm text-right font-medium">

                                <a href="{{ route('instructor.courses.edit', $course) }}"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    Edit
                                </a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <div class="px-6 py-4 whitespace-nowrap">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                No hay nigun registro que coincida con la busqueda
            </div>
        @endif
    </x-table-responsive>
</div>
