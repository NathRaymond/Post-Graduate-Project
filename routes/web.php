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

Route::get('/register-agent', function () {
    return view('agent.register');
})->name('register_agent');

Route::get('/', function () {
    return  view('welcome');
});
Route::get('/getfee', [App\Http\Controllers\RegistrationController::class, 'getFee'])->name('get_fee_by_type');
Route::get('/upload-receipt', [App\Http\Controllers\RegistrationController::class, 'uploadReceipt'])->name('upload-receipt');
Route::get( '/getProgrammes', [App\Http\Controllers\RegistrationController::class, 'getProgrammeList'])->name('getProgrammeList');
Route::get('/returning-student', [App\Http\Controllers\RegistrationController::class, 'returningStudent'])->name('returning-student-home');
Route::post('/verify-returning-student', [App\Http\Controllers\RegistrationController::class, 'verifyReturningStudent'])->name('verify-returning-student-home');
Route::post('/upload-receipt', [App\Http\Controllers\RegistrationController::class, 'saveReceipt'])->name('upload-receipt-file');
Route::get('/new-registration', [App\Http\Controllers\RegistrationController::class, 'register'])->name('register_page');
Route::post('/temporary-registration', [App\Http\Controllers\RegistrationController::class, 'tempRegistration'])->name('temporary-registration');

Route::get('/home', function () {
    return  redirect()->route('login');
})->name('home');
Route::POST('/register-agent', [App\Http\Controllers\AgentController::class, 'registerAgent'])->name('register_agent');

