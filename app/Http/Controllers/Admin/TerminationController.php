<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TerminationController extends Controller
{
    public function index()
    {
        $company = DB::table('xin_companies')->get();
        $admin = DB::table('xin_employees')->where('user_role_id','=',1)->get();
        $employees = DB::table('xin_employees')->where('user_role_id','=',2)->get();
        $termination_type = DB::table('xin_termination_type')->get();

        $data = DB::table('xin_employee_terminations')
        ->join('xin_companies','xin_companies.company_id','xin_employee_terminations.company_id') 
        ->join('xin_termination_type','xin_termination_type.termination_type_id','xin_employee_terminations.termination_type_id')
        ->get();
         
        return view('Admin.CoreHr.termination')->with([
            'company'=>$company,
            'employees'=>$employees,
            'terminationType'=>$termination_type,
            'data'=>$data,
            'admin'=>$admin,
        ]);
    }
    
    public function show_add_form()
    {
        
        $company = DB::table('xin_companies')->get();
        $admin = DB::table('xin_employees')->where('user_role_id','=',1)->get();
        $employees = DB::table('xin_employees')->where('user_role_id','=',2)->get();
        $termination_type = DB::table('xin_termination_type')->get();

        $data = DB::table('xin_employee_terminations')
        ->join('xin_companies','xin_companies.company_id','xin_employee_terminations.company_id') 
        ->join('xin_termination_type','xin_termination_type.termination_type_id','xin_employee_terminations.termination_type_id')
        ->get();
         
        return view('Admin.CoreHr.termination-add')->with([
            'company'=>$company,
            'employees'=>$employees,
            'terminationType'=>$termination_type,
            'data'=>$data,
            'admin'=>$admin,
        ]);
    }
    public function store(Request $request)
    {
       
        $path = $request->file('attachment');
        $filename = 'termination_'.time().'.'.$path->getClientOriginalExtension();

        $path->storeAs('termination',$filename,'public');

        $company = $request->input('company');
        $emp_terminated = $request->input('employee-terminated'); 
        $notice_date = $request->input('notice-date'); 
        $termination_date = $request->input('termination-date');
        $terminated_by = $request->input('terminated-by');
        $termination_type = $request->input('termination-type-id');
        $description = $request->input('description');

        $data = [
            'attachment'=> $filename,
            'employee_terminated'=>$emp_terminated,
            'company_id'=>$company,
            'notice_date'=>$notice_date,
            'termination_date'=>$termination_date,
            'terminated_by'=>$terminated_by,
            'termination_type_id'=>$termination_type,
            'description'=>$description,
        ];

       
        $result = DB::table('xin_employee_terminations')
         ->insert($data);

        if($result){
            return redirect("termination")->with([
                'message'=>'Termination Added',
            ]);
        }
    }

    
    public function show(Request $request)
    {
        $id = $request->input('id');
        
        $result = DB::table('xin_employee_terminations') 
        ->join('xin_companies','xin_companies.company_id','xin_employee_terminations.company_id')
        ->join('xin_termination_type','xin_termination_type.termination_type_id','xin_employee_terminations.termination_type_id')
        ->where('termination_id','=',$id)
        ->get();
           
        echo json_encode($result); 
       
    }
 
    public function edit($id)
    {
        //
    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy(Request $request)
    {
       $id =  $request->post('id');
       $result = DB::table('xin_employee_terminations')
               ->where('termination_id','=',$id)
               ->delete();
       if($result){
           return response()->json([
               'message'=> 'Deleted',
           ]);
       }
       
    } 
}
