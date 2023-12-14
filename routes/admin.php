<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('check',function(){
   echo "You are at the admin page";
});


//  Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
 Route::get('admin-login', [App\Http\Controllers\Auth\LoginController::class,'adminLogin'])->name('admin.login');

 Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'is_admin'],function(){
   Route::get('admin/home', 'AdminController@admin')->name('admin.home');
   Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
   Route::get('admin/password_change', 'AdminController@password_change')->name('admin.password_change');
   Route::post('admin/password_update', 'AdminController@password_update')->name('admin.password_update');

  //  global route 
  Route::get('/get-child-category/{id}', 'CatagoryController@getChildCategory');

   Route::group(['prefix'=>'catagory'],function(){
    Route::get('/', 'CatagoryController@index')->name('catagory.index');
    Route::post('/', 'CatagoryController@store')->name('catagory.store');
    Route::delete('/{id}', 'CatagoryController@destroy')->name('catagory.delete');
    Route::put('/update', 'CatagoryController@update')->name('catagory.update');
    // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/edit/{id}', 'CatagoryController@edit');
  });



  //Campaign Routes
	Route::group(['prefix'=>'campaign'], function(){
		Route::get('/','CampaignController@index')->name('campaign.index');
		Route::post('/store','CampaignController@store')->name('campaign.store');
		Route::get('/delete/{id}','CampaignController@destroy')->name('campaign.delete');
		Route::get('/edit/{id}','CampaignController@edit');
		Route::post('/update','CampaignController@update')->name('campaign.update');
	});

	//__campaign product routes__//
	Route::group(['prefix'=>'campaign-product'], function(){
		Route::get('/{campaign_id}','CampaignController@campaignProduct')->name('campaign.product');
		Route::get('/add/{id}/{campaign_id}','CampaignController@ProductAddToCampaign')->name('add.product.to.campaign');
		Route::get('/list/{campaign_id}','CampaignController@ProductListCampaign')->name('campaign.product.list');
		Route::get('/remove/{id}','CampaignController@RemoveProduct')->name('product.remove.campaign');
		// Route::post('/update','CampaignController@update')->name('campaign.update');
	});

  

   Route::group(['prefix'=>'subcatagory'],function(){
    Route::get('/', 'SubCatagoryController@index')->name('subcatagory.index');
    Route::post('/', 'SubCatagoryController@store')->name('subcatagory.store');
    Route::delete('/{id}', 'SubCatagoryController@destroy')->name('subcatagory.delete');
    Route::put('/updateupdate', 'SubCatagoryController@update')->name('subcatagory.update');
    // // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/edit/{id}', 'SubCatagoryController@edit');
  });

   Route::group(['prefix'=>'childcatagory'],function(){
    Route::get('/', 'ChildCatagoryController@index')->name('childcatagory.index');
    Route::post('/', 'ChildCatagoryController@store')->name('childcatagory.store');
    Route::delete('/{id}', 'ChildCatagoryController@destroy')->name('childcatagory.delete');
    Route::put('/update', 'ChildCatagoryController@update')->name('childcatagory.update');
    // // // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/edit/{id}', 'ChildCatagoryController@edit');
  });

   Route::group(['prefix'=>'brand'],function(){
    Route::get('/', 'BrandController@index')->name('brand.index');
    Route::post('/', 'BrandController@store')->name('brand.store');
    Route::delete('/{id}', 'BrandController@destroy')->name('brand.delete');
    Route::put('/update', 'BrandController@update')->name('brand.update');
    // // // // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/edit/{id}', 'BrandController@edit');
  });

  
  Route::group(['prefix'=>'warehouse'],function(){
   Route::get('/', 'warehouseController@index')->name('warehouse.index');
   Route::post('/', 'warehouseController@store')->name('warehouse.store');
   Route::delete('/{id}', 'warehouseController@destroy')->name('warehouse.delete');
   // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
   Route::put('/update', 'warehouseController@update')->name('warehouse.update');
   Route::get('/edit/{id}', 'warehouseController@edit');
 });


  Route::group(['prefix'=>'coupon'],function(){
   Route::get('/', 'couponController@index')->name('coupon.index');
   Route::post('/', 'couponController@store')->name('coupon.store');
   Route::delete('/{id}', 'couponController@destroy')->name('coupon.delete');
  //  // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
   Route::put('/update', 'couponController@update')->name('coupon.update');
   Route::get('/edit/{id}', 'couponController@edit')->name('coupon.edit');
 });

  Route::group(['prefix'=>'product'],function(){
   Route::get('/create', 'ProductConroller@create')->name('product.create');
   Route::get('/', 'ProductConroller@index')->name('product.index');
   
   Route::post('/store', 'ProductConroller@store')->name('product.store');
   Route::delete('/{id}', 'ProductConroller@destroy')->name('product.delete');
  // //  // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
   Route::put('/update', 'ProductConroller@update')->name('product.update');
   Route::get('/edit/{id}', 'ProductConroller@edit')->name('product.edit');
   Route::get('/active-featured/{id}','ProductConroller@activefeatured');
		Route::get('/not-featured/{id}','ProductConroller@notfeatured');
		Route::get('/active-deal/{id}','ProductConroller@activedeal');
		Route::get('/not-deal/{id}','ProductConroller@notdeal');
		Route::get('/active-status/{id}','ProductConroller@activestatus');
		Route::get('/not-status/{id}','ProductConroller@notstatus');
 });

 
  Route::group(['prefix'=>'pickup_point'],function(){
   Route::get('/', 'pickup_pointController@index')->name('pickup_point.index');
   Route::post('/', 'pickup_pointController@store')->name('pickup_point.store');
   Route::delete('/{id}', 'pickup_pointController@destroy')->name('pickup_point.delete');
  // //  // Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
   Route::put('/update', 'pickup_pointController@update')->name('pickup_point.update');
   Route::get('/edit/{id}', 'pickup_pointController@edit')->name('pickup_point.edit');
 });


  // setting 
   Route::group(['prefix'=>'setting'],function(){

    Route::group(['prefix'=>'seo'],function(){
      Route::get('/', 'SettingController@seo')->name('seo.index');
      Route::post('/store', 'SettingController@seo_store')->name('seo.store');
    });

    Route::group(['prefix'=>'smtp'],function(){
      Route::get('/', 'SettingController@smtp')->name('smtp.index');
      Route::post('/store', 'SettingController@smtp_store')->name('smtp.store');
    });
    Route::group(['prefix'=>'pages'],function(){
      Route::get('/', 'pageController@index')->name('page.index');
      Route::post('/store', 'pageController@store')->name('page.store');
      Route::delete('/{id}', 'pageController@delete')->name('page.delete');
      // Route::put('/', 'pageController@update')->name('catagory.update');
      Route::get('/edit/{id}', 'pageController@edit');
    });
    Route::group(['prefix'=>'website'],function(){
      Route::get('/', 'SettingController@website')->name('website.setting');
      Route::post('/store', 'SettingController@website_store')->name('website.store');
      // Route::delete('/{id}', 'pageController@delete')->name('page.delete');
      // // Route::put('/', 'pageController@update')->name('catagory.update');
      // Route::get('/edit/{id}', 'pageController@edit');
    });


  });
// setting 
 
});
