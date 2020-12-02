<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories_news;
use Illuminate\Support\Facades\Hash;

class CategoriesnewsController extends Controller
{
    public function listCatenews()
    {
        $catenews = Categories_news::all();
        return view('admin.categoriesnews',[
            'catenews' => $catenews
        ]);
    }
    public function addCatenews(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $catenews = new Categories_news();
            $catenews->name = $request->name;
            $catenews->save();
            $catenewss = Categories_news::all();
            if ($catenewss) {
                foreach ($catenewss as $value) {
                    $output .= '<tr>
                    <th>' . $value->id . '</th>
                <td>' . $value->name . '</td>
                <td>
                    <a class="btn btn-primary btn-lg" onclick="event.preventDefault();editCatenews(' . $value->id . ');" href="">Sửa</a>
                    <a  class=" btn btn-danger btn-lg js-deleteCatenews" href="">Xóa</a>
                </td>
                     </tr>';
                }
            }
            return Response($output);
        }
    }
    public function editCatenews($id)
    {
        $editCatenews = Categories_news::find($id);
        return response()->json([
            'editCatenews'  => $editCatenews,
        ], 200);
    }
    public function postEditCatenews(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $catenews = Categories_news::find($id);
            $catenews->name = $request->name;
            $catenews->save();
            $catenews = Categories_news::all();
            if ($catenews) {
                foreach ($catenews as $value) {
                    $output .= '<tr>
                    <th>' . $value->id . '</th>
                <td>' . $value->name . '</td>
                <td>
                    <a class="btn btn-primary btn-lg" onclick="event.preventDefault();editCatenews(' . $value->id . ');" href="">Sửa</a>
                    <a  class=" btn btn-danger btn-lg js-deleteCatenews"  href="">Xóa</a>
                </td>
                    </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteCatenews(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteCatenews = Categories_news::find($id);
            if ($deleteCatenews) {
                $deleteCatenews->delete();
            }
            return response(['code' => 200]);
        }
    }
}
