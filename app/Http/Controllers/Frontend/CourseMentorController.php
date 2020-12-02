<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Mentor;

class CourseMentorController extends Controller
{
    public function ListConrse()
    {
        $courses = Course::join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'course.title', 'course.plandetails_url', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
            ->get();
        $courses_mentors = Course::join('mentors', 'course.id_mentor', '=', 'mentors.id')->join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'course.title', 'course.plandetails_url', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
            ->get();
        return view('fontend.course_mentor', ['courses' => $courses, 'courses_mentors' => $courses_mentors]);
    }
}
