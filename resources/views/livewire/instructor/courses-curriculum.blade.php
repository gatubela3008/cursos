<div>

    <h1 class="text-2xl font-bold">
        Lecciones del Curso
    </h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
        <article class="mb-6 card" x-data="{open:true}">
            <div class="bg-gray-100 card-body">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model='section.name' class="w-full form-input"
                            placeholder="Ingrese el nombre de la sección..." type="text">
                        @error('section.name')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </form>
                @else
                    <header class="flex items-center justify-between">
                        <h1 x-on:click="open = !open" class="text-xl cursor-pointer">
                            <strong>Sección: </strong>
                            {{ $item->name }}
                        </h1>

                        <div class="">
                            <i class="mr-4 text-blue-600 cursor-pointer fas fa-edit"
                                wire:click="edit({{ $item }})"></i>
                            <i class="text-red-600 cursor-pointer fas fa-trash"
                                wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>
    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" class="flex items-center font-bold text-red-800 cursor-pointer"
            x-on:click="open=true">

            <i class="mr-4 text-2xl far fa-plus-square"></i>
            Agregar nueva Sección
        </a>
        <article class="card" x-show="open">
            <div class="bg-gray-100 card-body">
                <h1 class="mb-4 text-xl font-bold">
                    Agregar nueva sección
                </h1>
                <div class="mb-4">
                    <input type="text"
                        wire:model="name"
                        class="w-full rounded-lg form-input"
                        placeholder="Escriba el nombre de la sección..">
                    @error('name')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button x-on:click="open=false"
                        class="mx-2 rounded-lg btn btn-red">
                        Cancelar
                    </button>
                    <button wire:click="store"
                        class="mx-2 rounded-lg btn btn-blue">
                        Aceptar
                    </button>
                </div>
            </div>
        </article>
    </div>
</div>
