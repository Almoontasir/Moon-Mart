<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Str;
use Image;

class ChildCatagoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $data = DB::table('childcatagories')->get();
         
        // $data = DB::table('childcatagories')->join('catagories','childcatagories.Catagory_id','catagories.id')->join('subcatagories','childcatagories.Subcatagory_id','subcatagories.id')->select('catagories.Catagory_name','subcatagories.Subcatagory_name','childcatagories.*')->get();
        // return response()->json($data);
        if($request->ajax())
        {
            
            $data = DB::table('childcatagories')->join('catagories','childcatagories.Catagory_id','catagories.id')->join('subcatagories','childcatagories.Subcatagory_id','subcatagories.id')->select('catagories.Catagory_name','subcatagories.Subcatagory_name','childcatagories.*')->get();
            // dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($items){
                $actionbtn ='<div class="d-flex">
                <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                <form  action="'.route('childcatagory.delete',$items->id).'" method="POST">
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
        $catagory = DB::table('catagories')->get();
        return view('admin.childCatagory.childcatagory',compact('catagory'));
    }
    public function store(Request $request)
    {
        $cat = DB::table('subcatagories')->where('id',$request->Subcatagory_id)->first();
        // return response()->json($request);
        $slug =  Str::of($request->Childcatagory_name)->slug('-');
        $data = array(
            'Catagory_id'=>$cat->Catagory_id, 
            'Subcatagory_id'=>$request->Subcatagory_id, 
            'Childcatagory_name'=>$request->Childcatagory_name, 
            'Childcatagory_slug'=>$slug, 
        );
        // return response()->json($data);
        DB::table('childcatagories')->insert($data);
   
        $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        DB::table('childcatagories')->where('id',$id)->delete();
        $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
       $data = DB::table('childcatagories')->join('catagories','childcatagories.Catagory_id','catagories.id')->join('subcatagories','childcatagories.Subcatagory_id','subcatagories.id')->select('catagories.Catagory_name','subcatagories.Subcatagory_name','childcatagories.*')->where('childcatagories.id',$id)->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        //    return response()->json($request);
           $slug =  Str::of($request->Childcatagory_name)->slug('-');
           $data = array(
            'Catagory_id'=>$request->Catagory_id, 
            'Subcatagory_id'=>$request->Subcatagory_id, 
            'Childcatagory_name'=>$request->Childcatagory_name, 
            'Childcatagory_slug'=>$slug, 
        );
        // $data =array();
        // $data['Catagory_name'] = $request->Catagory_name;
        // $data['Catagory_slug'] = $request->Catagory_name;

        // return response()->json($data);
        DB::table('childcatagories')->where('id',$request->id)->update($data);
        // return response()->json($d);
         
         $notification = array('messege'=>'data updated succesfully','alert-type'=>'success');
         return redirect()->back()->with($notification);
       
    }


}
