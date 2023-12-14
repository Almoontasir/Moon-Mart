<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class pageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pages = DB::table('pages')->latest()->get();
        return view('admin.settings.pages.page_index',compact('pages'));
    }  
    public function store(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['page_position']= $request->page_position;
        $data['page_name']= $request->page_name;
        $data['page_title']= $request->page_title;
        $data['page_description']= $request->page_description;

        DB::table('pages')->insert($data);

        $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }  
    public function delete($id)
    {
        // dd($id);
        // dd($request->all());
       

        DB::table('pages')->delete($id);

        $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }  

    public function edit($id)
    {
        //  dd($id);
         $data = DB::table('pages')->where('id',$id)->first();
         return response()->json($data);

        
        
    }
}
