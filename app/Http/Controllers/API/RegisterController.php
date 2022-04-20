<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\mobile_users;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Validator;

use Illuminate\Contracts\Auth\Authenticatable;
use Exception;
 
 
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Session;
class RegisterController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 400;
    public $token;
    public $login_id;
    public $code;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Admin::all();
        print "<pre>";
        print_r($data);
        die();

    } 
     
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'contact_number'=>['required', 'min:10'],
            'email_address' => ['required', 'string', 'max:255', 'unique:users'], 
            'password' => ['required', 'confirmed'],
        ]);


        if($validator->fails()) { 
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        }
       
        
        $input = $request->all(); 
        $input['password'] = Hash::make($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('myApp')->accessToken; 
        $token = $user->createToken('myApp')->accessToken; 
        $success['id'] =  $user->id;
           
         if($success){
            return response()->json(["SuccessCode" => 200 ,"Message"=>"Registration successfully","Data"=>$success], $this-> successStatus); 
        }
        else{
            return response()->json(["failure" => 400 ,"Message"=>"Please Enter registered email"], $this-> errorStatus); 
        }
        
    }

    public function login(Request $request ){   
        if(Auth::attempt(['email_address' => request('email_address'), 'password' => request('password')])){  

            $user = Auth::user(); 
            $success['status'] = 200;
            $success['credentials'] = $user;
            $success['token'] =  $user->createToken('MyApp')->accessToken;  
            
            $this->login_id = $request->session()->put('id', $user->id);
        } 

        if($success){
            return response()->json(["SuccessCode" => 200 ,"Message"=>"Login successfully","Data"=>$success], $this-> successStatus);  
        } 
        else{
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Your Credential Does not match"], 
                $this->errorStatus); 
        }  
    } 

    public function profile_edit(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email_address' => ['required', 'string', 'email', 'max:255', 'exists:users'], 
        ]);

        if($validator->fails()) { 
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        }


        $update = DB::table('users')->where(['email_address' => $request->input('email_address')])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        else {

            $user['email_address'] = $request->post('email_address');
            $user['user_name'] = $request->post('user_name');
            $user['contact_number'] = $request->post('phone');
            $user['gender'] = $request->post('gender');  
            $user['bio_info'] = $request->post('bio_info');  

            $result = DB::table('users')->where(['email_address' => $request->input('email_address')])->update($user);
            
                  return response()->json(["SuccessCode" =>  200 ,"Message"=>"Profile Updated Successfully", "error"=>$validator->errors()], 400); 


        }  
        
    }

    public function logout()
    {
        echo "Logout";
          //var_dump(Auth::User()->id);
    }

    public function ForgotPasswordlink(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'email_address' => ['required', 'string', 'email', 'max:255', 'exists:users'],
        ]);

        
        $token = Str::random(10);
        $this->code = rand(1111,9999);

        DB::table('password_resets')->insert([
            'email' => $request->input('email_address'),
            'token' => $token,
            'code'=> $code,
         ]);

         $success = Mail::send('admin.auth.forget-password-email', ['code' => $this->code], function($message) use($request){
            $message->to($request->input('email_address'));
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject('Reset Password');
        });

        return response()->json(["SuccessCode" => 200 ,"Message"=>"Code is sent to Email"], $this-> successStatus); 
        print "<pre>";
        print_r($request->post());

    }

    public function ResetPassword($token) {

        return response()->json(["SuccessCode" => 200 ,"Message"=>"You have been successfully Generate Token for Reset Password!","token" => $token],$this-> successStatus);

    }

    public function ResetPasswordStore(Request $request) {
          
        
          
         $reset_code =  DB::table('password_resets')->where('email', $request->post('email_address'))->get();
         
          if($request->post('code') == $reset_code[0]->code){
            $validator = Validator::make($request->all(),[
            'email_address' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'confirmed'],
            ]);
            // echo"<pre>"; print_r($request->all()); exit();
                    
            if($validator->fails()) { 
                return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
            }

            
            $update = DB::table('users')->where(['email_address' => $request->input('email_address')])->first();

            if(!$update){
                return back()->withInput()->with('error', 'Invalid token!');
            }

            $user = User::where('email_address', $request->input('email_address'))->update(['password' => Hash::make($request->input('password'))]);

            // Delete password_resets record
            $updatepass = DB::table('users')->where(['email_address'=> $request->input('email_address')]);
             
            return response()->json(["SuccessCode" => 200 ,"Message"=>"Your password has been successfully changed!"], $this-> successStatus); 
         
          }
          else {
              return response()->json(["Failure" => 400 ,"Message"=>"Wrong Code entered!"], $this-> successStatus); 
          }
        
       
        
    }

    public function tasks()
    {
         echo "tasks";  
        var_dump(session()->get('id')); 
         
    }
     public function assets(Request $request)
    {
        echo "assets";  
        var_dump(session()->get('id')); 
         
        // $result = DB::table('assets')->get();

        // return response()->json([
        //     'SuccessCode'=> 200,
        //     'Massage'=> 'All Assets',
        //     'data'=>$result,
        // ]);

        // if($validator->fails()) { 
        //     return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        // }
       
    }

     
}
