<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class HomeController extends Controller
{
   public function index()
   {
                $emp = DB::table('xin_employees')->count();
        
        return view('Admin.dashboard')->with([
           'employee'=>$emp, 
        ]);
   }
   
   
   public function dashboard()
   {
   $emp = DB::table('xin_employees')->count();
       
        return view('Admin.dashboard')->with([
           'employee'=>$emp, 
            
        ]);
       
   }
}
