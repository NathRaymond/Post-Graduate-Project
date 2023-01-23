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
        Route::group(['prefix' => 'agents'], function () {
            Route::get('/', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('all_agents');
            Route::get('/edit', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('all_agents');
        });
    });
    Route::get('/get_lga', [App\Http\Controllers\AgentController::class, 'getLGA'])->name("get_state_lga");

    Route::group(['prefix' => 'student'], function () {
        Route::get('/dashboard', [App\Http\Controllers\Student\StudentController::class, 'studentindex'])->name('studentpage');

        Route::get('/biodata', [App\Http\Controllers\Student\BiodataController::class, 'studentbiodata'])->name('studentbiodatapage');
        
        Route::get('/course', [App\Http\Controllers\Student\CourseController::class, 'studentcourse'])->name('studentcoursepage');
       
        Route::get('/contact', [App\Http\Controllers\Student\ContactController::class, 'studentcontact'])->name('studentcontactpage');
        
        Route::get('/result', [App\Http\Controllers\Student\ResultController::class, 'studentresult'])->name('studentresultpage');
        
        Route::get('/publication', [App\Http\Controllers\Student\PublicationController::class, 'studentpublication'])->name('studentpublicationpage');
        
        Route::get('/prizes', [App\Http\Controllers\Student\PrizeController::class, 'studentprizes'])->name('studentprizespage');
        
        Route::get('/appointment', [App\Http\Controllers\Student\AppointmentController::class, 'studentappointment'])->name('studentappointmentpage');
        
        Route::get('/refree', [App\Http\Controllers\Student\RefreeController::class, 'studentrefree'])->name('studentrefreepage');
    
    });
  
});
   Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name("logout");

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
