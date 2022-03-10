<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
	
    use HasFactory;
	protected $table='inventory_details';
    protected $fillable = [
	    'unique_id',
		'item_name',
		'item_code',
        'quantity_in',
        'cost_per_pcs',
        'total_cost',
		'quantity_out',
		'on_hand_quantity',
		'actual_quantity',
		'adjustment'
    ];
}