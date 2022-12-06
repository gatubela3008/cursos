<div class="card" x-data="{open:false}">
    <div class="card-body bg-gray-100">

        <header>
            <h1 class="cursor-pointer" x-on:click='open=!open'>
                Recursos de la lección
            </h1>
        </header>

        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p>
                        <i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>
                        {{ $lesson->resource->url }}
                    </p>
                    <i wire:click="destroy" class="fas fa-trash text-red-600 cursor-pointer mr-0"></i>

                </div>
            @else
                <form>
                    <div class="flex">
                        <input wire:model="file" type="file" class="form-input flex-1 rounded-lg">
                        <button wire:click="save" class="btn btn-blue text-sm ml-2 my-2">
                            Guardar
                        </button>
                    </div>

                    <div class="text-blue-600 font-bold" wire:loading wire:target="file">
                        Cargando...
                    </div>

                    @error('file')
                        <span class="text-sm text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </form>
            @endif

        </div>
    </div>
</div>
