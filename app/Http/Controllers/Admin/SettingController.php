<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class SettingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function seo()
    {
        return view('admin.settings.seo');
    }

    public function seo_store(Request $request)
    {
        $data = array();
        $data['meta_title']= $request->meta_title;
        $data['meta_author']= $request->meta_author;
        $data['meta_tag']= $request->meta_tag;
        $data['meta_description']= $request->meta_description;
        $data['meta_keyword']= $request->meta_keyword;
        $data['google_varification']= $request->google_varification;
        $data['google_analytics']= $request->google_analytics;
        $data['alexa_varification']= $request->alexa_varification;
        $data['google_addsense']= $request->google_addsense;
        // dd($data);
        DB::table('seos')->insert($data);
        $notification = array('messege'=>'data inserted succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function smtp()
    {
        $smtp = DB::table('smtp')->first();
        // dd($smtp);
        return view('admin.settings.smtp',compact('smtp'));
    }

    public function smtp_store(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['mailer']= $request->mailer;
        $data['host']= $request->host;
        $data['port']= $request->port;
        $data['user_name']= $request->user_name;
        $data['password']= $request->password;
      
        // dd($data);
        DB::table('smtp')->where('id',$request->id)->update($data);
        $notification = array('messege'=>'data updated succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function website(  )
    {
        $setting = DB::table('settings')->first();
        // dd($setting);
        return view('admin.settings.website_setting',compact('setting'));
    }
    public function website_store(Request $request )
    {
        // dd($request->all());
        $data = array();
        $data['currency']= $request->currency;
        $data['phone_one']= $request->phone_one;
        $data['phone_two']= $request->phone_two;
        $data['main_email']= $request->main_email;
        $data['support_email']= $request->support_email;
        $data['address']= $request->address;
        $data['facebook']= $request->facebook;
        $data['twitter']= $request->twitter;
        $data['linkedin']= $request->linkedin;
        $data['instragram']= $request->instragram;
        $data['youtube']= $request->youtube;

        // $slug =  Str::of($request->Brand_name)->slug('-');
        $photo = $request->logo;
        $old_photo = $request->old_logo;
       
        if($photo)
        {
            $photo_name = uniqid().'.'.$photo->getClientOriginalExtension();
             if(File::exists( $old_photo))
             {
                File::delete($old_photo);
             }

             Image::make($photo)->resize(300,150)->save('file/photo/'.$photo_name);
             $logo_path = 'file/photo/'.$photo_name;
            //  dd($file_path);

        }
        else
        {
           $logo_path =  $old_photo;
        }

        $favicon = $request->favicon;
        $old_favicon = $request->old_favicon;
       
        if($favicon)
        {
            $favicon_name = uniqid().'.'.$favicon->getClientOriginalExtension();
             if(File::exists( $old_favicon))
             {
                File::delete($old_favicon);
             }

             Image::make($favicon)->resize(300,150)->save('file/photo/'.$favicon_name);
             $favicon_path = 'file/photo/'.$favicon_name;
            //  dd($file_path);

        }
        else
        {
           $favicon_path =  $old_favicon;
        }

        $data['logo']= $logo_path;
        $data['favicon']= $favicon_path;
        DB::table('settings')->where('id',$request->id)->update($data);
        $notification = array('messege'=>'data updated succesfully','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
