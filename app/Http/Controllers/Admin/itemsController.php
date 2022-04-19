<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class itemsController extends Controller
{
   
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $result = DB::table('items')->where('id','=',$id)->get();
        echo json_encode($result);
    }

   
    public function update(Request $request)
    {
        
        DB::table('items')->where('id', $request->post('id'))->update([
            'item_name'=> $request->post('item_name'),
            'item_code'=> $request->post('item_code'),
        ]);
       
        return response()->json(['msg'=>'Updated']);
        
    } 
     
    public function destroy($id)
    {
        DB::table('items')->where('id','=',$id)->delete();
        return back();
    }
}
