<?php

namespace App\Http\Controllers;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function listSettings()
    {
        $settings = Setting::all();
        return view('admin.setting', ['settings' => $settings]);

    }
    public function editSetting($id)
    {
        $editSetting = Setting::find($id);
        return response()->json([
            'editSetting'  => $editSetting,
        ], 200);
    }
    public function postEditSetting(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $setting = Setting::find($id);
            if ($request->hasFile('logo')) {
                $image = $request->logo;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = $request->img_hi;
            }
            $setting->logo = $img;
            $setting->phone = $request->phone;
            $setting->address = $request->address;
            $setting->company_name = $request->company_name;
            $setting->facebook_url = $request->facebook_url;
            $setting->youtube_url = $request->youtube_url;
            $setting->save();
            $settings = Setting::all();
            if ($settings) {
                foreach ($settings as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
                <td><img src="' . url("") . '/upload/img/' . $value->logo . '" alt="" width="160px"></td>
            <td>' . $value->phone . '</td>
            <td>' . $value->address . '</td>
            <td>' . $value->company_name . '</td>
            <td> ' . $value->facebook_url . '</td>
            <td> ' . $value->youtube_url . '</td>
                <a class="btn btn-danger" onclick="event.preventDefault();editSetting(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    
    }
}
