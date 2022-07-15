<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CertificateController extends Controller
{
    public $table = "emp_certificate_attained";
    
    public function index()
    {
        $company = DB::table('xin_companies')->get();
        $employee = DB::table('xin_employees')->get();
        
        $result = DB::table('xin_employees') 
        ->join('emp_edu_certificate','emp_edu_certificate.employee_id','xin_employees.Emp_ID') 
        ->join('emp_licence','emp_licence.employee_id','xin_employees.Emp_ID') 
        ->join('emp_vaccination','emp_vaccination.employee_id','xin_employees.Emp_ID') 
        ->join('emp_wsq_certificates','emp_wsq_certificates.employee_id','xin_employees.Emp_ID')
        ->get(); 
       
       
        
        return view('Admin.Employee.emp-details.certificate-attained')
            ->with([
                'data'=>$result,
                'employees'=>$employee,
                'company'=>$company,
            ]);
    }

   
    public function store(Request $request)
    {           
        $empid = $request->post('employee'); 
        $path = $request->file('attachment');
        $filename = 'Licence_'.time().'.'.$path->getClientOriginalExtension();
         
        $path->storeAs('certificate',$filename);
        
        $data = [ 
            'employee_id'=>$empid,
            'attachment'=>$filename, 
        ];

        $result = DB::table('emp_certificate_attained')->insert($data);
 
        if($result){
            return back()->with([
                'message'=>'Attachment Updated',
            ]);
        }

    }
    public function delete(Request $request )
    {
        $id = $request->input('id');
         
        $result = DB::table('emp_certificate_attained')
        ->where('id','=',$id)
        ->delete();
       
        if($result){
            return response()->json([
                "message"=>"Record Row",
            ]);
        }
        
    }
}