Auth::routes();
Route::get('/register', function () {
    return redirect()->route('register_page');
});
Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin_dashboard');
        Route::group(['prefix' => 'agents'], function () {
            Route::get('/', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('all_agents');
            Route::get('/edit', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('all_agents');
        });
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users_home');
            Route::any('view_user_details/{id}', [App\Http\Controllers\UserController::class, 'viewDetails'])->name('view_user_details');
            Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create_new_user');
            Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('admin_user_update');
            Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user_edit');
            Route::get('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.destroy');
        });
         Route::group(['prefix' => 'role'], function () {
            Route::get('/', [App\Http\Controllers\RolesController::class, 'index'])->name('roles_home');
            Route::get('/create', [App\Http\Controllers\RolesController::class, 'create'])->name('create_new_role');
            Route::post('/store', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.store');
            Route::post('/create_permission', [App\Http\Controllers\RolesController::class, 'create_permission'])->name('create_permission');
            Route::get('/roleList', [App\Http\Controllers\RolesController::class, 'getAccountRolesList'])->name('get_role_list');
            Route::get('/edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('edit_role');
            Route::get('/show/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('show_role');
            Route::any('/update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('update_role');
            Route::get('/delete', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role.destroy');
            Route::get('/rolelist', [App\Http\Controllers\RolesController::class, 'getRolelist'])->name('role_list');
        });

     Route::group(['prefix' => 'student'], function () {
            Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('admin_student_home');
            Route::get('/applicants', [App\Http\Controllers\StudentController::class, 'applicants'])->name('applicants_home');
            Route::get('/registered', [App\Http\Controllers\StudentController::class, 'registered'])->name('registered_students');
            Route::get('/applications', [App\Http\Controllers\StudentController::class, 'applications'])->name('applications_home');
            Route::get('/view/{id}', [App\Http\Controllers\StudentController::class, 'viewDetails'])->name('view_student_details');
            Route::get('/applicant/{id}', [App\Http\Controllers\StudentController::class, 'viewDetails'])->name('view_applicant_details');
            Route::get('/application_details/{id}', [App\Http\Controllers\StudentController::class, 'applicationDetails'])->name('application_details');
            Route::get('/approve_Application', [App\Http\Controllers\StudentController::class, 'approve_Application'])->name('approve_Application');
            Route::post('/upload_applicants', [App\Http\Controllers\StudentController::class, 'upload_applicants'])->name('upload_applicants');
        });


        Route::group(['prefix' => 'session'], function () {
            Route::get('/', [App\Http\Controllers\AcademicSessionController::class, 'index'])->name('academic_session_home');
            Route::POST('/create', [App\Http\Controllers\AcademicSessionController::class, 'create'])->name('create_new_session');

            Route::get('/edit', [App\Http\Controllers\AcademicSessionController::class, 'edit'])->name('edit_academic_session');
            Route::post('/update', [App\Http\Controllers\AcademicSessionController::class, 'update'])->name('update_academic_session');


        });

   Route::group(['prefix' => 'course'], function () {
            Route::get('/', [App\Http\Controllers\CourseController::class, 'index'])->name('course_home');
            Route::get('/delete', [App\Http\Controllers\CourseController::class, 'delete'])->name('delete_course');
            Route::post('/create', [App\Http\Controllers\CourseController::class, 'create'])->name('add_new_course');
            Route::post('/update', [App\Http\Controllers\CourseController::class, 'update'])->name('update_new_course');
        });

        Route::group(['prefix' => 'department'], function () {
            Route::get('/', [App\Http\Controllers\DepartmentController::class, 'index'])->name('department_home');
            Route::post('/create', [App\Http\Controllers\DepartmentController::class, 'createDepartment'])->name('createDepartment');
            Route::post('/update', [App\Http\Controllers\DepartmentController::class, 'updateDepartment'])->name('updateDepartment');
            Route::get('/delete', [App\Http\Controllers\DepartmentController::class, 'deleteDepartment'])->name('deleteDepartment');
            Route::get('/info', [App\Http\Controllers\DepartmentController::class, 'departmentInfo'])->name('departmentInfo');
        });

         Route::group(['prefix' => 'programmes'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ProgrammesController::class, 'index'])->name('programmes_home');
            Route::get( '/edit', [App\Http\Controllers\Admin\ProgrammesController::class, 'edit'])->name('edit_programme');
            Route::post('/create', [App\Http\Controllers\Admin\ProgrammesController::class, 'create'])->name('create-new-programme');
            Route::post('/update', [App\Http\Controllers\Admin\ProgrammesController::class, 'update'])->name('update-programme');
        });
        Route::group(['prefix' => 'fees'], function () {
            Route::get('/', [App\Http\Controllers\Admin\FeeController::class, 'index'])->name('fees_home');
            Route::get('/update-fee-status', [App\Http\Controllers\Admin\FeeController::class, 'updateFeeStatus'])->name('update-fee-status');
            Route::get('/all-fees-data', [App\Http\Controllers\Admin\FeeController::class, 'feesData'])->name('all-fees-data');
            Route::get('/get-fee-info', [App\Http\Controllers\Admin\FeeController::class, 'feeInfo'])->name('get-fee-info');
            Route::post('/create', [App\Http\Controllers\Admin\FeeController::class, 'create'])->name('create-new-fee');
            Route::post('/update', [App\Http\Controllers\Admin\FeeController::class, 'update'])->name('create-fee-record');
        });
        Route::group(['prefix' => 'payments'], function () {
             Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment-home');
             Route::post('/decline', [App\Http\Controllers\PaymentController::class, 'decline'])->name('decline-payment');
            Route::get('/awaiting-confirmation', [App\Http\Controllers\PaymentController::class, 'awaitingConfirmation'])->name('awaiting-confirmation');
            Route::post('/save', [App\Http\Controllers\PaymentController::class, 'save'])->name('save-payment');
        });


        Route::group(['prefix' => 'referee'], function () {
            Route::get('/', [App\Http\Controllers\StudentController::class, 'refereeQuestions'])->name('referee_questions');
            Route::get('/delete', [App\Http\Controllers\StudentController::class, 'deleteRefereeQuestion'])->name('deleteRefereeQuestion');
            Route::get('/edit', [App\Http\Controllers\StudentController::class, 'editQuestion'])->name('edit_question');
            Route::post('/store', [App\Http\Controllers\StudentController::class, 'storeRefereeQuestion'])->name('addNewQuestion');
            Route::post('/update', [App\Http\Controllers\StudentController::class, 'updateQuestion'])->name('updateQuestion');
        });


         Route::post('/changePassword', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updated_account'])->name('changePassword');

    });

});

    Route::group(['middleware' => 'student'], function () {
        Route::group(['prefix' => 'student'], function () {
            Route::get('/', [App\Http\Controllers\HomeController::class, 'studentDashboard'])->name('student_dashboard');
            Route::get('/dashboard', [App\Http\Controllers\Student\StudentController::class, 'studentindex'])->name('studentpage');
            Route::get('/registration', [App\Http\Controllers\Student\StudentController::class, 'studentregistration'])->name('student_registration_page');
            Route::get('/getstudent_detail', [App\Http\Controllers\StudentController::class, 'getstudentInform'])->name('getstudentInformation');
            Route::post('/register_student', [App\Http\Controllers\Student\StudentController::class, 'registerstudent'])->name('register-student');
            Route::post('/create_course', [App\Http\Controllers\Student\StudentController::class, 'create_coursereg'])->name('create_regStock');
            Route::post('/create_appointment', [App\Http\Controllers\Student\StudentController::class, 'create_appointmentreg'])->name('create_regappointment');
            Route::post('/create_refree', [App\Http\Controllers\Student\StudentController::class, 'create_refreereg'])->name('create_regrefree');
            Route::post('/create_olevel', [App\Http\Controllers\Student\StudentController::class, 'create_olevelreg'])->name('create_regolevel');
            Route::post('/create_prize', [App\Http\Controllers\Student\StudentController::class, 'create_prizereg'])->name('create_regprize');
            Route::post('/create_publication', [App\Http\Controllers\Student\StudentController::class, 'create_publicationreg'])->name('create_regpublication');
            Route::post('/create_certificate', [App\Http\Controllers\Student\StudentController::class, 'create_certificatereg'])->name('create_regcertificate');
            Route::post('/profile_picture', [App\Http\Controllers\Student\StudentController::class, 'profile_pics'])->name('upload_picture');

        });
    });

    Route::get('/get_lga', [App\Http\Controllers\AgentController::class, 'getLGA'])->name("get_state_lga");

});
   Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');

    return $exitCode;
});
Route::get('/clear-route', function () {
    $exitCode = Artisan::call('route:clear');

    return $exitCode;
});

Route::get('/clear-view', function () {
    $exitCode = Artisan::call('view:clear');

    return $exitCode;
});
Route::get('/optimize-clear', function () {
    $exitCode = Artisan::call('optimize:clear');

    return $exitCode;
});

Route::get('/clear-laravel-log-file', function () {
    exec('rm -f ' . storage_path('logs/*.log'));
    exec('rm -f ' . base_path('*.log'));

    return 'Log file deleted';
});

