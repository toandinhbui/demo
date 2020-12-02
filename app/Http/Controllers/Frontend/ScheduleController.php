<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\AddTaskRequest;
use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function task_mentor()
    {
        // $id = Auth::login('mentors.id');
        $task = Schedule::all();
        $bill_student = Bill::join('students', 'bill.id_student', '=', 'students.id')
            ->join('course', 'bill.id_course', '=', 'course.id')
            // ->where('id_mentor', $id)
            ->get();
        return view('fontend.schedule_mentor', ['task' => $task, 'bill_student' => $bill_student]);
    }
    public function schedule_student()
    {
        // $id = Auth::login('mentors.id');
        $schedule_student = Schedule::all();
        $bill_student = Bill::join('students', 'bill.id_student', '=', 'students.id')
            ->join('course', 'bill.id_course', '=', 'course.id')
            // ->where('id_mentor', $id)
            ->get();
        return view('fontend.schedule_student', ['schedule_student' => $schedule_student, 'bill_student' => $bill_student]);
    }
    public function AddTask(AddTaskRequest $request)
    {
        $bill_student = Bill::join('students', 'bill.id_student', '=', 'students.id')
            ->join('course', 'bill.id_course', '=', 'course.id')
            // ->where('id_mentor', $id)
            ->get();
        if ($request->ajax()) {

            $output = '';

            $id = new Schedule;

            $id->title = $request->title;
            $id->content = $request->content;
            $id->mentor_id = $bill_student[0]->id_mentor;
            $id->student_id = $bill_student[0]->id_student;
            $id->id_course = $bill_student[0]->id_course;
            $id->start = $request->start . " " . $request->time_start . ":" . $request->startdate_minute;
            $id->end = $request->end . " " . $request->time_end . ":" . $request->enddate_minute;
            $id->color = $request->color;
            if ($request->start == $request->end) {
                if ($request->time_start >= $request->time_end) {
                    return Response(['code' => 406]);
                } else {
                    $id->save();
                }
            } else {
                $id->save();
            }
            //return Response($output);
            return Response(['code' => 200]);
        }
    }
    public function editTask($id)
    {
        $task = Schedule::where('id', $id)->get();
        $start_end = Schedule::select('start', 'end')->where('id', $id)->get();
        return response()->json([
            'error' => false,
            'task' => $task,
            'start_end' => $start_end
        ], 200);
    }
    public function detail_schedule_student($id)
    {
        $task = Schedule::where('id', $id)->get();
        $start_end = Schedule::select('start', 'end')->where('id', $id)->get();
        return response()->json([
            'error' => false,
            'task' => $task,
            'start_end' => $start_end
        ], 200);
    }
    public function updateTask(Request $request, $id)
    {
        if ($request->ajax()) {

            $output = '';
            $task = Schedule::find($id);
            $task->title = $request->title;
            $task->content = $request->content;
            $task->start = $request->start . " " . $request->time_start . ":" . $request->startdate_minute;
            $task->end = $request->end . " " . $request->time_end . ":" . $request->enddate_minute;
            $task->color = $request->color;
            $task->save();
            //return Response($output);
            return Response($output);
        }
    }
    public function deleteTask(Request $request, $id)
    {
        if ($request->ajax()) {

            $task_delete = Schedule::find($id);
            if ($task_delete) {
                $task_delete->delete();
            }
            return response(['code' => 200]);
        }
    }
}
