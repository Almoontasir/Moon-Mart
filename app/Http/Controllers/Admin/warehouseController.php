<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
class warehouseController extends Controller
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
            
            $data = DB::table('warehouses')->get();
            // return response()->json($data);
             //dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($items){
                $actionbtn ='<div class="d-flex">
                <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                <form action="'.route('warehouse.delete',$items->id).'" method="POST">
                                     <input type="hidden" name="_token" value="'. csrf_token().'" />
                                     <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></button>
                                </form>
                
                </div>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        //  $catagory = DB::table('catagories')->get();
        return view('admin.warehouse.warehouse_index');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['ware_name']= $request->ware_name;
        $data['ware_address']= $request->ware_address;
        $data['ware_phone']= $request->ware_phone;
        DB::table('warehouses')->insert($data);
        $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);

    }
    
    public function edit($id)
    {
       $data = DB::table('warehouses')->where('id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        //   dd($request->all());
         $data = array();
         $data['ware_name']= $request->ware_name;
         $data['ware_address']= $request->ware_address;
         $data['ware_phone']= $request->ware_phone;
         DB::table('warehouses')->where('id',$request->id)->update($data);
         $notification = array('messege'=>'data updated succesfully','alert-type'=>'success');
         return redirect()->back()->with($notification);
 
    }
    public function destroy($id)
    {
        DB::table('warehouses')->where('id',$id)->delete();
        $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
