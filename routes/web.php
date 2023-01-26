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
    return  redirect()->route('login');
});
Route::POST('/register-agent', [App\Http\Controllers\AgentController::class, 'registerAgent'])->name('register_agent');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin_dashboard');
        Route::group(['prefix' => 'programmes'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ProgrammesController::class, 'index'])->name('programmes_home');
            Route::get('/edit', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('all_agents');
        });
    });
    Route::get('/get_lga', [App\Http\Controllers\AgentController::class, 'getLGA'])->name("get_state_lga");

    Route::group(['prefix' => 'student'], function () {
        Route::get('/dashboard', [App\Http\Controllers\Student\StudentController::class, 'studentindex'])->name('studentpage');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users_home');
            Route::any('view_user_details/{id}', [App\Http\Controllers\UserController::class, 'viewDetails'])->name('view_user_details');
            Route::post('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create_new_user');
            Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');
            Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('get_user_by_id');
            Route::get('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.destroy');
        });

        Route::get('/get_lga', [App\Http\Controllers\AgentController::class, 'getLGA'])->name("get_state_lga");

        Route::get('/registration', [App\Http\Controllers\Student\StudentController::class, 'studentregistration'])->name('student_registration_page');
        Route::post('/register_student', [App\Http\Controllers\Student\StudentController::class, 'registerstudent'])->name('register-student');
        Route::post('/create_course', [App\Http\Controllers\Student\StudentController::class, 'create_coursereg'])->name('create_regStock');
        Route::post('/create_appointment', [App\Http\Controllers\Student\StudentController::class, 'create_appointmentreg'])->name('create_regappointment');
        Route::post('/create_refree', [App\Http\Controllers\Student\StudentController::class, 'create_refreereg'])->name('create_regrefree');
        Route::post('/create_olevel', [App\Http\Controllers\Student\StudentController::class, 'create_olevelreg'])->name('create_regolevel');
        Route::post('/create_prize', [App\Http\Controllers\Student\StudentController::class, 'create_prizereg'])->name('create_regprize');
        Route::post('/create_publication', [App\Http\Controllers\Student\StudentController::class, 'create_publicationreg'])->name('create_regpublication');
        
        Route::get('/payment', [App\Http\Controllers\Student\StudentController::class, 'studentpayment'])->name('student_payment_page');
        
    });
  
});
   Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
