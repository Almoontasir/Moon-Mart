<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Illuminate\Support\Str;
use Image;
use File;
class BrandController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       
        if($request->ajax())
        {
            
            $data = DB::table('brands')->get();
            // dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($items){
                $actionbtn ='<div class="d-flex">
                <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                <form action="'.route('brand.delete',$items->id).'" method="POST">
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
       
        return view('admin.brand.brand');
    }
    public function store(Request $request)
    {
        $slug =  Str::of($request->Brand_name)->slug('-');
        $photo = $request->Brand_logo;
        $photo_name = $slug.'.'.$photo->getClientOriginalExtension();
        // $photo->move('file/photo/',$photo_name); //without Image intervation
        Image::make($photo)->save('file/brand/'.$photo_name);//->resize(300,150)
        $data = array(
            'brand_name'=>$request->Brand_name,
            'brand_slug'=>$slug,
            'brand_logo'=>'file/brand/'.$photo_name,
        );
        DB::table('brands')->insert($data);
        $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);


    }

    public function destroy($id)
    {
        $data = DB::table('brands')->find($id);
        if(File::exists($data->brand_logo))
        {
            File::delete($data->brand_logo);
            // unlink($data->brand_logo);
        }
        DB::table('brands')->where('id',$id)->delete();
        $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        // dd($id);
        $data = DB::table('brands')->find($id);
        return response()->json($data);
    }
    
    public function update(Request $request)
    {
        // dd($request->all());
       
        $slug =  Str::of($request->Brand_name)->slug('-');
        $photo = $request->Brand_logo;
        $old_photo = $request->old_logo;
       
        if($photo)
        {
            $photo_name = $slug.'.'.$photo->getClientOriginalExtension();
             if(File::exists( $old_photo))
             {
                File::delete($old_photo);
             }

             Image::make($photo)->save('file/brand/'.$photo_name);//->resize(300,150)
             $file_path = 'file/brand/'.$photo_name;
            //  dd($file_path);

        }
        else
        {
           $file_path =  $old_photo;
        }
       

        $data = array(
            'brand_name'=>$request->Brand_name,
            'brand_slug'=>$slug,
            'brand_logo'=>$file_path,
        );
        DB::table('brands')->where('id',$request->id)->update($data);
        $notification = array('messege'=>'data updated succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);


    }
}
