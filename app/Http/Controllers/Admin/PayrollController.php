<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PayrollController extends Controller
{
     
    public function basic_salary()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        
        $allowance= DB::table('allowance')->get();
        
        $data = DB::table('emp_basic_salary')
            ->join('xin_employees','xin_employees.Emp_ID','emp_basic_salary.employee_id')
            ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
            ->distinct()
            ->get();  
        
        return view('Admin.Payroll.employee-salary')->with([
            'employee'=>$employee,
            'data'=>$data,
            'company'=>$company,
            'allowance'=>$allowance,
        ]);

    }
    public function allowance()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        $allowance = DB::table('allowance')->get();
        
        $result = DB::table('emp_basic_salary')
        ->join('xin_employees','xin_employees.employee_id','emp_basic_salary.employee_id')
        ->join('xin_companies','xin_companies.company_id','emp_basic_salary.company_id')
        ->get();

        return view('Admin.Payroll.allowance')->with([
            'employee'=>$employee,
            'company'=>$company,
            'allowance'=>$allowance,
             
        ]);

    }
    public function add_allowance(Request $request){
        
        $data = [
            'allowance_name'=>$request->input('allowance-type'),
            'amount'=>$request->input('cost'),
        ];
        $result = DB::table('allowance')->insert($data);
        if($result){
            return response()->json([
                'message'=>'Allowance Added',
            ]);
        }
    }

    public function payroll_history()
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        
        $allowance= DB::table('allowance')->get();
        
        $data = DB::table('emp_basic_salary')
            ->join('xin_employees','xin_employees.Emp_ID','emp_basic_salary.employee_id')
            ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
            ->distinct()
            ->get();  
        
         
        return view('Admin.Payroll.payslip-history')->with([
            'employee'=>$employee,
            'data'=>$data,
            'company'=>$company,
            'allowance'=>$allowance,
        ]);
    } 
    public function incentive()
    {
         echo "incentives";
    } 
    public function bonous()
    {
         echo "bonous";
    } 
    public function add_salary_form(Request $request)
    {
        $employee = DB::table('xin_employees')->get();
        $company = DB::table('xin_companies')->get();
        $allowance= DB::table('allowance')->get();
        $data = DB::table('emp_basic_salary')
            ->join('xin_employees','xin_employees.employee_id','emp_basic_salary.employee_id')
            ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
            ->distinct()
            ->get();  
        
        return view('Admin.Payroll.add-salary')->with([
            'employee'=>$employee,
            'data'=>$data,
            'company'=>$company,
            'allowance'=>$allowance,
        ]);
    }
    public function store(Request $request)
    { 
         
        $bp = $request->input('basic-pay');
        $employee = $request->input('employee-id');
        $company = $request->input('company-id');
        $allowances =  $request->input('allowances');
        
        $ha = $allowances[0];
        $ta = $allowances[0];
        $pa = $allowances[0];

        $i = $request->input('incentive');
        $b = $request->input('bonous');

        $data = [
            'company_id'=>$company,
            'employee_id'=>$employee,
            'salary'=>$ha+$ta+$pa+$i+$b+$bp,
            'housing_allowance'=>$ha,
            'transport_allowance'=>$ta,
            'performance_allowance'=>$pa,
            'incentives'=>$i,
            'bonous'=>$b, 
        ];
        
        $deduction = [
            'employee_id'=>$employee,
            'tds'=>$request->input('tds'),
            'esi'=>$request->input('esi'),
            'pf'=>$request->input('pf'),
            'leave'=>$request->input('leave'),
            'fund'=>$request->input('fund'),
            'others'=>$request->input('others'),
        ];
        
        DB::table('emp_deduction')->insert($deduction);
        $result = DB::table('emp_basic_salary')->insert($data);

        if($result){
            return response()->json([
                'message'=>'Salary Added',
            ]);
        }        
      
    }

    public function view(Request $request)
    {
        $id = $request->input('id'); 
        
        $result = DB::table('emp_basic_salary')
        ->join('xin_employees','xin_employees.employee_id','emp_basic_salary.employee_id') 
                ->join('xin_companies','xin_companies.company_id','emp_basic_salary.company_id') 
        ->where('salary_id','=',$id)
        ->get(); 
        
        echo json_encode($result);

    }
    public function edit(Request $request)
    {
        $id = $request->input('id'); 
        
        $result = DB::table('emp_basic_salary')
        ->join('xin_employees','xin_employees.employee_id','emp_basic_salary.employee_id') 
                ->join('xin_companies','xin_companies.company_id','emp_basic_salary.company_id') 
        ->where('salary_id','=',$id)
        ->get(); 
        print_r($result);
        
    }
    public function update(Request $request)
    {
        $id =  $request->input('id');
        
        $employee = $request->input('employee-id');
        $company = $request->input('company-id');
        $ha = $request->input('housing-allowance');
        $ta = $request->input('transport-allowance');
        $pa = $request->input('performance-allowance');

        $i = $request->input('incentive');
        $b = $request->input('bonous');

        $data = [
            'employee_id'=>$employee,
            'salary'=>$ha+$ta+$pa+$i+$b,
            'housing_allowance'=>$ha,
            'transport_allowance'=>$ta,
            'performance_allowance'=>$pa,
            'incentives'=>$i,
            'bonous'=>$b, 
        ];

        $result = DB::table('emp_basic_salary')
        ->where('id','=',$id)
        ->update($data);

        if($result){
            return response()->json([
                'message'=>'Salary Updated',
            ]);
        }   


    }
    public function destroy(Request $request)
    {
        $id = $request->input('id'); 
       
        
        $result = DB::table('emp_basic_salary')
                ->where('salary_id','=',$id)->delete(); 
        
        if($result){
             return true;
        }
    }
    
    public function make_payslip($id)
    {
        $data = DB::table('emp_basic_salary')
            ->join('xin_employees','xin_employees.Emp_ID','emp_basic_salary.employee_id')
            ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
            ->distinct()
            ->get();  
        return view('Admin.Payroll.make-payslip')->with([
            'data'=>$data,
        ]);
    }
   
}
