<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    public function listCmt()
    {
        $cmt = Comment::join('students', 'students.id', '=', 'comments.id_student')
            ->join('course', 'course.id', '=', 'comments.id_course')->select('comments.id', 'students.name as student_name','course.title as course_title', 'comments.content')
            ->get();
        $Student_name = Student::all();
        $Course_name = Course::all();
        return view('admin.comment', [
            'cmt' => $cmt, 
            'student_name' => $Student_name, 
            'course_name' => $Course_name
        ]);
    }
    public function deleteCmt(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteCmt = Comment::find($id);
            if ($deleteCmt) {
                $deleteCmt->delete();
            }
            return response(['code' => 200]);
        }
    }
    public function postComment($id, Request $request)
    {
        $id_course = $id;
        $comment = new Comment;
        $comment->id_course = $id_course;
        $comment->id_student = $request->id_student;
        $comment->content = $request->content;
        $comment->save();

        return redirect("course-detail/$id");
    }
}
