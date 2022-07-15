<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\WarningController;
use App\Http\Controllers\Admin\TerminationController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\EmployeeDetailsController;

use App\Http\Controllers\Admin\Employee\BonusController;
use App\Http\Controllers\Admin\Employee\CertificateController;
use App\Http\Controllers\Admin\Employee\EducationController;
use App\Http\Controllers\Admin\Employee\LicenceController;
use App\Http\Controllers\Admin\Employee\ReferalController;
use App\Http\Controllers\Admin\Employee\VaccinationController;
use App\Http\Controllers\Admin\Employee\WsqController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard',[HomeController::class, 'dashboard']);

Route::post('dependent',[EmployeeDetailsController::class, 'index']);
//employee 
Route::get('employee',[EmployeeController::class, 'index']);
Route::get('employee/details',[EmployeeController::class, 'emp_details'])->name('emp.details');
Route::get('add/employee/form',[EmployeeController::class, 'employee_add_form'])->name('emp.add');
Route::post('employee/vew',[EmployeeController::class, 'view'])->name('emp.view');
Route::post('employee/delete',[EmployeeController::class, 'destroy'])->name('emp.delete'); 
Route::post('employee/edit',[EmployeeController::class, 'edit'])->name('emp.edit');
Route::post('employee/update',[EmployeeController::class, 'update']);
Route::post('add/employee',[EmployeeController::class, 'store']);
//attachmetRoute::get('certificate',[LicenceController::class, 'index'])->name('emp.certificate'); 

 
 

Route::get('joining/bonus',[BonusController::class, 'index'])->name('emp.bonus');
Route::post('add/bonus',[BonusController::class, 'store']);
Route::any('delete/bonus',[BonusController::class, 'delete']);

Route::get('emp/certificate',[CertificateController::class, 'index'])->name('emp.certificate');
Route::post('add/certificate',[CertificateController::class, 'store']);
Route::any('delete/certificate',[CertificateController::class, 'delete']); 

Route::get('emp/referal',[ReferalController::class, 'index'])->name('emp.referal');
Route::post('add/referal',[ReferalController::class, 'store']);
Route::any('delete/referal',[ReferalController::class, 'delete']);

Route::get('licence',[LicenceController::class, 'index'])->name('emp.licence');
Route::post('add/licence',[LicenceController::class, 'store']);
Route::any('delete/licence',[LicenceController::class, 'delete']); 
Route::post('view/licence',[LicenceController::class, 'view_licence']);

Route::get('emp/education',[EducationController::class, 'index'])->name('emp.education');
Route::post('add/education',[EducationController::class, 'store']);
Route::any('delete/education',[EducationController::class, 'delete']);

Route::get('emp/vaccination',[VaccinationController::class, 'index'])->name('emp.vaccination');
Route::post('add/vaccination',[VaccinationController::class, 'store']);
Route::any('delete/vaccination',[VaccinationController::class, 'delete']);

Route::get('emp/wsq',[WsqController::class, 'index'])->name('emp.wsq');
Route::post('add/wsq',[WsqController::class, 'store']);
Route::any('delete/wsq',[WsqController::class, 'delete']);

Route::post('add/education/certificates',[EmployeeDetailsController::class, 'store_education_certificates']);
Route::post('add/certificates',[EmployeeDetailsController::class, 'store_certificates']);
Route::post('add/bonus/certificates',[EmployeeDetailsController::class, 'store_bonus_certificates']);
Route::post('add/referal/certificates',[EmployeeDetailsController::class, 'store_referal_certificates']);
Route::post('add/vaccination/certificates',[EmployeeDetailsController::class, 'store_vaccination_certificates']);
Route::post('add/wsq/certificates',[EmployeeDetailsController::class, 'store_wsq_certificates']);
//leaves
Route::get('employee/leave',[LeaveController::class, 'index'])->name('emp.leave');
Route::get('leave/form',[LeaveController::class, 'add_leave_form'])->name('emp.leave.form');
Route::post('add/leave',[LeaveController::class, 'add_leave'])->name('add.leave');
Route::any('/change/leave/status',[LeaveController::class, 'change_leave_status']);
Route::any('/delete/leave', [LeaveController::class, 'delete_leave']);
Route::any('/view/leave',[LeaveController::class, 'view_leave']); 
Route::any('leave/status',[LeaveController::class, 'leave_status'])->name('emp.leave.status');

//Route::get('salary',[PayrollController::class, 'index']);
Route::get('warning',[WarningController::class, 'index']); 
Route::get('warning/add/form', [WarningController::class, 'add_warning_form'])->name('warning.add.form') ;
Route::post('/store/warning',[WarningController::class, 'store'])->name('set.warning');
Route::post('/show/warning',[WarningController::class, 'show']);
Route::post('/delete/warning',[WarningController::class, 'destroy']);
//termination
Route::get('termination',[TerminationController::class, 'index']); 
Route::get('termination/add/form',[TerminationController::class, 'show_add_form'])->name('termination.add.form'); 
Route::post('add/termination',[TerminationController::class, 'store']);
Route::any('show/termination',[TerminationController::class, 'show']);
Route::any('delete/termination',[TerminationController::class, 'destroy']);
//payroll routes
Route::any('salary',[PayrollController::class, 'basic_salary'])->name('salary.list');
Route::any('add/salary/form',[PayrollController::class, 'add_salary_form']);
Route::any('add/salary',[PayrollController::class, 'store']);
Route::any('delete/salary',[PayrollController::class, 'destroy']);
Route::any('view/salary',[PayrollController::class, 'view']);
Route::any('edit/salary',[PayrollController::class, 'edit']);
Route::any('update/salary',[PayrollController::class, 'update']);
Route::get('make/payslip/{id}',[PayrollController::class, 'make_payslip'])->name('make.payslip');
Route::any('/payslip/history',[PayrollController::class, 'payroll_history'])->name('payslip.history');

Route::get('emp/allowance',[PayrollController::class, 'allowance'])->name('emp.allowance');
Route::get('emp/incentive',[PayrollController::class, 'incentive'])->name('emp.incentive');
Route::get('emp/bonous',[PayrollController::class, 'bonous'])->name('emp.bonous');