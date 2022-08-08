<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\User;

 //home
Route::get('/',function(){
    $tracks = Track::all();
    $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
	$famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();
    return view('welcome.index',compact('tracks','famous_tracks'));
})->name('welcome');

Route::group(['prefix' => '/', 'middleware' => ['guest']],function () {
   
    //login admin
    Route::get('admin/login', [App\Http\Controllers\Admin\AdminLoginController::class, 'indexLogin'])->name('login.index');
    Route::post('admin/login/submit', [App\Http\Controllers\Admin\AdminLoginController::class, 'loginAdmin'])->name('admin.login');
    Route::get('admin/logout', [App\Http\Controllers\Admin\AdminLoginController::class, 'adminLogout'])->name('admin.logout');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']],function () {

    //dashboard
    Route::get('/dashboard', function () {
        $tracks_count = Track::all()->count();
        $courses_count = Course::all()->count();
        $quizzes_count = Quiz::all()->count();
        $users_count = User::all()->count();
        // set layout sesion(key)
        session(['layout' => 'compact']);
        return view('admin-dashboard.dashboardv1', compact('tracks_count','courses_count','quizzes_count','users_count'));
    })->name('dashboard');
    //crud admin
    Route::resource('/admins', 'App\Http\Controllers\Admin\AdminController');
    //upload file
    Route::get('/admins/upload/{id}', [App\Http\Controllers\Admin\AdminController::class, 'upload']);
    Route::post('/admins/upload/{id}', [App\Http\Controllers\Admin\AdminController::class, 'UploadImage'])->name('admins.upload');
    //crud user
    Route::resource('/users', 'App\Http\Controllers\User\UserController');
    //upload avatar
    Route::get('/users/upload/{id}', [App\Http\Controllers\User\UserController::class, 'upload']);
    Route::post('/users/upload/{id}', [App\Http\Controllers\User\UserController::class, 'UploadAvatar'])->name('users.upload');
    //tracks
    Route::resource('/tracks', 'App\Http\Controllers\Admin\TrackController');
    Route::resource('/tracks.courses', 'App\Http\Controllers\Admin\TrackCourseController');

    //courses
    Route::resource('/courses', 'App\Http\Controllers\Admin\CourseController');
    Route::get('/course-index/{id}', [\App\Http\Controllers\Admin\CourseController::class,'indexCourse'])->name('index.courses');
    Route::post('/course-store/{id}', [\App\Http\Controllers\Admin\CourseController::class,'storeCourse'])->name('store.courses');
    Route::get('/course-create/{id}', [\App\Http\Controllers\Admin\CourseController::class,'createCourse'])->name('create.courses');
    Route::get('/course-edit/{id}/{track_id}', [\App\Http\Controllers\Admin\CourseController::class,'editCourse'])->name('edit.courses');
    Route::put('/course-update/{id}/{track_id}', [\App\Http\Controllers\Admin\CourseController::class,'updateCourse'])->name('update.courses');
    Route::resource('/courses.videos', 'App\Http\Controllers\Admin\CourseVideoController');
    Route::resource('/courses.quizzes', 'App\Http\Controllers\Admin\CourseQuizController');

    //videos
    Route::resource('/videos', 'App\Http\Controllers\Admin\VideoController');
    //quizzes
    Route::resource('/quizzes', 'App\Http\Controllers\Admin\QuizController');
    Route::resource('/quizzes.questions', 'App\Http\Controllers\Admin\QuizQuestionController');

    //questions
    Route::resource('/questions', 'App\Http\Controllers\Admin\QuestionController');

    //export & emport user
    Route::get('/file-import',[App\Http\Controllers\User\UserController::class,'importView'])->name('import-view');
    Route::post('/import',[App\Http\Controllers\User\UserController::class,'import'])->name('import');
    Route::get('/export-users',[App\Http\Controllers\User\UserController::class,'exportUsers'])->name('export-users');

});

Route::group(['prefix' => 'auth', 'middleware' => ['auth']],function () {
    Route::get('search', [App\Http\Controllers\SearchController::class, 'index']);
    //home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //courses
    Route::get('/course/{slug}', [App\Http\Controllers\CourseController::class, 'index'])->name('course.name');
    Route::post('/course/{slug}', [App\Http\Controllers\CourseController::class, 'enroll']);
    Route::get('/myCourses', [App\Http\Controllers\CourseController::class, 'myCourses']);
    Route::get('/allCourses', [App\Http\Controllers\CourseController::class, 'allCourses']);

    Route::get('/course/quizzes/{slug}/{name}', [App\Http\Controllers\QuizController::class, 'index'])->name('quiz.name');
    Route::post('/course/quizzes/{slug}/{name}', [App\Http\Controllers\QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/track/{name}', [App\Http\Controllers\TrackController::class, 'index']);
    //profile
    Route::get('/myProfile', [App\Http\Controllers\ProfileController::class, 'myprofile']);
    Route::post('/myProfile', [App\Http\Controllers\ProfileController::class, 'UploadAvatar'])->name('upload.avatar');
    Route::post('/update-profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update.profile');
    //contact us
    Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'index']);
    Route::post('/contact-us', [App\Http\Controllers\ContactController::class, 'contactUs']);



});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


