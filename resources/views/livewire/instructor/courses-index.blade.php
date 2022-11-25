<div class="container py-8">

    <x-table-responsive>

        <div class="px-6 py-4">
            <input type="text" class="form-input w-full shadow-sm" placeholder="Ingrese lo que va a buscar">
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

                                        <img class="w-full h-full rounded-full"
                                            src="{{ Storage::url($course->image->url) }}" alt="" />
                                    </div>

                                    <div class="ml-4">
                                        <div class="class="text-gray-900 text-sm font-medium">
                                            {{ $course->title }}
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
                                </span>
                                </span>
                            </td>

                            <td class="py-4 px-6 whitespace-nowrap text-sm text-right font-medium">

                                <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

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
