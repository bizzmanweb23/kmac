<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Helper;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['result']=Inventory::select('*')->get();
        return view('admin.inventory.index',$data);
    }
	
	public function store(Request $request)
	{
		$inventory_data = $request->validate([
			'item_name'        => ['required','string','max:255'],
            'item_code'        => ['required', 'string','max:255'],
            'quantity_in'      => ['required','numeric'],
            'cost_per_pcs'     => ['required', 'numeric'],
            'total_cost'       => ['required', 'numeric'],
            'quantity_out'     => ['required','numeric'],
            'on_hand_quantity' => ['required', 'numeric', 'max:255'],
            'actual_quantity'  => ['required', 'numeric', 'max:255'],
            'adjustment'       => ['required', 'string', 'max:255'],
        ], [
		    'item_name.required'         => 'Please Enter Item Name',
            'item_code.required'         => 'Please Enter Item Code',
            'quantity_in.required'       => 'Please Enter Quantity IN',
            'cost_per_pcs.required'      => 'Please Enter Cost Per Piece',
            'total_cost.required'        => 'Please Enter Total Cost',
            'quantity_out.required'      => 'Please Enter Quantity Out',
            'on_hand_quantity.required'  => 'Please Enter On Hand Quantity',
            'actual_quantity.required'   => 'Please Enter Actual Quantity',
            'adjustment.required'        => 'Please Enter Adjustment',
        ]);
		   $unique_id = Inventory::orderBy('id', 'desc')->first();
           $number = str_replace('KMACI', '', $unique_id ? $unique_id->unique_id  : 0);
           if ($number == 0) {
           $number = 'KMACI0000001';
           } else {
            $number = "KMACI" . sprintf("%07d", (int)$number + 1);
           }
		   $inventory_data['unique_id']=$number;
		   $inventory_data['status'] = 1;
		   //echo '<pre>'; print_r($inventory_data);die;
		   $data=Inventory::insert($inventory_data);
		   echo json_encode(['status' => 'success', 'message' => 'User Information Stored Successfully']);
	}
	
	
}