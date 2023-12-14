<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class pickup_pointController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $data = DB::table('warehouses')->get();
        //  return response()->json($data);
        // //  dd($data);
        
        if($request->ajax())
        {
            
            $data = DB::table('pickup_points')->get();
            // return response()->json($data);
             //dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($items){
                $actionbtn ='<div class="d-flex">
                <a href="#" class="btn btn-sm btn-info mx-2 edit" id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                <a href="'.route('pickup_point.delete',$items->id).'" class="btn btn-sm btn-danger mx-2" id="delete_coupon"><i class="fas fa-trash"></i></a>
               
                
                </div>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        //  $catagory = DB::table('catagories')->get();
        return view('admin.pickup_point.pickup_point_index');
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        $data = array();
        $data['pickup_point_name']= $request->pickup_point_name;
        $data['pickup_point_address']= $request->pickup_point_address;
        $data['pickup_point_phone']= $request->pickup_point_phone;
        $data['pickup_point_phone_two']= $request->pickup_point_phone_two;
        DB::table('pickup_points')->insert($data);
        return response()->json('Information added');
        // $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);

    }
    public function destroy($id)
    {
        // dd($id);
        DB::table('pickup_points')->where('id',$id)->delete();
        return response()->json('Information deleted');
        // $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        // dd($id);
        $data = DB::table('pickup_points')->where('id',$id)->first();
        return view('admin.pickup_point.pickup_point_edit',compact('data'));
       
        // return response()->json($data);
        // $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['pickup_point_name']= $request->pickup_point_name;
        $data['pickup_point_address']= $request->pickup_point_address;
        $data['pickup_point_phone']= $request->pickup_point_phone;
        $data['pickup_point_phone_two']= $request->pickup_point_phone_two;
        DB::table('pickup_points')->where('id',$request->id)->update($data);
        //  $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
        return response()->json('Information updated');
    }
}

