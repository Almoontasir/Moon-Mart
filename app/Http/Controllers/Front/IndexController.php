<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Subcatagory;
use App\Models\Product;
use App\Models\Review;
use DB;

class IndexController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $category=DB::table('catagories')->orderBy('Catagory_name','ASC')->get();
        $brand=DB::table('brands')->where('front_page',1)->limit(24)->get();
        $bannerproduct=Product::where('status',1)->where('product_slider',1)->latest()->first();
        $featured=Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(16)->get();
        $todaydeal=Product::where('status',1)->where('today_deal',1)->orderBy('id','DESC')->limit(6)->get();
        $popular_product=Product::where('status',1)->orderBy('product_views','DESC')->limit(16)->get();
        $trendy_product=Product::where('status',1)->where('trendy',1)->orderBy('id','DESC')->limit(8)->get();
        $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
        $review=DB::table('wbreviews')->where('status',1)->orderBy('id','DESC')->limit(12)->get();
        // homepage category
        $home_category=DB::table('catagories')->where('home_page',1)->orderBy('Catagory_name','ASC')->get();
        // dd($home_category);
        // $setting =DB::table('settings')->first();


        $campaign=DB::table('campaigns')->where('status',1)->orderBy('id','DESC')->first();

        return view('frontend.index',compact('category','bannerproduct','featured','trendy_product','brand','random_product','todaydeal','review','campaign','popular_product','home_category'));
    }

    public function ProductDetails($slug)
    {
        $product=Product::where('slug',$slug)->first();
                 Product::where('slug',$slug)->increment('product_views');
        $related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
        // dd($product->subcategory_id);
        $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();

        

        return view('frontend.product.product_details',compact('product','related_product','review'));
    }

    public function ProductQuickView($id)
    {
        $product=Product::where('id',$id)->first();
        return view('frontend.product.quick_view',compact('product'));
    }


   //categorywise product page
   public function categoryWiseProduct($id)
   {
       $category=DB::table('catagories')->where('id',$id)->first();
       $subcategory=DB::table('subcatagories')->where('Catagory_id',$id)->get();
       $brand=DB::table('brands')->get();
       $products=DB::table('products')->where('category_id',$id)->paginate(60);
       $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
       return view('frontend.product.category_product',compact('subcategory','brand','products','random_product','category'));

   }

   //subcategorywise product
   public function SubcategoryWiseProduct($id)
   {
       $subcategory=DB::table('subcatagories')->where('id',$id)->first();
       $childcategories=DB::table('childcatagories')->where('Subcatagory_id',$id)->get();
       $brand=DB::table('brands')->get();
       $products=DB::table('products')->where('subcategory_id',$id)->paginate(60);
       $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
       return view('frontend.product.subcategory_product',compact('childcategories','brand','products','random_product','subcategory'));
   }

   //childcategory product
   public function ChildcategoryWiseProduct($id)
   {
       $childcategory=DB::table('childcatagories')->where('id',$id)->first();
       $categories=DB::table('catagories')->get();
       $brand=DB::table('brands')->get();
       $products=DB::table('products')->where('childcategory_id',$id)->paginate(60);
       $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
       return view('frontend.product.childcategory_product',compact('categories','brand','products','random_product','childcategory'));
   }

   //brandwise product
   public function BrandWiseProduct($id)
   {
       $brand=DB::table('brands')->where('id',$id)->first();
       $categories=DB::table('catagories')->get();
       $brands=DB::table('brands')->get();
       $products=DB::table('products')->where('brand_id',$id)->paginate(60);
       $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
       return view('frontend.product.brandwise_product',compact('categories','brands','products','random_product','brand'));
   }

}
