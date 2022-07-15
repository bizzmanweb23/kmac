<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeDetailsController extends Controller
{ 
    public function index(Request $request)
    {   
        $OPT = $request->input('optval');
        $result = DB::table('xin_employees')
        ->join('xin_companies','xin_companies.company_id','xin_employees.company_id')
        ->where('Emp_ID',$OPT)
        ->get();
        print_r($result);
        exit();
    }

}
