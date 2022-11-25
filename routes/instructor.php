<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;
use App\Http\Controllers\Instructor\CourseController;
use App\Models\Course;

Route::redirect('', 'instructor/courses');

/* Route::get('courses', InstructorCourses::class)
    ->middleware('can:show course')
    ->name('courses.index');
 */

 Route::resource('courses', CourseController::class)
        ->names('courses');
