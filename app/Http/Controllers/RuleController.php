<?php

namespace App\Http\Controllers;
use App\Models\Rule;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function listRules()
    {
        $rules = Rule::all();
        return view('admin.rule', ['rules' => $rules]);

    }
    public function editRule($id)
    {
         $editRule = Rule::find($id);
        return response()->json([
            'editRule'  => $editRule,
        ], 200);
    }
    public function postEditRule(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $rule = Rule::find($id);
            $rule->name = $request->name;
            $rule->content = $request->content;
            $rule->save();
            $rule = Rule::all();
            if ($rule) {
                foreach ($rule as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
            <td>' . $value->name . '</td>
            <td>' . $value->content . '</td>
            <td
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editRule(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
}
