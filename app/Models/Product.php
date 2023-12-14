<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catagory;
use App\Models\Subcatagory;
use App\Models\Childcatagory;
use App\Models\PickupPoints;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','subcategory_id','childcategory_id','brand_id','pickup_point_id','name','slug','code','unit','tags','color','size','video','purchase_price','selling_price','discount_price','stock_quantity','warehouse','description','thumbnail','images','featured','product_views','today_deal','status','trendy','admin_id'];

    public function category(){
        return $this->belongsTo(Catagory::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcatagory::class,'subcategory_id');
    }
    public function childcategory(){
        return $this->belongsTo(Childcatagory::class,'childcategory_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function pickupPoint(){
        return $this->belongsTo(PickupPoints::class,'pickup_point_id');
    }
}
