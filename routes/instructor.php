<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;

Route::redirect('', 'instructor/courses');

/* Route::get('courses', InstructorCourses::class)
    ->middleware('can:show course')
    ->name('courses.index');
 */

Route::resource('courses', CourseController::class)
    ->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)
    ->middleware('can:show dashboard')
    ->name('courses.curriculum');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)
    ->middleware('can:show dashboard')
    ->name('courses.students');

Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])
    ->name('courses.observation');


