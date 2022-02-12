<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	
    use HasFactory;
	protected $table='employee';
    protected $fillable = [
	    'unique_id',
		'employee_image',
		'member_name',
        'jobPosition',
        'mobile_number',
        'department',
		'manager',
		'email_address',
		'password',
		'address',
		'country',
		'emaiAddress',
		'Identification_number',
		'contact_number',
		'passport_number',
		'bank_account',
		'gender',
		'work_distance',
		'date_of_birth',
		'place_of_birth',
		'country_of_birth',
		'marital_status',
		'id_name',
		'id_number',
		'id_files',
		'certification_level',
		'field_of_study',
		'school',
    ];
}