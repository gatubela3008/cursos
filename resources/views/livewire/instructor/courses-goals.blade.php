<section>
    <h1 class="text-2xl font-bold">
        Metas del Curso
    </h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->goals as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">

                @if ($goal->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="goal.name" class="form-input w-full">
                        @error('goal.name')
                            <span class="text-xs text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1>
                            {{ $item->name }}
                        </h1>
                        <div class="">
                            <i wire:click="edit({{ $item }})"
                                class="fas fa-edit text-blue-600 cursor-pointer"></i>
                            <i wire:click="destroy({{ $item }})"
                                class="ml-2 fas fa-trash text-red-600 cursor-pointer"></i>
                        </div>

                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class=" card-body bg-gray-100">
            <form wire:submit.prevent="store">

                <input wire:model="name" class="form-input w-full" placeholder="Agregue una meta...">
                @error('name')
                    <span class="text-xs text-red-600">
                        {{ $message }}
                    </span>
                @enderror

                <div class="flex mt-2 justify-end">
                    <button wire:click="emit(submit)" class="btn btn-blue rounded-lg">
                        Agregar meta
                    </button>
                </div>

            </form>
        </div>
    </article>
</section>
