<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    
    public function index()
    {
        $company = DB::table('xin_companies')->get();

        $result = DB::table('xin_employees') 
        ->join('hrms_roles','hrms_roles.role_id','xin_employees.user_role_id')
        ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
        ->get();  
      
        $company = DB::table('xin_companies')
                ->distinct()->get();

        $role = DB::table('hrms_roles') 
        ->get();

        if($result && $role){
            return view('Admin.Employee.employee-list')->with([
               'data'=>$result,
               'company'=>$company,
               'roles'=>$role,
            ]); 
        } else {
        echo "no data in the table";
        }  
    }
     
    public function employee_add_form()
    {
        $company = DB::table('xin_companies')->get();

        $result = DB::table('xin_employees') 
        ->join('hrms_roles','hrms_roles.role_id','xin_employees.user_role_id')
        ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
        ->get();  
      
        $company = DB::table('xin_companies')
                ->distinct()->get();

        $role = DB::table('hrms_roles') 
        ->get();

        if($result && $role){
            return view('Admin.Employee.employee-add')->with([
               'data'=>$result,
               'company'=>$company,
               'roles'=>$role,
            ]); 
        } else {
        echo "no data in the table";
        }
    }
 
    public function store(Request $request)
    {
        $unique_id = DB::table('xin_employees')->orderBy('employee_id', 'desc')->first();
        $number = str_replace('EMP', '', $unique_id ? $unique_id->employee_id  : 0);
        if ($number == 0) {
            $number = 'EMP-00001';
        } else {
            $number = "EMP-" . sprintf("%05d", $number + 1);
        }

        $data = [
            
            'company_id'=>$request->input('company-id'),
            'Emp_ID'=>$number,
            'first_name'=>$request->input('first-name'),
            'last_name'=>$request->input('last-name'),
            'email'=>$request->input('email'),
            'username'=>$request->input('first-name').' '.$request->input('last-name'),
            'date_of_birth'=>$request->input('date-of-birth'),
            'date_of_joining'=>$request->input('date-of-joining'),
            'gender'=>$request->input('gender'),
            'emp_contact'=>$request->input('contact-number'),
            'user_role_id'=>$request->input('role'),
            'address'=>$request->input('address'),
        ];
        
        
        $result = DB::table('xin_employees')->insert($data);
        
        if($result){
            return response()->json([
                'message'=>'Employee Added',

            ]);
        } 
    }
    
    public function view(Request $request)
    { 
        $id =  $request->post('id');
        $result = DB::table('xin_employees') 
        ->join('xin_companies','xin_companies.company_id','xin_employees.company_id') 
        ->join('hrms_roles','hrms_roles.role_id','xin_employees.user_role_id')
        ->where('employee_id','=',$id)
        ->get(); 
       echo json_encode($result);

    } 
    
    public function destroy(Request $request)
    {
         
        $id =  $request->post('id');
        $result = DB::table('xin_employees')
        ->where('employee_id','=',$id)
        ->delete();

        if($result ){
            return response()->json([
                'response'=> $result,
            ]);
        }  
    }
    
    public function edit(Request $request)
    { 
        $id = $request->input('id');
         
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
         $roles= DB::table('hrms_roles')->get();
         
        $result = DB::table('xin_employees') 
        ->join('xin_companies','xin_companies.company_id','xin_employees.company_id') 
        ->join('hrms_roles','hrms_roles.role_id','xin_employees.user_role_id')
        ->where('employee_id',$id)
        ->get(); 
          
        echo json_encode($result);
       
    }
    
    public function update(Request $request)
    {
        
        $userid = $request->post('userid'); 
 //        $unique_id = DB::table('xin_employees')->orderBy('employee_id', 'desc')->first();
//        $number = str_replace('EMP', '', $unique_id ? $unique_id->id  : 0);
//        if ($number == 0) {
//            $number = 'EMP0000001';
//        } else {
//            $number = "EMP" . sprintf("%07d", $number + 1);
//        }
        
        $data = [  
             
            'first_name'=>$request->input('first-name'),
            'last_name'=>$request->input('last-name'),
            'username'=>$request->input('first-name').' '.$request->input('last-name'), 
            'date_of_joining'=>$request->input('date-of-joining'),
            'emp_contact'=>$request->input('contact-number'),
            'user_role_id'=>$request->input('role'),
            'company_id'=>$request->input('company'),
            'address'=>$request->input('address'),
            'email'=>$request->input('email'),
            'user_role_id'=>$request->input('role-id'),
        ];
        
       
        $result = DB::table('xin_employees')
        ->where('employee_id','=',$userid)
        ->update($data);
        
        if($result){
            return response()->json([
                'message'=>'Employee Updated',

            ]); 
        } 
 
    }
    
    
    
}
