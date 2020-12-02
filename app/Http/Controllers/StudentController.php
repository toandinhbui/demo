<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function listStudents()
    {
        $students = Student::all();
        return view('admin.student', ['students' => $students]);
    }
    public function addStudent(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $student = new Student();
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            }
            $student->avatar = $img;
            $student->name = $request->name;
            $student->birthday = $request->birthday;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->password = Hash::make($request->password);
            $student->save();
            $students = Student::all();
            if ($students) {
                $i = !isset($_GET['page']) ? 1 : (20 * ($_GET['page']-1) + 1);
                foreach ($students as $value) {
                    $output .= '<tr>
                <th>' . $i++ . '</th>
            <td>' . $value->name . '</td>
            <td>' . $value->birthday . '</td>
            <td>' . $value->phone . '</td>
            <td> ' . $value->email . '</td>
            <td><img src="' . url("") . '/upload/img/' . $value->avatar . '" alt="" width="160px"></td>
            <td>' . $value->address . '</td>
            <td><a  class=" btn btn-danger js-deleteStudent" href="">Xóa</a>
                <a class="btn btn-primary" onclick="event.preventDefault();editStudent(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function editStudent($id)
    {
        $editStudent = Student::find($id);
        return response()->json([
            'editStudent'  => $editStudent,
        ], 200);
    }
    public function postEditStudent(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $student = Student::find($id);
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = $request->img_hi;
            }
            $student->avatar = $img;
            $student->name = $request->name;
            $student->birthday = $request->birthday;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->save();
            $students = Student::all();
            if ($students) {
                foreach ($students as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
            <td>' . $value->name . '</td>
            <td>' . $value->birthday . '</td>
            <td>' . $value->phone . '</td>
            <td> ' . $value->email . '</td>
            <td><img src="' . url("") . '/upload/img/' . $value->avatar . '" alt="" width="160px"></td>
            <td>' . $value->address . '</td>
            <td><a  class=" btn btn-danger btn-sm js-deleteManager" href="">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editManager(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteStudent(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteStudent = Student::find($id);
            if ($deleteStudent) {
                $deleteStudent->delete();
            }
            return response(['code' => 200]);
        }
    }
}
