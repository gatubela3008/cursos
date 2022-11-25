<div>
    <div class="bg-gray-300 py-4 mb-16">
        <div class="container flex">
            <button wire:click="resetFilters" class="focus:outline-none bg-white shadow-lg h-12 rounded-lg px-4 text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los cursos
            </button>
            <div class="relative" x-data="{ open: false }">
                <!-- component -->
                <button
                    class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow-lg mr-4"
                    x-on:click="open=true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoría
                    <i class="fas fa-chevron-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open=false">
                    <ul class="py-1">
                        @foreach ($categories as $category)
                            <li>
                                <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white cursor-pointer"
                                    wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">
                                    {{ $category->name }}
                                </a>
                            </li>
                            <hr>
                        @endforeach
                    </ul>


                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <!-- component -->
                <button
                    class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow-lg"
                    x-on:click="open=true">
                    <i class="fas fa-list text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-chevron-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open=false">
                    <ul class="py-1">
                        @foreach ($levels as $level)
                            <li>
                                <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white cursor-pointer"
                                    wire:click="$set('category_id', {{ $category->id }})" x-on:click="open = false">
                                    {{ $level->name }}
                                </a>
                            </li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div
        class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>

    <div class="container mt-4 mb-8">
        {{ $courses->links() }}
    </div>
</div>
