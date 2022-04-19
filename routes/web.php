<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEmployeeController;
use App\Http\Controllers\Admin\AdminInventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\stocksController;
use App\Http\Controllers\Admin\itemsController;
use App\Http\Controllers\Admin\AssetsController;
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
        
    Route::resource('inventory', AdminInventoryController::class)->names([
        'index' => 'inventory.index',
        'store' => 'inventory.store',
         
    ]);
        

});

Route::any('inventory/master', [AdminInventoryController::class, 'inventory_master'])->name('inventory-master');
Route::any('inventory/items', [AdminInventoryController::class, 'items_list'])->name('inventory-items');
Route::post('add/inventory/item', [AdminInventoryController::class, 'add_new_item'])->name('add-new-item');
Route::any('item/code/{id}',[AdminInventoryController::class, 'item_code']);
Route::any('getItem/{id}', function($id){
     
});


Route::any('get/inventory/items', [AdminInventoryController::class, 'get_items']);
Route::get('/d', function () {
    return view('font.demo');
});
Route::any('delete/broker/item/{id}', [AdminInventoryController::class, 'delete_item']);
Route::any('view/item/{id}', [AdminInventoryController::class, 'view_item']);
Route::any('edit/item/{id}', [AdminInventoryController::class, 'edit_item']); 
//stock in routes
Route::any('stock/in', [stocksController::class, 'stock_in'])->name('stocks-in');
Route::any('stock/add',[stocksController::class, 'add_new_stock'])->name('addNewStock');
Route::any('stockin/edit/{id}', [stocksController::class, 'stock_in_edit']);
Route::any('stockin/delete/{id}', [stocksController::class, 'stock_in_delete']);
Route::any('update/stock', [stocksController::class, 'update_stock_in'])->name('updateStockIn');
//stock out routes
Route::any('stockout/edit/{id}',[stocksController::class, 'stock_out_edit'])->name('stocksout-edit');
Route::any('update/stockout', [stocksController::class, 'update_stock_out'])->name('update-stock-out');
Route::any('stock/out', [stocksController::class, 'stock_out'])->name('stocks-out'); 
Route::any('stockout/delete/{id}', [stocksController::class, 'delete_stockout']); 
Route::any('stock/out/add', [stocksController::class, 'stock_out_add'])->name('stockout-add');


Route::any('update/item', [itemsController::class, 'update']);
Route::any('delete/item/{id}', [itemsController::class, 'destroy'])->name('delete-item');

Route::any('get/selected/item/{id}',[itemsController::class,'edit']);

Route::get('get/assets', [AssetsController::class, 'index'])->name('get-assets');

// Route::get('get/attendance', [])->name('admin.attendance');
require __DIR__ . '/auth.php';
