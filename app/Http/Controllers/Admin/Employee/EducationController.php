<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EducationController extends Controller
{
 public $table = 'emp_edu_certificate';
 public $prefix = 'education_';
    public function index()
    {
        $company = DB::table('xin_companies')->get();
        $employee = DB::table('xin_employees')->get();
        $result = DB::table($this->table)->get();
       
        return view('Admin.Employee.emp-details.lavel-of-education')
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
         
        $path->storeAs('education' ,$filename,'public');
        
        $unique_id = DB::table($this->table)->orderBy('id', 'desc')->first();
        $number = str_replace('EDU', '', $unique_id ? $unique_id->id  : 0);
        if ($number == 0) {
            $number = 'EDU-0001';
        } else {
            $number = "EDU-" . sprintf("%05d", $number + 1);
        }
        
        $data = [ 
            'employee_id'=>$empid,
            'cft_number'=>$number,
            'edu_certificate'=>$filename, 
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
