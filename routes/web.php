<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Categories News
Route::get('/catenews', 'CategoriesnewsController@listCatenews');
Route::post('/addCatenews', 'CategoriesnewsController@addCatenews')->name('ajax_post.addCatenews');
Route::get('/editCatenews/{id}', 'CategoriesnewsController@editCatenews');
Route::post('/postEditCatenews/{id}', 'CategoriesnewsController@postEditCatenews');
Route::get('/deleteCatenews/{id}', 'CategoriesnewsController@deleteCatenews')->name('ajax_deleteCatenews');

// News
Route::get('/news', 'NewsController@listNews');
Route::post('/addNews', 'NewsController@addNews')->name('ajax_post.addNews');
Route::get('/editNews/{id}', 'NewsController@editNews');
Route::post('/postEditNews/{id}', 'NewsController@postEditNews');
Route::get('/deleteNews/{id}', 'NewsController@deleteNews')->name('ajax_deleteNews');

// Feedback
Route::get('/feedback', 'FeedbackController@listFb');
Route::get('/deleteFb/{id}', 'FeedbackController@deleteFb')->name('ajax_deleteFb');

// Comments
Route::get('/comments', 'CommentController@listCmt');
Route::get('/deleteCmt/{id}', 'CommentController@deleteCmt')->name('ajax_deleteCmt');
/// Manager Toàn
Route::get('/manager', 'ManagersController@listManager');
Route::post('/Addmanager', 'ManagersController@AddManager')->name('ajax_post.AddManager');
Route::get('/Editmanager/{id}', 'ManagersController@Editmanager');
Route::post('/postEditManager/{id}', 'ManagersController@postEditManager');
Route::get('/deleteManager/{id}', 'ManagersController@deleteManager')->name('ajax_deleteManager');

/// Specializedagers Toàn
Route::get('/Specialized', 'SpecializedController@listSpecialized');
Route::post('/AddSpecialized', 'SpecializedController@AddSpecialized')->name('ajax_post.AddSpecialized');
Route::get('/EditSpecialized/{id}', 'SpecializedController@EditSpecialized');
Route::post('/postEditSpecialized/{id}', 'SpecializedController@postEditSpecialized');
Route::get('/deleteSpecialized/{id}', 'SpecializedController@deleteSpecialized')->name('ajax_deleteSpecialized');

/// Subjects Toàn
Route::get('/Subjects', 'SubjectsController@listSubjects');
Route::post('/AddSubjects', 'SubjectsController@AddSubjects')->name('ajax_post.AddSubject');
Route::get('/EditSubjects/{id}', 'SubjectsController@EditSubjects');
Route::post('/postEditSubjects/{id}', 'SubjectsController@postEditSubjects');
Route::get('/deleteSubjects/{id}', 'SubjectsController@deleteSubjects')->name('ajax_deleteSubjects');


//Crouse
Route::get('/courses', 'CoursesController@listCourses');
Route::post('/Addcourses', 'CoursesController@AddCourses')->name('ajax_post.AddCourse');
Route::get('/Editcourses/{id}', 'CoursesController@EditCourses');
Route::post('/postEditcourse/{id}', 'CoursesController@postEditCourse');
Route::get('/deletecourses/{id}', 'CoursesController@deletecourses')->name('ajax_deleteCourse');

//Students
Route::get('students', 'StudentController@listStudents');
Route::post('add-student', 'StudentController@addStudent')->name('ajax_post.addStudent');
Route::get('edit-student/{id}', 'StudentController@editStudent');
Route::post('post-edit-student/{id}', 'StudentController@postEditStudent');
Route::get('delete-student/{id}', 'StudentController@deleteStudent')->name('ajax_deleteStudent');

//Rules
Route::get('rules', 'RuleController@listRules');
Route::get('edit-rule/{id}', 'RuleController@editRule');
Route::post('post-edit-rule/{id}', 'RuleController@postEditRule');

//contact
Route::get('contacts', 'ContactController@listContacts');

//setting
Route::get('settings', 'SettingController@listSettings');
Route::get('edit-setting/{id}', 'SettingController@editSetting');
Route::post('post-edit-setting/{id}', 'SettingController@postEditSetting');

Route::get('home', 'Frontend\HomeController@home');

Route::get('profile-mentor', 'Frontend\ProfileController@profile_mentor');


Route::get('login-mentor', 'Frontend\LoginController@login_mentor');

Route::get('login-student', 'Frontend\LoginController@login_student');

///toan (quản trị menttor)
Route::get('task-mentor', 'Frontend\ScheduleController@task_mentor');
Route::get('schedule-student', 'Frontend\ScheduleController@schedule_student');
Route::get('detail-schedule-student/{id}', 'Frontend\ScheduleController@detail_schedule_student');
Route::post('addTask', 'Frontend\ScheduleController@AddTask');
Route::get('editTask/{id}', 'Frontend\ScheduleController@editTask');
Route::post('updateTask/{id}', 'Frontend\ScheduleController@updateTask');
Route::get('deleteTask/{id}', 'Frontend\ScheduleController@deleteTask');
Route::get('course-mentor', 'Frontend\CourseMentorController@ListConrse');
Route::get('time_mentor', 'Frontend\CheckAttendanceController@Time_mentor');
Route::post('check_attendance', 'Frontend\CheckAttendanceController@Check_attendance');
///toàn (course client)
Route::get('course-client', 'Frontend\CourseClientController@ListCourseClient');
Route::get('mentor-client', 'Frontend\CourseClientController@ListMentor');
Route::get('course-detail/{id}', 'Frontend\CourseClientController@course_detail')->name('course-detail.index');
Route::post('seach-course', 'Frontend\CourseClientController@CourseSearchName');
Route::post('search-mentor', 'Frontend\CourseClientController@MentorSearchName');
Route::post('mentor-client/filter-mentor', 'Frontend\CourseClientController@MentorFilter');






Route::get('settings', 'SettingController@listSettings');
Route::get('edit-setting/{id}', 'SettingController@editSetting');
Route::post('post-edit-setting/{id}', 'SettingController@postEditSetting');

Route::get('home', 'Frontend\HomeController@home')->name('home.index');

Route::get('contact', 'Frontend\ContactController@contact')->name('contact.index');
Route::post('contact', 'Frontend\ContactController@saveContact');

Route::get('course', 'Frontend\CourseController@course')->name('course.index');






Route::get('blog', 'Frontend\BlogController@blog')->name('blog.index');

Route::get('profile-mentor', 'Frontend\ProfileController@profile_mentor')->name('profile-m.index');

Route::get('login-mentor', 'Frontend\LoginController@login_mentor')->name('login-m.index');

Route::get('login-student', 'Frontend\LoginController@login_student')->name('login-s.index');

Route::post('post-comment/{id}', 'CommentController@postComment');
