<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LeaveController extends Controller
{
     
    public function index()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        $leavetype = DB::table('xin_leave_type')->get();

        $data = DB::table('xin_leave_applications')
        ->join('xin_leave_type','xin_leave_type.leave_type_id', 'xin_leave_applications.leave_type_id')
        ->join('xin_employees','xin_employees.Emp_ID', 'xin_leave_applications.employee_id')
        ->join('xin_companies','xin_companies.company_id','xin_leave_applications.company_id')
        ->join('leave_status','leave_status.status_id','xin_leave_applications.status_id')
        ->get();
       
        
        return view('Admin.Timesheet.leave')->with([
            'fields'=>$data,
            'employee'=>$employee,
            'company'=>$company,
            'leavetype'=>$leavetype,
        ]);
      
    }

    public function leave_status()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        $leavetype = DB::table('xin_leave_type')->get();

        $data = DB::table('xin_leave_applications')
        ->join('xin_leave_type','xin_leave_type.leave_type_id', 'xin_leave_applications.leave_type_id')
        ->join('xin_employees','xin_employees.Emp_id', 'xin_leave_applications.employee_id')
        ->join('xin_companies','xin_companies.company_id','xin_leave_applications.company_id')
        ->join('leave_status','leave_status.status_id','xin_leave_applications.status_id')
        ->get();
       
        
        return view('Admin.Timesheet.leave-status')->with([
            'fields'=>$data,
            'employee'=>$employee,
            'company'=>$company,
            'leavetype'=>$leavetype,
        ]);
      
    }
 
    public function add_leave(Request $request)
    {
         
        $path = $request->file('certificate');
        $cft = 'Leave_'.time().'.'.$request->file('certificate')->getClientOriginalExtension(); 
         
        $path->storeAs('leave_attachment',$cft,'public');
        
        $fromday = explode('-',$request->input('from-date'));
        $today= explode('-',$request->input('to-date')); 

        $month = $today[1] - $fromday[1]; 
        $days = $today[2] - $fromday[2]; 

         

        if($month == 0){
            $duration = $days. " Days";
        } else {
            $duration =  $month." Month and ".$days." Days";
        }
       
        $data = [
            'leave_attachment'=>$cft,
            'company_id'=>$request->input('company-id'),
            'employee_id'=>$request->input('employee-id'), 
            'leave_type_id'=>$request->input('leave-type'),
            'from_date'=>$request->input('from-date'),
            'to_date'=>$request->input('to-date'),
            'is_half_day'=>$request->input('half-day'), 
            'reason'=>$request->input('description'),
            'period'=>$duration,
             
        ];
        
        $result = DB::table('xin_leave_applications')->insert($data);
        if($result){
             return true;
        }
    }
 
    public function add_leave_form()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        $leavetype = DB::table('xin_leave_type')->get();

        $data = DB::table('xin_leave_applications')
        ->join('xin_leave_type','xin_leave_type.leave_type_id', 'xin_leave_applications.leave_type_id')
        ->join('xin_employees','xin_employees.employee_id', 'xin_leave_applications.employee_id')
        ->join('xin_companies','xin_companies.company_id','xin_leave_applications.company_id')
        ->join('leave_status','leave_status.status_id','xin_leave_applications.status_id')
        ->get();
        
        
        return view('Admin.Timesheet.add-leave-form')->with([
            'fields'=>$data,
            'employee'=>$employee,
            'company'=>$company,
            'leavetype'=>$leavetype,
        ]);
         
    }
    public function change_leave_status(Request $request)
    {   
          
          $id =  $request->post('id');
          $code =  $request->post('code');
           

         $result = DB::table('xin_leave_applications')->where('leave_id','=',$id)->update([
            'status_id'=> $code,
         ]);

         if($result){
             return response()->json([
                'message'=>'updated',
            ]);
         } else {
             return response()->json([
            'message'=>'failed',
            ]);
         } 
         
    }
    public function delete_leave(Request $request )
    {
        $id = $request->input('id');
        $result = DB::table('xin_leave_applications')
        ->where('leave_id', $id)->delete();

        if($result){
        return response()->json([
            'message'=>'Data Deleted',
        ]);
        }
        
    }
    public function view_leave(Request $request)
    {
        $id = $request->input('id');
        // print "<pre>";
        // print_r($request->input( 'id'));
        // exit();

        $result = DB::table('xin_leave_applications') 
        ->join('xin_leave_type','xin_leave_type.leave_type_id', 'xin_leave_applications.leave_type_id')
        ->join('xin_employees','xin_employees.Emp_id', 'xin_leave_applications.employee_id')
        ->join('xin_companies','xin_companies.company_id','xin_leave_applications.company_id')
        ->join('leave_status','leave_status.status_id','xin_leave_applications.status_id')
        ->where('leave_id','=',$id)
        ->get();
        
       
             echo json_encode($result);
         

    }

    public function edit(Request $request)
    {

    }
     
}
