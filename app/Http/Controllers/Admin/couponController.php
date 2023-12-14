<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class couponController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index(Request $request)
    // {
    //     // $data = DB::table('warehouses')->get();
    //     //  return response()->json($data);
    //     // //  dd($data);
        
    //     if($request->ajax())
    //     {
            
    //         $data = DB::table('coupons')->get();
    //         // return response()->json($data);
    //          //dd($data);
    //         return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('action',function($items){
    //             $actionbtn ='<div class="d-flex">
    //             <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
    //             <form id="deleted_form"  action="'.route('coupon.delete',$items->id).'" method="POST">
    //                                  <input type="hidden" name="_token" value="'. csrf_token().'" />
    //                                  <input type="hidden" name="_method" value="delete">
    //                                 <button   class="btn btn-sm btn-danger deleteYazra"><i class="fas fa-trash"></i></button>
    //                             </form>
                
    //             </div>';
    //             return $actionbtn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    //     }
    //     //  $catagory = DB::table('catagories')->get();
    //     return view('admin.offer.coupon.coupon_index');
    // }
    public function index(Request $request)
    {
        // $data = DB::table('warehouses')->get();
        //  return response()->json($data);
        // //  dd($data);
        
        if($request->ajax())
        {
            
            $data = DB::table('coupons')->get();
            // return response()->json($data);
             //dd($data);
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($items){
                $actionbtn ='<div class="d-flex">
                <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id ="'.$items->id.'" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                <a href="'.route('coupon.delete',$items->id).'" class="btn btn-sm btn-danger mx-2" id="delete_coupon"><i class="fas fa-trash"></i></a>
               
                
                </div>';
                return $actionbtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        //  $catagory = DB::table('catagories')->get();
        return view('admin.offer.coupon.coupon_index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['coupon_code']= $request->coupon_code;
        $data['type']= $request->coupon_type;
        $data['valid_date']= $request->valid_date;
        $data['coupon_amount']= $request->coupon_amount;
        $data['status']= $request->status;
        DB::table('coupons')->insert($data);
        return response()->json('coupon added');
        // $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);

    }
    public function destroy($id)
    {
        // dd($id);
        DB::table('coupons')->where('id',$id)->delete();
        return response()->json('coupon deleted');
        // $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        // dd($id);
        $data = DB::table('coupons')->where('id',$id)->first();
        return view('admin.offer.coupon.coupon_edit',compact('data'));
       
        // return response()->json($data);
        // $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $data = array();
        $data['coupon_code']= $request->coupon_code;
        $data['type']= $request->coupon_type;
        $data['valid_date']= $request->valid_date;
        $data['coupon_amount']= $request->coupon_amount;
        $data['status']= $request->status;
        DB::table('coupons')->where('id',$request->id)->update($data);
        //  $notification = array('messege'=>'data deleted succesfully','alert-type'=>'success');
        // return redirect()->back()->with($notification);
        return response()->json('coupon updated');
    }
}
