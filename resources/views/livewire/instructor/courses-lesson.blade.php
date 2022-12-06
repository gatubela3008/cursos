<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4" x-data="{open:false}">
            <div class="card-body">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent='update'>

                        <div class="flex items-center">
                            <label class="w-32">
                                Nombre:
                            </label>
                            <input wire:model="lesson.name" class="form-input w-full rounded-lg">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">
                                Plataforma:
                            </label>

                            <select wire:model="lesson.platform_id" class="w-full form-input rounded-lg">
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">
                                        {{ $platform->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">
                                URL:
                            </label>
                            <input wire:model="lesson.url" class="form-input w-full rounded-lg">
                        </div>
                        @error('lesson.url')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn bg-red-500 text-white rounded-lg" wire:click="cancel">
                                Cancelar
                            </button>
                            <button type="submit" class="btn bg-blue-500 text-white rounded-lg ml-4">
                                Actualizar
                            </button>
                        </div>

                    </form>
                @else
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open = !open">
                            <i class="far fa-play-circle mr-1 text-blue-500"></i>
                            Lección: {{ $item->name }}
                        </h1>
                    </header>

                    <hr class="my-2">

                    <div x-show="open">

                        <p class="text-sm">
                            Plataforma:
                            {{ $item->platform->name }}
                        </p>

                        <p class="text-sm">
                            Enlace:
                            <a class="text-blue-600" href="{{ $item->url }}" target="_blank">
                                {{ $item->url }}
                            </a>
                        </p>

                        <div class="my-2">
                            <button class="btn btn-blue text-sm rounded-lg" wire:click="edit({{ $item }})">
                                Editar
                            </button>
                            <button class="btn btn-red text-sm rounded-lg" wire:click="destroy({{ $item }})">
                                Eliminar
                            </button>
                        </div>

                        <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description'.$item->id))
                        </div>

                        <div class="">
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources'.$item->id))
                        </div>

                    </div>
                @endif

            </div>
        </article>
    @endforeach

    <div x-data="{ open: false }" class="mt-4">
        <a x-show="!open" class="flex text-red-800 font-bold items-center cursor-pointer" x-on:click="open=true">

            <i class="far fa-plus-square text-2xl mr-4"></i>
            Agregar nueva Lección
        </a>
        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold  mb-4">
                    Agregar nueva lección
                </h1>

                <div class="mb-4">

                    <div class="flex items-center">
                        <label class="w-32">
                            Nombre:
                        </label>
                        <input wire:model="name" class="form-input w-full rounded-lg">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-600">
                            {{ $message }}
                        </span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">
                            Plataforma:
                        </label>

                        <select wire:model="platform_id" class="w-full form-input rounded-lg">
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">
                                    {{ $platform->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('platform_id')
                        <span class="text-xs text-red-600">
                            {{ $message }}
                        </span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">
                            URL:
                        </label>
                        <input wire:model="url" class="form-input w-full rounded-lg">
                    </div>

                    @error('url')
                        <span class="text-xs text-red-600">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="flex justify-end">
                    <button x-on:click="open=false" class="btn btn-red rounded-lg mx-2">
                        Cancelar
                    </button>
                    <button wire:click="store" class="btn btn-blue rounded-lg mx-2">
                        Aceptar
                    </button>
                </div>
            </div>
        </article>
    </div>
</div>
