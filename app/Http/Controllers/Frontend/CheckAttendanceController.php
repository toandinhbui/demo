<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Check_attendance;

class CheckAttendanceController extends Controller
{
    public function Time_mentor()
    {
        $check_attendance = Check_attendance::all();
        return view('fontend.check_attendance', ['check_attendance' => $check_attendance]);
    }
    public function Check_attendance()
    {
        // $id = Auth::user()->id;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $day = date_format($now, "Y/m/d");
        $time = date_format($now, "H:i");
        $Check = new Check_attendance();
        $Check->day = $day;
        // $Check->id_mentor = $id;
        $Check->time = $time;
        // $id_course = Course::where('id_mentor', $id)->select('id');
        $Check->save();; //dữ liệu trả về mảng
        return response()->json(['error' => false, 'check' => $Check], 200);
    }
}
