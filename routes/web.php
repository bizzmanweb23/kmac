<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
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

Route::get('/', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('/Dashboard', AdminDashboardController::class)->names([
        'index' => 'dashboard.index'
    ]);
	
	Route::any('/edit_user_details', [AdminUserController::class, 'edit_user_details'])->name('edit_user_details');
	Route::resource('user', AdminUserController::class)->names([
        'index' => 'user.index',
        'store' => 'user.store'
    ]);

});

Route::get('/d', function () {
    return view('font.demo');
});

require __DIR__ . '/auth.php';
