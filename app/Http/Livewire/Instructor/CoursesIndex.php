<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $courses = Course::where('user_id', auth()->user()->id)
                ->paginate(6);
        return view('livewire.instructor.courses-index', compact('courses'));
    }
}
