<div>
    <article class="card" x-data="{open:false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 class="cursor-pointer" x-on:click='open=!open'>
                    Descripción de la lección
                </h1>

                <div x-show="open">
                    <hr class="my-4">

                    @if ($lesson->description)
                        <form wire:submit.prevent="update">
                            <textarea wire:model="description.name" class="form-input w-full rounded-lg" rows="3">{{ $lesson->description->name }}</textarea>

                            @error('description.name')
                                <span class="text-sm text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror

                            <div class="justify-end flex mt-2">
                                <button type="button"
                                    wire:click="destroy"
                                    class="mr-4 btn bg-red-600 text-white text-sm rounded-lg">
                                    Eliminar
                                </button>
                                <button type="submit"
                                    class="btn bg-blue-600 text-white text-sm rounded-lg">
                                    Actualizar
                                </button>
                            </div>
                        </form>
                    @else
                        <div>
                            <textarea wire:model="name"
                            class="form-input w-full rounded-lg"
                            rows="3"
                            placeholder="Escriba una descripción..."></textarea>

                            @error('name')
                                <span class="text-sm text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror

                            <div class="justify-end flex">
                                <button
                                    class="btn bg-blue-600 text-white text-sm rounded-lg"
                                    wire:click="store">
                                    Crear descripción
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </header>
        </div>
    </article>
</div>
