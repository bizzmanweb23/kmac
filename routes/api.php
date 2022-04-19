<?php 
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\EmpController;

use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 
Route::post('register',[RegisterController::class, 'register'])->name('register');
Route::post('login',[RegisterController::class, 'login'])->name('login');
 
Route::post('attendance', [EmpController::class, 'store']);
Route::post('logout', [RegisterController::class, 'logout']);

Route::post('forgot/password/link', [RegisterController::class, 'ForgotPasswordlink']);

Route::post('reset/password',[RegisterController::class, 'ResetPasswordStore']);

Route::get('inventory', [EmpController::class, 'inventory']);

Route::get('tasks', [EmpController::class, 'tasks']);

Route::get('my/tasks', [EmpController::class, 'my_tasks']);
Route::get('assets', [EmpController::class, 'assets']); 

Route::get('completed-jobs',[EmpController::class, 'completed_jobs']);

Route::post('mc/submittion', [EmpController::class, 'mc_submittion']);

Route::post('profile', [RegisterController::class , 'profile_edit']);

Route::get('get/profile',[EmpController::class, 'get_profile']);