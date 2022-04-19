<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AssetsController extends Controller
{
    public function index()
    {
        $assets = DB::table('assets')->get();
        return view('admin.assets.list')->with('assets',$assets);
    } 
    public function edit($id)
    {

    }
    public function update($id)
    {

    }
    public function delete($id)
    {

    }
    public function show($id)
    {

    }
}
