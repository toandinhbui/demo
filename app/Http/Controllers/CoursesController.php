<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Mentor;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function listCourses()
    {
        $course = Course::join('mentors', 'mentors.id', '=', 'course.id_mentor')
            ->join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'mentors.name as mentors_name', 'course.title', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
            ->get();
        $Mentor_name = Mentor::all();
        $Subject_name = Subject::all();
        return view('admin.course', ['course' => $course, 'mentor_name' => $Mentor_name, 'subject_name' => $Subject_name]);
    }
    public function AddCourses(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $course = new Course();
            if ($request->hasFile('image')) {
                $image = $request->image;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            }
            $course->id_mentor = $request->mentor_name;
            $course->title = $request->title;
            $course->image = $img;
            $course->id_subject = $request->subject_name;
            $course->content = $request->content;
            $course->price = $request->price;
            $course->sale_price = $request->sale_price;
            $course->save();
            $courses = Course::join('mentors', 'mentors.id', '=', 'course.id_mentor')
                ->join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'mentors.name as mentors_name', 'course.title', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
                ->get();
            if ($courses) {
                foreach ($courses as $Objrow) {
                    $output .= '<tr>
                    <th>' . $Objrow->id . '</th>
                    <td>' . $Objrow->mentors_name . '</td>
                    <td>' . $Objrow->title . '</td>
                    <td><img src="' . url("") . '/upload/img/' . $Objrow->image . '" alt="" width="30px"></td>
                    <td>' . $Objrow->subject_name . '</td>
                    <td>' . $Objrow->content . '</td>
                    <td>' . $Objrow->price . '</td>
                    <td>' . $Objrow->sale_price . '</td>
                <td><a  class=" btn btn-danger btn-sm js-deleteSubject" href="">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSubject(' . $Objrow->id . ');" href="">Sửa</a>
            </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function Editcourses($id)
    {
        $editCourse = Course::find($id);
        return response()->json([
            'editCourse'  => $editCourse,
        ], 200);
    }
    public function postEditCourse(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $course = Course::find($id);
            if ($request->hasFile('image')) {
                $image = $request->image;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = $request->img_hi;
            }
            $course->image = $img;
            $course->id_mentor = $request->mentor_name;
            $course->title = $request->title;
            $course->id_subject = $request->subject_name;
            $course->content = $request->content;
            $course->price = $request->price;
            $course->sale_price = $request->sale_price;
            $course->save();
            $courses = Course::join('mentors', 'mentors.id', '=', 'course.id_mentor')
                ->join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'mentors.name as mentors_name', 'course.title', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
                ->get();
            if ($courses) {
                foreach ($courses as $Objrow) {
                    $output .= '<tr>
                <th>' . $Objrow->id . '</th>
                <td>' . $Objrow->mentors_name . '</td>
                <td>' . $Objrow->title . '</td>
                <td><img src="' . url("") . '/upload/img/' . $Objrow->image . '" alt="" width="30px"></td>
                <td>' . $Objrow->subject_name . '</td>
                <td>' . $Objrow->content . '</td>
                <td>' . $Objrow->price . '</td>
                <td>' . $Objrow->sale_price . '</td>
            <td><a  class=" btn btn-danger btn-sm js-deleteSubject" href="">Xóa</a>
            <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSubject(' . $Objrow->id . ');" href="">Sửa</a>
        </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deletecourses(Request $request, $id)
    {
        if ($request->ajax()) {

            $deletecourses = Course::find($id);
            if ($deletecourses) {
                $deletecourses->delete();
            }
            return response(['code' => 200]);
        }
    }
}
