<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	
    use HasFactory;
	protected $table='users';
    protected $fillable = [
	    'unique_id',
		'user_image',
		'user_name',
        'email_address',
        'contact_number',
        'password',
		'address',
		'city',
		'country',
		'bio_info'
    ];
}