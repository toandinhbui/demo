<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Mentor;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ManagersController extends Controller
{
    public function listManager()
    {
        $managers = Manager::join('roles', 'managers.id_role', '=', 'roles.id')
            ->join('status', 'managers.id_status', '=', 'status.id')
            ->select('status.name as namestatus', 'roles.name as namerole', 'managers.id', 'managers.id_role', 'managers.name', 'managers.avatar', 'managers.birthday', 'managers.email', 'managers.phone', 'managers.address')
            ->get();
        $role = Role::all();
        $status = Status::all();

        return view('admin.manager', ['managers' => $managers, 'role' => $role, 'status' => $status]);
    }
    public function AddManager(Request $request)
    {
        if ($request->ajax()) {

            $output = '';
            $manager = new Manager();
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $image->move(base_path('public/upload/img'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            }
            $manager->avatar = $img;
            $manager->id_role = $request->id_role;
            $manager->id_status = $request->id_status;
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->birthday = $request->birthday;
            $manager->password = Hash::make($request->password);
            $manager->phone = $request->phone;
            $manager->address = $request->address;
            $manager->save();
            $managers = Manager::join('roles', 'managers.id_role', '=', 'roles.id')
                ->join('status', 'managers.id_role', '=', 'status.id')
                ->select('status.name as namestatus', 'roles.name as namerole', 'managers.id', 'managers.id_role', 'managers.name', 'managers.avatar', 'managers.birthday', 'managers.email', 'managers.phone', 'managers.address')
                ->get();
            if ($managers) {
                foreach ($managers as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
            <td>' . $value->name . '</td>
            <td><img src="' . url("") . '/upload/img/' . $value->avatar . '" alt="" width="30px"></td>
            <td> ' . $value->birthday . '</td>
            <td> ' . $value->email . '</td>
            <td>' . $value->address . '</td>
            <td>' . $value->phone . '</td>
            <td>' . $value->namerole . '</td>
            <td><a  class=" btn btn-danger btn-sm js-deleteManager" href="">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editManager(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function Editmanager($id)
    {
        $editManager = Manager::find($id);
        return response()->json([
            'editManager'  => $editManager,
        ], 200);
    }
    public function postEditManager(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $manager = Manager::find($id);

            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $image->move(base_path('public/upload/img/'), $image->getClientOriginalname());
                $img = $image->getClientOriginalname();
            } else {
                $img = $request->img_hi;
            }
            $manager->avatar = $img;
            $manager->name = $request->name;
            $manager->email = $request->email;
            $manager->birthday = $request->birthday;
            $manager->phone = $request->phone;
            $manager->address = $request->address;
            $manager->namerole = $request->namerole;
            $manager->save();
            $manager = Manager::all();
            if ($manager) {
                foreach ($manager as $value) {
                    $output .= '<tr>
                <th>' . $value->id . '</th>
            <td>' . $value->name . '</td>
            <td><img src="' . url("") . '/upload/img/' . $value->avatar . '" alt="" width="30px"></td>
            <td> ' . $value->birthday . '</td>
            <td> ' . $value->email . '</td>
            <td>' . $value->address . '</td>
            <td>' . $value->phone . '</td>
            <td>' . $value->namerole . '</td>
            <td><a class=" btn btn-danger btn-sm js-deleteManager" href="">Xóa</a>
                <a class="btn btn-danger btn-sm" onclick="event.preventDefault();editManager(' . $value->id . ');" href="">Sửa</a>
            </td>
                 </tr>';
                }
            }
            return Response($output);
        }
    }
    public function deleteManager(Request $request, $id)
    {
        if ($request->ajax()) {

            $deleteManager = Manager::find($id);
            if ($deleteManager) {
                $deleteManager->delete();
            }
            return response(['code' => 200]);
        }
    }
}
