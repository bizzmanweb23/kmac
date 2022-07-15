<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonusController extends Controller
{
    
    public function index()
    {
        $company = DB::table('xin_companies')->get();
        $employee = DB::table('xin_employees')->get();
        $result = DB::table('emp_joining_bonus')->get();
       
        return view('Admin.Employee.emp-details.joining')
            ->with([
                'licence'=>$result,
                'employees'=>$employee,
                'company'=>$company,
            ]);
    }

   
     public function store(Request $request)
    {           
        $empid = $request->post('employee'); 
        $path = $request->file('attachment');
        $filename = 'Licence_'.time().'.'.$path->getClientOriginalExtension();
         
        $path->storeAs('bonus',$filename);
        
        $data = [ 
            'employee_id'=>$empid,
            'attachment'=>$filename, 
        ];

        $result = DB::table('emp_joining_bonus')->insert($data);
 
        if($result){
            return back()->with([
                'message'=>'Attachment Updated',
            ]);
        }

    }
    public function delete(Request $request )
    {
        $id = $request->input('id');
         
        $result = DB::table('emp_joining_bonus')
        ->where('id','=',$id)
        ->delete();
       
        if($result){
            return response()->json([
                "message"=>"Record Row",
            ]);
        }
        
    }
}
