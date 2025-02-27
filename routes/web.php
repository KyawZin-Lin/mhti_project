<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\ForumController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Users\QuestionController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Users\AnnouncementController;
use App\Http\Controllers\Users\ForumCommentController;
use App\Http\Controllers\Users\StudentAnswerController;
use App\Http\Controllers\Users\ListeningQuestionController;
use App\Http\Controllers\Users\StudentAnswerListeningController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'store'])->name('admin.login.store');

Route::get('/admin/register', [AdminRegisterController::class, 'create'])->name('admin.register');

Route::post('/admin/register', [AdminRegisterController::class, 'store'])->name('admin.store');

// User Auth

Route::get('/user/login',[UserLoginController::class,'loginPage'])->name('user.loginPage');

Route::post('/user/login', [UserLoginController::class, 'store'])->name('user.login.store');

Route::get('/user/register',[UserRegisterController::class,'create'])->name('user.register');

Route::get('ajaxNrcAbbre',[UserRegisterController::class,'ajaxNrcAbbre'])->name('user.ajaxNrcAbbre');

Route::get('ajaxTownship',[UserRegisterController::class,'ajaxTownship'])->name('user.ajaxTownship');

Route::post('/user/register', [UserRegisterController::class, 'store'])->name('user.store');

// Route::get('/', function () {
//         return view('users.master');
//     })->name('master');

Route::redirect('/','user/announcements');

Route::prefix('user')->name('user.')->middleware('auth')->group(function(){

    Route::post('/logout', [UserLoginController::class, 'destroy'])->name('logout');

    Route::get('/profile', [UserLoginController::class, 'profile'])->name('profile');

    Route::get('/announcements',[AnnouncementController::class,'index'])->name('announcements');

    Route::get('/announcements/detail/{id}',[AnnouncementController::class,'detail'])->name('announcements.detail');

    Route::post('/announcements/comment/store',[AnnouncementController::class,'commentStore'])->name('comment.store');

    Route::get('examReadingType1',[QuestionController::class,'examReadingType1'])->name('examReadingType1');

    Route::get('examReadingType2',[QuestionController::class,'examReadingType2'])->name('examReadingType2');

    Route::get('examReadingType3',[QuestionController::class,'examReadingType3'])->name('examReadingType3');

    Route::get('examReadingType4',[QuestionController::class,'examReadingType4'])->name('examReadingType4');

    Route::get('examReadingType5',[QuestionController::class,'examReadingType5'])->name('examReadingType5');

    Route::get('examReadingType6',[QuestionController::class,'examReadingType6'])->name('examReadingType6');

    Route::get('examReadingType7',[QuestionController::class,'examReadingType7'])->name('examReadingType7');

    Route::get('examReadingType8',[QuestionController::class,'examReadingType8'])->name('examReadingType8');

    Route::get('examListeningType1',[ListeningQuestionController::class,'examListeningType1'])->name('examListeningType1');

    Route::get('examListeningType2',[ListeningQuestionController::class,'examListeningType2'])->name('examListeningType2');

    Route::get('examListeningType3',[ListeningQuestionController::class,'examListeningType3'])->name('examListeningType3');

    Route::get('examListeningType4',[ListeningQuestionController::class,'examListeningType4'])->name('examListeningType4');

    Route::get('examListeningType5',[ListeningQuestionController::class,'examListeningType5'])->name('examListeningType5');

    Route::get('examListeningType6',[ListeningQuestionController::class,'examListeningType6'])->name('examListeningType6');

    Route::get('examListeningType7',[ListeningQuestionController::class,'examListeningType7'])->name('examListeningType7');

    Route::get('examListeningType8',[ListeningQuestionController::class,'examListeningType8'])->name('examListeningType8');

    Route::resource('student_answers',StudentAnswerController::class);

    Route::resource('student_answers_listenings',StudentAnswerListeningController::class);

    Route::get('forums/index',[ForumController::class,'index'])->name('forum.index');

    Route::post('/forums/comment/store',[ForumCommentController::class,'commentStore'])->name('comment.store');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
