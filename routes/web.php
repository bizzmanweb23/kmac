<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEmployeeController;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('/Dashboard', AdminDashboardController::class)->names([
        'index' => 'dashboard.index'
    ]);
	
	Route::any('/edit_user_details', [AdminUserController::class, 'edit_user_details'])->name('edit_user_details');
	Route::any('/view_user_details', [AdminUserController::class, 'view_user_details'])->name('view_user_details');
	Route::resource('user', AdminUserController::class)->names([
        'index' => 'user.index',
        'store' => 'user.store'
    ]);
	
	Route::any('/view_employee_details', [AdminEmployeeController::class, 'view_employee_details'])->name('view_employee_details');
	Route::any('/edit_employee_details', [AdminEmployeeController::class, 'edit_employee_details'])->name('edit_employee_details');
	Route::resource('employee', AdminEmployeeController::class)->names([
        'index' => 'employee.index',
        'store' => 'employee.store'
    ]);

});

Route::get('/d', function () {
    return view('font.demo');
});

require __DIR__ . '/auth.php';
