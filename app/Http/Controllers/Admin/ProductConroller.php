<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Str;
use Image;
use DataTables;
use File;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Subcatagory;
use App\Models\Brand;

class ProductConroller extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function ndex(Request $request)
    // {
    //     // $data = DB::table('warehouses')->get();
    //     //  return response()->json($data);
    //     // //  dd($data);
        
    //     if($request->ajax())
    //     {
            
    //         // $data = DB::table('products')->get();
    //         $query=DB::table('products')->leftJoin('catagories','products.category_id','catagories.id')
    //         ->leftJoin('subcatagories','products.subcategory_id','subcatagories.id')
    //         ->leftJoin('brands','products.brand_id','brands.id');
    //         $product=$query->select('products.*','catagories.Catagory_name','subcatagories.Subcatagory_name','brands.brand_name')
    //         ->get();
           
    //         return DataTables::of($product)
    //         ->addIndexColumn()
    //         ->editColumn('featured',function($row){
    //             if ($row->featured==1) {
    //                 return '<a href="#" data-id="'.$row->id.'" class="deactive_featurd"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
    //             }else{
    //                 return '<a href="#" data-id="'.$row->id.'" class="active_featurd"> <i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
    //             }
    //         })
    //         ->addColumn('action', function($row){
    //             $actionbtn='
    //             <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
    //             <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a> 
    //             <a href="'.route('product.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
    //             </a>';
    //            return $actionbtn;   
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    //     }
    //     //  $catagory = DB::table('catagories')->get();
    //     $category=DB::table('catagories')->get();
    //     $brand=DB::table('brands')->get();
    //     $warehouses=DB::table('warehouses')->get();
    //     // return view('admin.product.product_index');
    //     return view('admin.product.product_index',compact('category','brand','warehouses'));
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl='file/product';

            $product="";
              $query=DB::table('products')->leftJoin('catagories','products.category_id','catagories.id')
                    ->leftJoin('subcatagories','products.subcategory_id','subcatagories.id')
                    ->leftJoin('brands','products.brand_id','brands.id');

                if ($request->category_id) {
                    $query->where('products.category_id',$request->category_id);
                 }

                if ($request->brand_id) {
                    $query->where('products.brand_id',$request->brand_id);
                }

                if ($request->warehouse) {
                    $query->where('products.warehouse',$request->warehouse);
                }

                if ($request->status==1) {
                    $query->where('products.status',1);
                }
                if ($request->status==0) {
                    $query->where('products.status',0);
                }

            $product=$query->select('products.*','catagories.Catagory_name','subcatagories.Subcatagory_name','brands.brand_name')
                    ->get();
            return DataTables::of($product)
                    ->addIndexColumn()
                    ->editColumn('thumbnail',function($row) use ($imgurl){
                        return '<img src="'.$imgurl.'/'.$row->thumbnail.'"  height="30" width="30" >';
                    })
                    ->editColumn('featured',function($row){
                        if ($row->featured==1) {
                            return '<a href="#" data-id="'.$row->id.'" class="deactive_featurd"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                        }else{
                            return '<a href="#" data-id="'.$row->id.'" class="active_featurd"> <i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
                        }
                    })
                    ->editColumn('today_deal',function($row){
                        if ($row->today_deal==1) {
                            return '<a href="#" data-id="'.$row->id.'" class="deactive_deal"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                        }else{
                            return '<a href="#" data-id="'.$row->id.'" class="active_deal"><i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">deactive</span> </a>';
                        }
                    })
                    ->editColumn('status',function($row){
                        if ($row->status==1) {
                            return '<a href="#" data-id="'.$row->id.'" class="deactive_status"><i class="fas fa-thumbs-down text-danger"></i> <span class="badge badge-success">active</span> </a>';
                        }else{
                            return '<a href="#" data-id="'.$row->id.'" class="active_status"><i class="fas fa-thumbs-up text-danger"></i> <span class="badge badge-danger">deactive</span> </a>';
                        }
                    })
                    ->addColumn('action', function($row){
                        $actionbtn='
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="'.route('product.edit',[$row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a> 
                        <a href="'.route('product.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>
                        </a>';
                       return $actionbtn;   
                    })
                    ->rawColumns(['action','Catagory_name','Subcatagory_name','brand_name','thumbnail','featured','today_deal','status'])
                    ->make(true);       
        }

        $category=DB::table('catagories')->get();
        $brand=DB::table('brands')->get();
        $warehouses=DB::table('warehouses')->get();
        return view('admin.product.product_index',compact('category','brand','warehouses'));
    }


    public function create()
    {
        // dd("moon");
        $category = DB::table('catagories')->get();
        $brand = DB::table('brands')->get();
        $pickup_point = DB::table('pickup_points')->get();
        $warehouse = DB::table('warehouses')->get();
        return view('admin.product.product_create',compact('category','brand','pickup_point','warehouse'));
        // return view('admin.product.product_create');
        
        // dd($request->all());
    }

  

    public function store(Request $request)
    {
        
        // dd($request->all());
       $validated = $request->validate([
           'name' => 'required',
           'code' => 'required|unique:products|max:55',
           'subcategory_id' => 'required',
           'brand_id' => 'required',
           'unit' => 'required',
           'selling_price' => 'required',
           'color' => 'required',
           'description' => 'required',
       ]);

    //    dd($request->all());
       //subcategory call for category id
       $subcategory=DB::table('subcatagories')->where('id',$request->subcategory_id)->first();
       $slug=Str::slug($request->name, '-');

      
       $data=array();
       $data['name']=$request->name;
       $data['slug']=Str::slug($request->name, '-');
       $data['code']=$request->code;
       $data['category_id']=$subcategory->Catagory_id;
       $data['subcategory_id']=$request->subcategory_id;
       $data['childcategory_id']=$request->childcategory_id;
       $data['brand_id']=$request->brand_id;
       $data['pickup_point_id']=$request->pickup_point_id;
       $data['unit']=$request->unit;
       $data['tags']=$request->tags;
       $data['purchase_price']=$request->purchase_price;
       $data['selling_price']=$request->selling_price;
       $data['discount_price']=$request->discount_price;
       $data['warehouse']=$request->warehouse_id;
       $data['stock_quantity']=$request->stock_quantity;
       $data['color']=$request->color;
       $data['size']=$request->size;
       $data['description']=$request->description;
       $data['video']=$request->video;
       $data['featured']=$request->featured;
       $data['today_deal']=$request->today_deal;
       $data['product_slider']=$request->product_slider;
       $data['status']=$request->status;
       $data['trendy']=$request->trendy;
       $data['admin_id']=Auth::id();
    //    $data['date']=date('d-m-Y');
    //    $data['month']=date('F');
       //single thumbnail
       if ($request->thumbnail) {
             $thumbnail=$request->thumbnail;
             $photoname=$slug.'.'.$thumbnail->getClientOriginalExtension();
             Image::make($thumbnail)->save('file/product/'.$photoname);//->resize(600,600)
             $data['thumbnail']=$photoname;   // public/files/product/plus-point.jpg
       }
       //multiple images
       $images = array();
       if($request->hasFile('images')){
           foreach ($request->file('images') as $key => $image) {
               $imageName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
               Image::make($image)->save('file/product/'.$imageName);//->resize(600,600)
               array_push($images, $imageName);
           }
           $data['images'] = json_encode($images);
       }
       
       DB::table('products')->insert($data);
       $notification=array('messege' => 'Product Inserted!', 'alert-type' => 'success');
       return redirect()->back()->with($notification);

    }

    // edit 
    public function edit($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        //$product=Product::findorfail($id);
        $category=Catagory::all();
        $brand=Brand::all();
        $warehouse=DB::table('warehouses')->get();
        $pickup_point=DB::table('pickup_points')->get();
         //childcategory get_
        $childcategory=DB::table('childcatagories')->where('Catagory_id',$product->category_id)->get();
        // dd($childcategory);
        return view('admin.product.edit',compact('product','category','brand','warehouse','pickup_point','childcategory'));
    }

    //__update product__//
    public function update(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required',
           'code' => 'required|max:55',
           'subcategory_id' => 'required',
           'brand_id' => 'required',
           'unit' => 'required',
           'selling_price' => 'required',
           'color' => 'required',
           'description' => 'required',
       ]);

       //subcategory call for category id
       $subcategory=DB::table('subcatagories')->where('id',$request->subcategory_id)->first();
       $slug=Str::slug($request->name, '-');


       $data=array();
       $data['name']=$request->name;
       $data['slug']=Str::slug($request->name, '-');
       $data['code']=$request->code;
       $data['category_id']=$subcategory->Catagory_id;
       $data['subcategory_id']=$request->subcategory_id;
       $data['childcategory_id']=$request->childcategory_id;
       $data['brand_id']=$request->brand_id;
       $data['pickup_point_id']=$request->pickup_point_id;
       $data['unit']=$request->unit;
       $data['tags']=$request->tags;
       $data['purchase_price']=$request->purchase_price;
       $data['selling_price']=$request->selling_price;
       $data['discount_price']=$request->discount_price;
       $data['warehouse']=$request->warehouse;
       $data['stock_quantity']=$request->stock_quantity;
       $data['color']=$request->color;
       $data['size']=$request->size;
       $data['description']=$request->description;
       $data['video']=$request->video;
       $data['featured']=$request->featured;
       $data['today_deal']=$request->today_deal;
       $data['product_slider']=$request->product_slider;
       $data['status']=$request->status;
       $data['trendy']=$request->trendy;

       //__old thumbnail ase kina__ jodi thake new thumbnail insert korte hobe
       $thumbnail = $request->file('thumbnail');
        if($thumbnail) {
           
             $thumbnail=$request->thumbnail;
             $photoname=$slug.'.'.$thumbnail->getClientOriginalExtension();
             Image::make($thumbnail)->save('file/product/'.$photoname);//->resize(600,600)
             $data['thumbnail']=$photoname;   // public/files/product/plus-point.jpg   
        }

       //__multiple image update__//

        $old_images = $request->has('old_images');
        if($old_images){
            $images = $request->old_images;
            $data['images'] = json_encode($images);
        }else{
            $images = array();
            $data['images'] = json_encode($images); 
        }

        if($request->hasFile('images')){
            foreach ($request->file('images') as $key => $image) {
                $imageName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->save('file/product/'.$imageName);//->resize(600,600)
                array_push($images, $imageName);
            }
            $data['images'] = json_encode($images);
        }



       DB::table('products')->where('id',$request->id)->update($data);
       $notification=array('messege' => 'Product Updated!', 'alert-type' => 'success');
       return redirect()->back()->with($notification);
    }




     //not featured
     public function notfeatured($id)
     {
         DB::table('products')->where('id',$id)->update(['featured'=>0]);
         return response()->json('Product Not Featured');
     }
 
     //active featured
     public function activefeatured($id)
     {
         DB::table('products')->where('id',$id)->update(['featured'=>1]);
         return response()->json('Product Featured Activated');
     }
 
     //not Deal
     public function notdeal($id)
     {
         DB::table('products')->where('id',$id)->update(['today_deal'=>0]);
         return response()->json('Product Not Today deal');
     }
 
     //active Deal
     public function activedeal($id)
     {
         DB::table('products')->where('id',$id)->update(['today_deal'=>1]);
         return response()->json('Product today deal Activated');
     }
 
     //not status
     public function notstatus($id)
     {
         DB::table('products')->where('id',$id)->update(['status'=>0]);
         return response()->json('Product Deactive');
     }
 
     //active staus
     public function activestatus($id)
     {
         DB::table('products')->where('id',$id)->update(['status'=>1]);
         return response()->json('Product Activated');
     }

    
}
