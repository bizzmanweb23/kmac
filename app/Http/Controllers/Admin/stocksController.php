<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class stocksController extends Controller
{
     public function stock_in()
     {
        $stocksin = DB::table('stock_in')->get();
        return view('admin.stocks.stockin')->with(['stocksin'=>$stocksin]);
     }
     public function stock_in_delete($id){
       
      $result = DB::table('stock_in')->where('id','=',$id)->delete();
      return response()->json(['msg'=>'Deleted Successfully']);
     }
     public function stock_in_edit($id){
        $result = DB::table('stock_in')->where('id','=',$id)->get();
        echo json_encode($result);
     }
     public function update_stock_in(Request $request){
         
         $id = $request->post('id-value');
         DB::table('stock_in')->where('id',$id)->update([
             'item'=>$request->post('item'),
             'item_code'=>$request->post('item-code'),
             'pkg_size'=>$request->post('pkg-size'),
             'pkg_qty'=>$request->post('qty'),
             'pkg_qty_expanded'=>$request->post('qty-expanded'),
             'cost_per_pack'=>$request->post('cost-per-pack'),
             'cost_per_pcs'=>$request->post('cost-per-pcs'),
         ]); 
        
     }
     public function stock_out()
     {
        $stocksOut = DB::table('stock_out')->get();
        return view('admin.stocks.stocksout')->with(['stocksout'=>$stocksOut]);
     }
    public function delete_stockout($id)
    {
        DB::table('stock_out')->where('id','=', $id)->delete();
        return response()->json(['msg' => 'Deleted']);
    }
    public function stock_out_edit($id)
    {
          $result = DB::table('stock_out')->where('id','=', $id)->get();
          echo json_encode($result);
          //return view('admin.stocks.stockout-edit')->with('result', $result); 
    }
    public function update_stock_out(Request $request)
    { 
        print "<pre>";
        print_r($request->post());
        $id = $request->post('id');

        $qtyPerPcs = $request->post('qty-per-pcs'); 
        $costPerpcs = $request->post('cost-per-pcs');

        $subTotal = $qtyPerPcs * $costPerpcs;

        DB::table('stock_out')->where('id',$id)->update([
            'date'=>$request->post('date'),
            'delivary_order'=>$request->post('delivary-order'),
            'location'=>$request->post('location'),
            'item'=>$request->post('item'),
            'item_code'=>$request->post('item-code'),
            'qty_per_pcs'=>$request->post('qty-per-pcs'),
            'cost_per_pcs'=>$request->post('cost-per-pcs'),
            'sub_cost'=>$subTotal,

        ]);
        return response()->json(['msg'=>'Updated']);
    }
    public function stock_out_add(Request $request)
    {
        $qtyPerPcs = $request->post('qty-per-pcs'); 
        $costPerpcs = $request->post('cost-per-pcs');

        $subTotal = $qtyPerPcs * $costPerpcs;

        $data = [
            'date'=>$request->post('date'),
            'delivary_order'=>$request->post('delivary-order'),
            'location'=>$request->post('location'),
            'item'=>$request->post('item'),
            'item_code'=>$request->post('item-code'),
            'qty_per_pcs'=>$request->post('qty-per-pcs'),
            'cost_per_pcs'=>$request->post('cost-per-pcs'),
            'sub_cost'=>$subTotal,
        ];
        $result = DB::table('stock_out')->insert($data);
        return back();
    }
    public function add_new_stock(Request $request)
    {
        print "<pre>";
        print_r($request->post());
//        $validate = $request->validate([
//            'item'=>'required',
//            'item_code'=>'required|min:1',
//            'pkg_size'=>'required|min:1',
//            'pkg_qty'=>'required|min:1',
//            'pkg_qty_expanded'=>'required|min:1',
//            'cost_per_pack'=>'required|min:1',
//            'cost_per_pcs'=>'required|min:1',
//        ],
//        [
//            'item'=>'PleaseItem Name',
//            'item_code'=>'Enter Item Code',
//            'pkg_size'=>'Enter Package Size',
//            'pkg_qty'=>'Enter Package Qty',
//            'pkg_qty_expanded'=>'Quantity Expanded',
//            'cost_per_pack'=>'Enter Cost Per Pack',
//            'cost_per_pcs'=>'Enter Cost Per Pieces',
//        ]);
        $data = [
            'item'=>$request->post('item'),
            'item_code'=>$request->post('item_code'),
            'pkg_size'=>$request->post('pkg_size'),
            'pkg_qty'=>$request->post('qty'), 
            'pkg_qty_expanded'=>$request->post('qty_expanded'),
            'cost_per_pack'=>$request->post('cost_per_pack'),
            'cost_per_pcs'=>$request->post('cost_per_pcs'),
        ];
         $result = DB::table('stock_in')->insert($data);
//                print_r($data);
//        if($result){
//            return back();
//        }
    }
     
}
