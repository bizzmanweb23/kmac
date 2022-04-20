<?php

namespace App\Http\Controllers\API;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use  App\Http\Controllers\RegisterController;
use DB;

class EmpController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    
   
    public function inventory()
    {
        $result = DB::table('items')->get();

        return response()->json([
            "SuccessCode" => 200 ,
            "Message"=>"Checkd in!",
            "data"=>$result,
        ]);

        if($validator->fails()) { 
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        }
       
    }

    public function tasks()
    { 
        $result = DB::table('tasks')->get();  
        return response()->json([
            'SuccessCode'=> 200,
            'Massage'=> 'All tasks',
            'data'=>$result,
        ]); 
     
       
    }

    public function my_tasks()
    {
         
        $id = session()->get('id');
          
        $result = DB::table('tasks')->where('emp_id','=',$id)->get(); 

        return response()->json([
            'SuccessCode'=> 200,
            'Massage'=> 'My Tasks tasks',
            'data'=>$result,
        ]); 
     
       
    }


    public function assets()
    {
        $id = session()->get('id');
          
        $result = DB::table('assets')->where('emp_id','=',$id)->get(); 

        return response()->json([
            'SuccessCode'=> 200,
            'Massage'=> 'Assets',
            'data'=>$result,
        ]); 
        
    }

   public function completed_jobs()
   {
    $id = session()->get('id');
    $result = DB::table('tasks')->where('emp_id','=',$id)->get();
    
    return response()->json([
        'SuccessCode'=> 200,
        'Massage'=> 'Completed jobs',
        'data'=>$result,
    ]);

   }
 
    public function store(Request $request)
    {
        $id = session()->get('id');
        $clockin = date('m/d/Y h:i:s a', time());
        $clockout = date('m/d/Y h:i:s a', time());
        $data = [
            'emp_id'=> $id,
            'clockin'=>$clockin,
            'clockout'=>$clockout, 
            'status'=>$request->post('status'),
            'date'=>date('m/d/Y'),
           
        ];

        $result =  DB::table('attendance')->insert($data);
        
        if($result){
             return response()->json(["SuccessCode" => 200 ,"Message"=>"Checkd in!"], $this->successStatus);
        } else {
             return response()->json(["SuccessCode" => 200 ,"Message"=>"Error!"], $this->successStatus); 
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     
    public function get_profile()
    {
        $id = session()->get('id');
        $result = DB::table('users')->where('id','=',$id)->get();
    
        return response()->json([
            'SuccessCode'=> 200,
            'Massage'=> 'All tasks',
            'data'=>$result,
        ]);

    }

    
    public function mc_submittion(Request $request)
    { 
        $pdf = $request->post('upload_pdf');
        $photo = $request->post('upload_photos');

        $result = DB::table('mc_submittion')->insert([
            'pdf'=>$pdf,
            'photo'=>$photo,
        ]);

        if($result){
             return response()->json(["SuccessCode" => 200 ,"Message"=>"Submitted!"], $this-> successStatus); 
        } else {
             return response()->json(["SuccessCode" => 400 ,"Message"=>"Error!"], $this-> successStatus); 
        }
         
        
    }

    
    public function destroy($id)
    {
        //
    }
}
