<section class="mb-12">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold">
                Valoración
            </h1>
            <p class="text-gray-900 text-xl mb-4">
                {{ $cantidad = $course->reviews->count() }}
                @if ($cantidad == 1)
                    valoración
                @else
                    valoraciones
                @endif
            </p>

            @can('enrolled', $course)
                <article class="mb-4">
                    @can('valued', $course)
                        <textarea wire:model="comment" placeholder="Ingrese una reseña del curso" class="w-full form-input" rows="3"></textarea>
                        <div class="flex items-center mb-4">
                            <button wire:click='store' class="btn btn-blue">
                                Reseñar
                            </button>
                            <ul class="flex ml-4">
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                    <i class="fas fa-star {{ $rating >= 1 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                    <i class="fas fa-star {{ $rating >= 2 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                    <i class="fas fa-star {{ $rating >= 3 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                    <i class="fas fa-star {{ $rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                                    <i class="fas fa-star {{ $rating == 5 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <p>
                                    Usted ya ha calificado este curso
                                </p>
                            </div>
                        </div>
                    @endcan
                </article>
            @endcan


            @foreach ($course->reviews as $review)
                <article class="flex mb-4">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="{{ $review->user->profile_photo_url }}" alt="">
                    </figure>
                    <div class="card flex-1">
                        <div class="card-body bg-gray-100 text-gray-500">
                            <p class="font-bold">
                                {{ $review->user->name }}
                                <i class="fas fa-star text-yellow-300"></i>
                                ({{ $review->rating }})
                            </p>
                            <p>
                                {{ $review->comment }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>
