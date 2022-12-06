<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">
        Lecciones del Curso
    </h1>

    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
        <article class="card mb-6" x-data="{open:true}">
            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model='section.name' class="form-input w-full"
                            placeholder="Ingrese el nombre de la sección..." type="text">
                        @error('section.name')
                            <span class="text-sm text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer text-xl">
                            <strong>Sección: </strong>
                            {{ $item->name }}
                        </h1>

                        <div class="">
                            <i class="fas fa-edit cursor-pointer text-blue-600 mr-4"
                                wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-trash cursor-pointer text-red-600"
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
        <a x-show="!open" class="flex text-red-800 font-bold items-center cursor-pointer"
            x-on:click="open=true">

            <i class="far fa-plus-square text-2xl mr-4"></i>
            Agregar nueva Sección
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold  mb-4">
                    Agregar nueva sección
                </h1>
                <div class="mb-4">
                    <input type="text"
                        wire:model="name"
                        class="form-input w-full rounded-lg"
                        placeholder="Escriba el nombre de la sección..">
                    @error('name')
                        <span class="text-xs text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button x-on:click="open=false"
                        class="btn btn-red rounded-lg mx-2">
                        Cancelar
                    </button>
                    <button wire:click="store"
                        class="btn btn-blue rounded-lg mx-2">
                        Aceptar
                    </button>
                </div>
            </div>
        </article>
    </div>
</div>
