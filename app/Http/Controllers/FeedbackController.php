<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class FeedbackController extends Controller
{
    public function listFb()
    {
        $fb = Feedback::join('students', 'students.id', '=', 'feedback.id_student')
            ->join('course', 'course.id', '=', 'feedback.id_course')->select('feedback.id', 'students.name as student_name','course.title as course_title', 'feedback.content')
            ->get();
        $Student_name = Student::all();
        $Course_name = Course::all();
        return view('admin.feedback', [
            'fb' => $fb, 
            'student_name' => $Student_name, 
            'course_name' => $Course_name
        ]);
    }
    public function deleteFb(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteFb = Feedback::find($id);
            if ($deleteFb) {
                $deleteFb->delete();
            }
            return response(['code' => 200]);
        }
    }
}
