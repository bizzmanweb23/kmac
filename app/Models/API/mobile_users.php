<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobile_users extends Model 
{
    use HasFactory;
    protected $table='mobile_users';

     protected $fillable = [
        'name',
        'email',
        'password',
        
    ];
}
