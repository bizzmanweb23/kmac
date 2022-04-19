<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminInventoryController extends Controller
{
    
    public function index()
    {
        $data['result']=Inventory::select('*')->get();
        $data['items']=DB::table('items')->get();
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

            // $fillable = [
            //     'unique_id'=>$request->post(''),
            //     'item_name'=>$request->post(''),
            //     'item_code'=>$request->post(''),
            //     'quantity_in'=>$request->post(''),
            //     'cost_per_pcs'=>$request->post(''),
            //     'total_cost'=>$request->post(''),
            //     'quantity_out'=>$request->post(''),
            //     'on_hand_quantity'=>$request->post(''),
            //     'actual_quantity'=>$request->post(''),
            //     'adjustment'=>$request->post(''),
            // ];
            $inventory_data['unique_id']=$number;
            $inventory_data['status'] = 1;

            //echo '<pre>'; print_r($inventory_data);die;
            $data=Inventory::insert($inventory_data);
            echo json_encode(['status' => 'success', 'message' => 'User Information Stored Successfully']);
    }
        
    public function inventory_master(){
        $master  = DB::table('items')->get(); 
            return view('admin.inventory.add-items')->with('master', $master);
    }
    public function items_list(){
        $master['items'] = DB::table('items')->get();
        return response()->json($master);
        echo json_encode($master);
            //return view('admin.inventory.inventory-master')->with('master', $master);
    }
    public function add_new_item(Request $request)
    {
         print "<pre>";
         $itemName = $request->post('item_name');
         $itemCode = $request->post('item_code');
         

         $result = DB::table('items')->insert([
             'item_name'=>$itemName,
             'item_code'=>$itemCode,
         ]);
         return back();
         //return response()->json(['msg'=>'Added Successfully']);
    }

    public function item_code($id){
        $result = DB::table('items')->where('id','=',$id)->get();
        return response()->json($result);
       
    }
    public function get_items(){
        $result = DB::table('items')->get();
        echo json_encode($result);
    }
    public function delete_item($id){
       $data = DB::table('inventory_details')->where('id','=', $id)->delete();
       if($data){
        return response()->json(['msg'=>'Row Deleted Successfylly']); 
       } 
        
    }

    public function view_item($id){
        $result = DB::table('inventory_details')->where('id','=',$id)->get();
        echo json_encode($result);
    }
}