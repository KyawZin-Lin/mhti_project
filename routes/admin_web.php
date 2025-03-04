<?php

use App\Http\Controllers\Admins\JobController;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\RoomController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\BatchController;
use App\Http\Controllers\Admins\FloorController;
use App\Http\Controllers\Admins\ForumController;
use App\Http\Controllers\Admins\StaffController;
use App\Http\Controllers\Admins\StateController;
use App\Http\Controllers\Admins\AbsentController;
use App\Http\Controllers\Admins\BranchController;
use App\Http\Controllers\Admins\CourseController;
use App\Http\Controllers\Admins\DegreeController;
use App\Http\Controllers\Admins\ExpendController;
use App\Http\Controllers\Admins\IncomeController;
use App\Http\Controllers\Admins\LessonController;
use App\Http\Controllers\Admins\ModuleController;
use App\Http\Controllers\Admins\NrcInfoController;
use App\Http\Controllers\Admins\StudentController;
use App\Http\Controllers\Admins\TeacherController;
use App\Http\Controllers\Admins\BuildingController;
use App\Http\Controllers\Admins\QuestionController;
use App\Http\Controllers\Admins\TownshipController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admins\ClassroomController;
use App\Http\Controllers\Admins\CourseFeeController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\LogHistoryController;
use App\Http\Controllers\Admins\PermissionController;
use App\Http\Controllers\Admins\StaffLeaveController;
use App\Http\Controllers\Admins\PaymentTypeController;
use App\Http\Controllers\Admins\StudentRoleController;
use App\Http\Controllers\Admins\AcademicYearController;
use App\Http\Controllers\Admins\AnnouncementController;
use App\Http\Controllers\Admins\IncomeSourceController;
use App\Http\Controllers\Admins\RegistrationController;
use App\Http\Controllers\Admins\SourceSurveyController;
use App\Http\Controllers\Admins\TeacherLeaveController;
use App\Http\Controllers\Admins\AttendentListController;
use App\Http\Controllers\Admins\MedicalStatusController;
use App\Http\Controllers\Admins\StudentAnswerController;
use App\Http\Controllers\Admins\AttendanceListController;
use App\Http\Controllers\Admins\FutureInterestController;
use App\Http\Controllers\Admins\QuestionCategoryController;
use App\Http\Controllers\Admins\QuestionListeningController;
use App\Http\Controllers\Admins\StudentPermissionController;
use App\Http\Controllers\Admins\TeacherAttendanceController;
use App\Http\Controllers\Admins\StudentAnswerListeningController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth:admin_user')->group(function(){

    Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/userguide', [DashboardController::class, 'userguide'])->name('userguide');


    Route::get('/registrations/deleted-history', [RegistrationController::class,'deletedList'])->name('registrations.deleted-history');

    Route::resource('/registrations',RegistrationController::class);

    Route::get('/chooseType',[RegistrationController::class,'chooseType'])->name('chooseType');

    Route::get('/courseBatchAjax',[RegistrationController::class,'courseBatchAjax'])->name('courseBatchAjax');

    Route::resource('/students',StudentController::class);

    Route::get('/card/{id}',[StudentController::class,'card'])->name('students.card');


    Route::get('increase_student/{id}',[StudentController::class,'increaseLimit'])->name('increase_student');

    Route::put('increase_student/update/{id}',[StudentController::class,'increaseLimitAdd'])->name('increase_student.update');

    Route::get('ajaxNrcAbbre',[StudentController::class,'ajaxNrcAbbre'])->name('ajaxNrcAbbre');

    Route::get('ajaxTownship',[StudentController::class,'ajaxTownship'])->name('ajaxTownship');

    Route::get('/active_student',[StudentController::class,'activeStudent'])->name('activeStudent');

    Route::get('/enrollment',[StudentController::class,'enrollment'])->name('enrollment');

    Route::get('/student_enrollment/{batch_id}',[StudentController::class,'studentEnrollment'])->name('student_enrollment');

    Route::get('/student_enrollment_detail/{id}',[StudentController::class,'studentEnrollmentDetail'])->name('student_enrollment_detail');

    Route::get('/batchMessage',[StudentController::class,'batchMessage'])->name('batchMessage');

    Route::get('/generateStudentCode',[StudentController::class,'generateStudentCode'])->name('generateStudentCode');

    Route::get('/alumnus',[StudentController::class,'alumnus'])->name('alumnus');

    Route::get('/oversea',[StudentController::class,'oversea'])->name('oversea');

    Route::get('/payment_by_installment_page/{id}',[StudentController::class,'paymentByInstallmentPage'])->name('payment_by_installment_page');

    Route::put('/payment_by_installment/{id}',[StudentController::class,'paymentByInstallment'])->name('payment_by_installment');

    Route::get('/complete_payment_student',[StudentController::class,'completePaymentStudent'])->name('complete_payment_student');

    Route::get('/incomplete_payment_student',[StudentController::class,'incompletePaymentStudent'])->name('incomplete_payment_student');

    Route::resource('/medical_statuses',MedicalStatusController::class);

    Route::resource('/teachers',TeacherController::class);

    Route::resource('/teacher_attendances',TeacherAttendanceController::class);

    Route::get('increase_teacher/{id}',[TeacherController::class,'increaseLimit'])->name('increase_teacher');

    Route::put('increase_teacher/update/{id}',[TeacherController::class,'increaseLimitAdd'])->name('increase_teacher.update');

    Route::get('/teacher_enrollment/{batch_id}',[TeacherController::class,'teacherEnrollment'])->name('teacher_enrollment');

    Route::get('/teacher_enrollment_detail/{id}',[TeacherController::class,'teacherEnrollmentDetail'])->name('teacher_enrollment_detail');

    Route::delete('/teacher_payment_auto_delete/{id}',[TeacherController::class,'teacherPaymentAutoDelete'])->name('teacher_payment_auto_delete');

    Route::get('/teacher_grid_view/{id}/{month}',[TeacherController::class,'gridView'])->name('teacher_grid_view');

    Route::resource('/staff',StaffController::class);

    Route::resource('/staff_leaves',StaffLeaveController::class);

    Route::resource('/teacher_leaves',TeacherLeaveController::class);

    Route::resource('/degrees',DegreeController::class);

    Route::get('/batch_detail/{id}',[DegreeController::class,'batchDetail'])->name('batch_detail');

    Route::get('/degrees/student_detail/{id}',[DegreeController::class,'studentDetail'])->name('degrees.student_detail');

    Route::resource('/academic_years',AcademicYearController::class);

    Route::resource('/courses',CourseController::class);

    Route::resource('/jobs',JobController::class);

    Route::resource('/modules',ModuleController::class);

    Route::resource('/lessons',LessonController::class);

    Route::resource('/question_categories',QuestionCategoryController::class);

    Route::resource('/questions',QuestionController::class);

    Route::get('question_export', [QuestionController::class,'export'])->name('question_export');

    Route::resource('/question_listenings',QuestionListeningController::class);

    Route::get('question_listening_export', [QuestionListeningController::class,'export'])->name('question_listening_export');

    Route::resource('/states',StateController::class);

    Route::resource('/townships',TownshipController::class);

    Route::resource('/nrc_infos',NrcInfoController::class);

    Route::resource('/announcements',AnnouncementController::class);

    Route::resource('/student_answers',StudentAnswerController::class);

    Route::get('/student_answers_detail_list/{id}',[StudentAnswerController::class,'detailList'])->name('student_answers_detail_list');

    Route::resource('/student_answers_listenings',StudentAnswerListeningController::class);

    Route::get('/sa_detail_list/{id}',[StudentAnswerListeningController::class,'detailList'])->name('sa_detail_list');

    Route::resource('/forums',ForumController::class);

    Route::resource('/attendance_lists',AttendanceListController::class);

    Route::get('/absents/create',[AttendanceListController::class,'absentCreate'])->name('absents.create');

    Route::get('/absents',[AttendanceListController::class,'absentList'])->name('absents');

    Route::post('/absent_store',[AttendanceListController::class,'absentStore'])->name('absent_store');

    Route::get('/absent_edit/{id}',[AttendanceListController::class,'absentEdit'])->name('absent_edit');

    Route::put('/absent_update/{id}',[AttendanceListController::class,'absentUpdate'])->name('absent_update');

    Route::delete('/absent_delete/{id}',[AttendanceListController::class,'absentDestroy'])->name('absent_delete');

    Route::get('absent_lists_export', [AttendanceListController::class,'exportAbsent'])->name('absent_lists_export');

    Route::get('attendance_lists_export', [AttendanceListController::class,'export'])->name('attendance_lists_export');

    Route::resource('classrooms', ClassroomController::class);

    Route::resource('student_permissions', StudentPermissionController::class);

    Route::resource('student_roles', StudentRoleController::class);

    Route::resource('payment_types',PaymentTypeController::class);

    Route::resource('incomes', IncomeController::class);

    Route::get('income_export', [IncomeController::class,'export'])->name('income_export');

    Route::resource('income_sources', IncomeSourceController::class);

    Route::resource('expends', ExpendController::class);

    Route::get('expense_export', [ExpendController::class,'export'])->name('expense_export');

    Route::get('teacher_ajax', [ExpendController::class,'teacherAjax'])->name('teacher_ajax');

    Route::get('staff_ajax', [ExpendController::class,'staffAjax'])->name('staff_ajax');

    Route::resource('batches',BatchController::class);

    Route::resource('permissions', PermissionController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    Route::get('/change_password_page/{id}',[UserController::class,'changePasswordPage'])->name('change_password_page');

    Route::post('/change_password/{id}',[UserController::class,'changePassword'])->name('change_password');

    Route::get('/increase_count_page/{id}',[UserController::class,'increaseCountPage'])->name('increase_count_page');

    Route::post('/increase_count/{id}',[UserController::class,'increaseCount'])->name('increase_count');

    Route::put('/approve/{id}',[UserController::class,'approve'])->name('approve');

    Route::get('/pending_page',[UserController::class,'pendingPage'])->name('pending_page');

    Route::resource('rooms',RoomController::class);

    Route::resource('floors',FloorController::class);

    Route::resource('buildings',BuildingController::class);

    Route::resource('branches',BranchController::class);

    Route::resource('course_fees',CourseFeeController::class);

    Route::resource('future_interests',FutureInterestController::class);

    Route::resource('source_surveys',SourceSurveyController::class);

    Route::get('log_histories/index',[LogHistoryController::class,'index'])->name('log_histories.index');
});
