<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

 
 



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 
	 
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

    public function user()
	{
	    return $this->belongsTo(User::class, 'id', 'id');
	}
}