<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenewalController extends Controller
{
    public $table = "emp_renewal";
    public $prefix = "renewal_";
    
     public function index()
    {
        $company = DB::table('xin_companies')->get();
        $employee = DB::table('xin_employees')->get();
        $result = DB::table($this->table)->get();
       
        return view('Admin.Employee.emp-details.wsq-certificate')
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
        $filename = $this->prefix.time().'.'.$path->getClientOriginalExtension();
         
        $path->storeAs($this->prefix,$filename);
        
        $data = [ 
            'employee_id'=>$empid,
            'attachment'=>$filename, 
        ];

        $result = DB::table($this->table)->insert($data);
 
        if($result){
            return back()->with([
                'message'=>'Attachment Updated',
            ]);
        }

    }
    public function delete(Request $request )
    {
        $id = $request->input('id');
         
        $result = DB::table($this->table)
        ->where('id','=',$id)
        ->delete();
       
        if($result){
            return response()->json([
                "message"=>"Record Row",
            ]);
        }
        
    }
}
