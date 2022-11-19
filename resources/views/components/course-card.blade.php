@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
    <div class="card-body">
        <h1 class="card-title">
            {{ Str::limit($course->title, 40) }}
        </h1>
        <div class="mt-auto">
            <p class="text-gray-500 mb-2">
                Prof: {{ $course->teacher->name }}
            </p>
            <div class="flex">
                <ul class="text-sm flex">
                    <li class="mr-1">
                        <i class="fas fa-star {{ $course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star {{ $course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star {{ $course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star {{ $course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                    </li>
                    <li class="mr-1">
                        <i class="fas fa-star {{ $course->rating == 5 ? 'text-yellow-400' : 'text-gray-400' }}"></i>
                    </li>
                </ul>
                <p class="text-sm text-gray-500 ml-auto">
                    <i class="fas fa-users"></i>
                    ({{ $course->students_count }})
                </p>
            </div>
        </div>
        <a href="{{ route('courses.show', $course) }}"
            class="btn-block mt-4 btn btn-blue">
            Más información
        </a>
    </div>
</article>
