<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Mentor;
use App\Models\Comment;

class CourseClientController extends Controller
{
    public function ListCourseClient()
    {
        $courses = Course::join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'course.title', 'course.plandetails_url', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
            ->get();
        return view('client.course', ['courses' => $courses]);
    }
    public function ListMentor()
    {
        $mentor = Mentor::join('specialized', 'mentors.id_specialized', '=', 'specialized.id')
            ->join('course', 'mentors.id', '=', 'course.id_mentor')
            ->select('mentors.avatar', 'mentors.id', 'mentors.name', 'mentors.birthday', 'course.title', 'specialized.name as specialized_name')
            ->get();
        return view('client.mentor', ['mentor' => $mentor]);
    }
    public function course_detail($id)
    {
        $course_detail = Course::join('subjects', 'subjects.id', '=', 'course.id_subject')->where('course.id', '=', $id)->select('course.id', 'course.title', 'course.plandetails_url', 'course.content', 'course.image', 'subjects.name as subject_name', 'course.price', 'course.sale_price')
            ->get();
        $mentor_detail = Mentor::where('id', '=', $id)->get();
        return view('client.course-detail', ['course_detail' => $course_detail, 'mentor_detail' => $mentor_detail]);
    }
    // public function CourseSearchName(Request $request)
    // {
    //     $output = '';
    //     $courses_seach = Course::join('subjects', 'subjects.id', '=', 'course.id_subject')->select('course.id', 'course.title', 'course.plandetails_url', 'course.content', 'course.image', 'subjects.name as subject_name', 'subjects.level', 'course.price', 'course.sale_price')
    //         ->where('name', 'LIKE', '%' . $request->name . '%')
    //         ->get();
    //     foreach ($courses_seach as $value) {
    //         $output .= ' <div class="row">
    //         <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
    //             <!-- course -->
    //             <div class="course">
    //                 <div class="img-course">
    //                     <a href="mentor-client/' . $value->id . '">
    //                         <img src="" class="img-fluid w-100" alt="">
    //                     </a>
    //                 </div>
    //                 <div class="course-content">
    //                     <h3 class="course-name">
    //                         Khóa học : ' . $value->subject_name . '
    //                     </h3>
    //                     <h4 class="course-type">
    //                         Level : ' . $value->level . '
    //                     </h4>
    //                     <hr class="hr-course">
    //                     <p class="course-detail">
    //                         ' . $value->title . '
    //                     </p>
    //                     <div class="entry-total_review">
    //                         <div class="total">
    //                             <i class="fa fa-users"></i>
    //                             <span class="number"> 1 </span> học sinh
    //                         </div>
    //                         <div class="review">
    //                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    //                                 <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
    //                                 </path>
    //                             </svg>
    //                             <span class="number">1</span> Đánh giá
    //                         </div>
    //                     </div>
    //                 </div>

    //             </div>
    //             <!-- course end-->
    //         </div>


    //     </div>';
    //     }
    //     return Response($output);
    // }
    public function MentorSearchName(Request $request)
    {
        $output = '';
        $mentor_seach = Mentor::join('specialized', 'mentors.id_specialized', '=', 'specialized.id')->select('mentors.id', 'mentors.name', 'mentors.birthday', 'specialized.name as specialized_name')
            ->where('mentors.name', 'LIKE', '%' . $request->name . '%')
            ->get();
        foreach ($mentor_seach as $value) {
            $output .= ' <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <!-- course -->
                <div class="course">
                    <div class="img-course">
                        <a href="course-detail/' . $value->id . '">
                        <img src="' . url("") . '/upload/img/' . $value->avatar . '" class="img-fluid w-100" alt="">
                        </a>
                    </div>
                    <div class="course-content">
                        <h3 class="course-name">
                            Gia sư : ' . $value->name . '
                        </h3>
                        <h4 class="course-type">
                        Chuyên ngành : ' . $value->specialized_name . '
                        </h4>
                        <hr class="hr-course">
                        <p class="course-detail">
                            Ngày Sinh : ' . $value->birthday . '
                        </p>
                        <div class="entry-total_review">
                            <div class="total">
                                <i class="fa fa-users"></i>
                                <span class="number"> 1 </span> học sinh
                            </div>
                            <div class="review">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
                                    </path>
                                </svg>
                                <span class="number">1</span> Đánh giá
                            </div>
                        </div>
                    </div>

                </div>
                <!-- course end-->
            </div>


        </div>';
        }
        return Response($output);
    }

    public function MentorFilter(Request $request)
    {
        // $output = '';
        // $mentor_seach = Mentor::where('mentors.id_course', '=', $id)
        //     ->where('name', 'LIKE', '%' . $request->name . '%')
        //     ->get();
        // foreach ($mentor_seach as $value) {
        //     $output .= ' <div class="row">
        //     <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        //         <!-- course -->
        //         <div class="course">
        //             <div class="img-course">
        //                 <a href="course-detail/' . $value->id . '">
        //                     <img src="" class="img-fluid w-100" alt="">
        //                 </a>
        //             </div>
        //             <div class="course-content">
        //                 <h3 class="course-name">
        //                     Gia sư : ' . $value->name . '
        //                 </h3>
        //                 <h4 class="course-type">
        //                     Level : ' . $value->level_salary . '
        //                 </h4>
        //                 <hr class="hr-course">
        //                 <p class="course-detail">
        //                     Ngày Sinh : ' . $value->birthday . '
        //                 </p>
        //                 <div class="entry-total_review">
        //                     <div class="total">
        //                         <i class="fa fa-users"></i>
        //                         <span class="number"> 1 </span> học sinh
        //                     </div>
        //                     <div class="review">
        //                         <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        //                             <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z">
        //                             </path>
        //                         </svg>
        //                         <span class="number">1</span> Đánh giá
        //                     </div>
        //                 </div>
        //             </div>

        //         </div>
        //         <!-- course end-->
        //     </div>


        // </div>';
        // // }
        // return Response($output);
    }
}
