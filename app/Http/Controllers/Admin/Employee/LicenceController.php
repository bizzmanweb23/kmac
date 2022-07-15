<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class LicenceController extends Controller
{
    public $prefix = "licence"; 
    public function index()
    {
       $company = DB::table('xin_companies')->get();
        $employee = DB::table('xin_employees')->get();
        $result = DB::table('emp_licence')->get();
       
        return view('Admin.Employee.emp-details.licence')
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
        $filename = $this->prefix.'_'.time().'.'.$path->getClientOriginalExtension();
        $path->storeAs('licence',$filename,'public');
        
            
        $unique_id = DB::table('emp_licence')->orderBy('id', 'desc')->first();
        $number = str_replace('LNC', '', $unique_id ? $unique_id->id  : 0);
        if ($number == 0) {
            $number = 'LNC0001';
        } else {
            $number = "LNC-" . sprintf("%05d", $number + 1);
        }
        
        $data = [ 
            'employee_id'=>$empid,
            'licence_no'=>$number,
            'emp_licence'=>$filename, 
        ];

        $result = DB::table('emp_licence')->insert($data);
         DB::table('emp_certificate_attained')->insert([
            'licence'=>$number,
        ]);  
        if($result){
            return back()->with([
                'message'=>'Attachment Updated',
            ]);
        }

    }
    public function delete(Request $request )
    {
        $id = $request->input('id');
         
        $result = DB::table('emp_licence')
        ->where('id','=',$id)
        ->delete();
        
        
        if($result){
            return response()->json([
                "message"=>"Record Row",
            ]);
        }
        
    }
    
    public function view_licence(Request $request)
    {
        $id = $request->input('id');
        
        $result = DB::table('emp_licence')
                ->join('xin_employees','xin_employees.Emp_ID', 'emp_licence.employee_id')
                ->where('id','=',$id)
                ->get();
        echo json_encode($result);
    }     
}
