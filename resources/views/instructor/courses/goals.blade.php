<x-instructor-layout :course="$course">

    <div class="">
        @livewire('instructor.courses-goals', ['course' => $course], key('courses.goals' . $course->id))
    </div>

    <div class="">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses.requirements' . $course->id))
    </div>

    <div class="">
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses.audiences' . $course->id))
    </div>

</x-instructor-layout>
