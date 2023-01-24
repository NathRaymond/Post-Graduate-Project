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
Route::get('/getfee', [App\Http\Controllers\Auth\RegisterController::class, 'getFee'])->name('get_fee_by_type');
Route::get('/new-registration', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register_page');
Route::post('/temporary-registration', [App\Http\Controllers\Auth\RegisterController::class, 'tempRegistration'])->name('temporary-registration');
Route::POST('/register-agent', [App\Http\Controllers\AgentController::class, 'registerAgent'])->name('register_agent');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

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
            Route::post('/update', [App\Http\Controllers\UserController::class, 'update'])->name('update_user');
            Route::get('/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('get_user_by_id');
            Route::get('/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.destroy');
        });
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [App\Http\Controllers\RolesController::class, 'index'])->name('roles_home');
            Route::get('/create', [App\Http\Controllers\RolesController::class, 'create'])->name('create_new_role');
            Route::post('/store', [App\Http\Controllers\RolesController::class, 'store'])->name('roles.store');
            Route::get('/roleList', [App\Http\Controllers\RolesController::class, 'getAccountRolesList'])->name('get_role_list');
            Route::get('/edit/{id}', [App\Http\Controllers\RolesController::class, 'edit'])->name('edit_role');
            Route::get('/show/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('show_role');
            Route::any('/update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('update_role');
            Route::get('/delete', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role.destroy');
            Route::get('/rolelist', [App\Http\Controllers\RolesController::class, 'getRolelist'])->name('role_list');
        });

        Route::group(['prefix' => 'session'], function () {
            Route::get('/', [App\Http\Controllers\AcademicSessionController::class, 'index'])->name('academic_session_home');
            Route::POST('/create', [App\Http\Controllers\AcademicSessionController::class, 'create'])->name('create_new_session');

        });
        Route::group(['prefix' => 'programmes'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ProgrammesController::class, 'index'])->name('programmes_home');
            Route::post('/create', [App\Http\Controllers\Admin\ProgrammesController::class, 'create'])->name('create-new-programme');
        });
        Route::group(['prefix' => 'fees'], function () {
            Route::get('/', [App\Http\Controllers\Admin\FeeController::class, 'index'])->name('fees_home');
            Route::post('/create', [App\Http\Controllers\Admin\FeeController::class, 'create'])->name('create-new-fee');
        });


    });

        
    });


    
    Route::get('/get_lga', [App\Http\Controllers\AgentController::class, 'getLGA'])->name("get_state_lga");
    Route::group(['prefix' => 'student'], function () {

    });

   Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");
