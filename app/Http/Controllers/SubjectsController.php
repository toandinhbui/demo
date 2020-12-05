<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Specialized;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function listSubjects()
    {
        $subject = Subject::join('specialized', 'specialized.id', '=', 'subjects.id_specialized')->select('subjects.id', 'subjects.name', 'specialized.name as specialized_name')->get();
        $Specialized_name = Specialized::all();
        return view('admin.subject', ['subject' => $subject, 'Specialized_name' => $Specialized_name]);
    }
    public function AddSubjects(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $subject = new Subject();
            $subject->name = $request->name;
            $subject->id_specialized = $request->id_specialized;
            $subject->save();
            $subjects = Subject::join('specialized', 'specialized.id', '=', 'subjects.id_specialized')->select('subjects.id', 'subjects.name', 'specialized.name as specialized_name', 'subjects.level')->get();
            if ($subjects) {
                foreach ($subjects as $value) {
                    $output .= '<tr>
                    <th>' . $value->id . '</th>
                <td>' . $value->name . '</td>
                <td>' . $value->specialized_name . '</td>
                <td><a  class=" btn btn-danger btn-sm js-deleteSubject" onclick="event.preventDefault();deleteSubject(' . $value->id . ');">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSubject(' . $value->id . ');" href="">Sửa</a>
            </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function EditSubjects($id)
    {
        $editSubject = Subject::find($id);
        return response()->json([
            'editSubject'  => $editSubject,
        ], 200);
    }
    public function postEditSubjects(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $editSubject = Subject::find($id);
            $editSubject->name = $request->name;
            $editSubject->id_specialized = $request->id_specialized;
            $editSubject->save();
            $subjects = Subject::join('specialized', 'specialized.id', '=', 'subjects.id_specialized')->select('subjects.id', 'subjects.name', 'specialized.name as specialized_name', 'subjects.level')->get();
            if ($subjects) {
                foreach ($subjects as $value) {
                    $output .= '<tr>
                    <th>' . $value->id . '</th>
                <td>' . $value->name . '</td>
                <td>' . $value->specialized_name . '</td>
                <td><a  class=" btn btn-danger btn-sm js-deleteSubject" onclick="event.preventDefault();deleteSubject(' . $value->id . ');">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSubject(' . $value->id . ');" href="">Sửa</a>
            </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteSubjects(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteSubjects = Subject::find($id);
            if ($deleteSubjects) {
                $deleteSubjects->delete();
            }
            return response(['code' => 200]);
        }
    }
}
