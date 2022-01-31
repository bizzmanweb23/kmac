<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_data = $request->validate([
			'user_image'        => ['required'],
            'user_name'         => ['required', 'string'],
            'email_address'     => ['required', 'email', 'max:255', 'unique:user'],
            'contact_number'    => ['required', 'numeric'],
            'password'          => ['required', 'string', 'max:255','min:6'],
            'confirm_password'  => ['required_with:password|same:password|min:6'],
            'address'           => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'bio_info'          => ['required', 'string', 'max:255'],
        ], [
		    'user_image.required'         => 'Please Upload User Image',
            'user_name.required'          => 'Please Enter UserName',
            'email_address.required'      => 'Please Enter Email Address',
            'contact_number.required'     => 'Please Enter Contact Number',
            'password.required'           => 'Please Enter Password',
            'confirm_password.required'   => 'Please Enter Confirm Password',
            'address.required'            => 'Please Enter User Address',
            'city.required'               => 'Please Enter City Name',
            'country.required'            => 'Please Enter Country',
            'bio_info.required'           => 'Please Enter Your Bio',
        ]);
		   $unique_id = User::orderBy('id', 'desc')->first();
           $number = str_replace('KMACU', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'KMACU0000001';
           } else {
            $number = "KMACU" . sprintf("%07d", (int)$number + 1);
           }
		   $user_data['unique_id']=$number;
		   $user_data['status'] = 1;
		   $userImage = Helper::unqNum(). $request->file('user_image')->getClientOriginalName();
		   $request->file('user_image')->move(public_path('asset/userImage'),$userImage);
		   $user_data['user_image'] = $userImage;
		   $data=User::insert($user_data);
		   echo json_encode(['status' => 'success', 'message' => 'User Information Stored Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	public function edit_user_details()
	{
	   return view('admin.user.edit');	
	}
	
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}