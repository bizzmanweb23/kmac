<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use Helper;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=Employee::select('*')->get();
        return view('admin.employee.index',$data);
    }
	
	public function store(Request $request)
	{
		$employee_data = $request->validate([
			'employee_image'        => ['required'],
            'member_name'           => ['required', 'string','max:255'],
            'jobPosition'           => ['required', 'string', 'max:255'],
            'mobile_number'         => ['required', 'numeric'],
            'department'            => ['required', 'string', 'max:255'],
            'manager'               => ['required','string', 'max:255'],
            'email_address'         => ['required', 'email', 'max:255','unique:employee'],
            'password'              => ['required', 'string', 'min:6'],
            'address'               => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string', 'max:255'],
            'emaiAddress'           => ['required', 'email', 'max:255','unique:employee'],
            'Identification_number' => ['required', 'string', 'max:255'],
            'contact_number'        => ['required', 'numeric'],
            'passport_number'       => ['required', 'string','max:255'],
            'bank_account'          => ['required', 'string','max:255'],
            'gender'                => ['required', 'string','max:255'],
            'work_distance'         => ['required', 'string','max:255'],
            'date_of_birth'         => ['required', 'string','max:255'],
            'place_of_birth'        => ['required', 'string','max:255'],
            'country_of_birth'      => ['required', 'string','max:255'],
            'marital_status'        => ['required', 'string','max:255'],
            'id_name'               => ['required', 'string','max:255'],
            'id_number'             => ['required', 'string','max:12'],
            'id_file'              => ['required'],
            'certification_level'   => ['required', 'string','max:255'],
            'field_of_study'        => ['required', 'string','max:255'],
            'school'                => ['required', 'string','max:255'],
        ], [
		    'employee_image.required'         => 'Please Upload User Image',
            'member_name.required'            => 'Please Enter Employee Name',
            'jobPosition.required'            => 'Please Select Job Position',
            'mobile_number.required'          => 'Please Enter Contact Number',
            'department.required'             => 'Please Select department',
            'manager.required'                => 'Please Select Manager',
            'email_address.required'          => 'Please Enter Email Address',
            'password.required'               => 'Please Enter Password',
            'address.required'                => 'Please Enter Address',
            'country.required'                => 'Please Enter Country',
            'emaiAddress.required'            => 'Please Enter Email Address',
            'Identification_number.required'  => 'Please Enter Indentification Number',
            'contact_number.required'         => 'Please Enter Contact Number',
            'passport_number.required'        => 'Please Enter Passport Number',
            'bank_account.required'           => 'Please Enter Bank Account',
            'gender.required'                 => 'Please Select Gender',
            'work_distance.required'          => 'Please Enter work Distance',
            'date_of_birth.required'          => 'Please select Date Of Birth',
            'place_of_birth.required'         => 'Please Enter Place Of Birth',
            'country_of_birth.required'       => 'Please Enter Place Of Birth',
            'marital_status.required'         => 'Please Select Marital Status',
            'id_name.required'                => 'Please Enter ID Name',
            'id_number.required'              => 'Please Enter ID Number',
            'id_file.required'               => 'Please Upload ID File',
            'certification_level.required'    => 'Please Select Certification Level',
            'field_of_study.required'         => 'Please Enter Field Of Study',
            'school.required'                 => 'Please Enter School Name',
        ]);
		   $unique_id = Employee::orderBy('id', 'desc')->first();
           $number = str_replace('KMACE', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'KMACE0000001';
           } else {
            $number = "KMACE" . sprintf("%07d", (int)$number + 1);
           }
		   $employee_data['unique_id']=$number;
		   $employee_data['status'] = 1;
		   $employeeImage = Helper::unqNum(). $request->file('employee_image')->getClientOriginalName();
		   $request->file('employee_image')->move(public_path('admin/asset/employeeImg'),$employeeImage);
		   $employeeID = Helper::unqNum(). $request->file('id_file')->getClientOriginalName();
		   $request->file('id_file')->move(public_path('admin/asset/employeeID'),$employeeID);
		   $employee_data['employee_image'] = $employeeImage;
		   $employee_data['id_file'] = $employeeID;
		   $employee_data['password']=md5($_POST['password']);
		   //echo '<pre>'; print_r($user_data);die;
		   $data=Employee::insert($employee_data);
		   echo json_encode(['status' => 'success', 'message' => 'Employee Information Stored Successfully']);
	}
}