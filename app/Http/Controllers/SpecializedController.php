<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Specialized;
use Illuminate\Http\Request;
use App\Http\Requests\AddSpecializedRequests;

class SpecializedController extends Controller
{
    public function listSpecialized()
    {
        $specialized = Specialized::all();
        return view('admin.specialized', ['specialized' => $specialized]);
    }
    public function AddSpecialized(AddSpecializedRequests $request)
    {

        if ($request->ajax()) {

            $output = '';
            $specialized = new Specialized();
            $specialized->name = $request->name;
            $specialized->save();
            $specializeds = Specialized::all();
            if ($specializeds) {
                foreach ($specializeds as $value) {
                    $output .= '<tr>
                    <th>' . $value->id . '</th>
                <td>' . $value->name . '</td>
                <td><a  class=" btn btn-danger btn-sm js-deleteSpecialized" href="">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSpecialized(' . $value->id . ');" href="">Sửa</a>
            </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function EditSpecialized($id)
    {
        $editSpecialized = Specialized::find($id);

        return response()->json([
            'editSpecialized'  => $editSpecialized,


        ], 200);
    }

    public function postEditSpecialized(Request $request, $id)
    {
        if ($request->ajax()) {
            $output = '';
            $specialized = Specialized::find($id);
            $specialized->name = $request->name;
            $specialized->save();
            $specializeds = Specialized::all();
            if ($specializeds) {
                foreach ($specializeds as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
            <td>' . $value->name . '</td>
            <td><a  class=" btn btn-danger btn-sm js-deleteSpecialized" href="">Xóa</a>
            <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editSpecialized(' . $value->id . ');" href="">Sửa</a>
        </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteSpecialized(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteSpecialized = Specialized::find($id);
            if ($deleteSpecialized) {
                $deleteSpecialized->delete();
            }
            return response(['code' => 200]);
        }
    }
}
