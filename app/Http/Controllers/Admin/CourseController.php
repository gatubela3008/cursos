<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', Course::REVISION)
            ->paginate(5);
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if (
            !$course->sections || !$course->goals ||
            !$course->requirements || !$course->image
        ) {
            return back()->with('info', 'No se puede publicar un curso incompleto');
        }

        $course->status = Course::PUBLICADO;
        $course->save();

        //enviar correo

        $mail = new ApprovedCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')
            ->with('info', 'El curso se publicó con éxito');
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $course->observation()->create($request->all());

        $course->status = Course::BORRADOR;
        $course->save();

        $mail = new RejectCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')
            ->with('info', 'El curso se ha rechazado');

    }
}