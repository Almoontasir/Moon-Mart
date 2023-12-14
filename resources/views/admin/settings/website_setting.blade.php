@extends('layouts.home_app')

@section('admin_contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Catagories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">website</a></li>
              <li class="breadcrumb-item active">Show website</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-6">
               
                   
                 <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('website.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{$setting->id}}">
                    <select  class='form-control' name="currency" id="">
                        <option value="$" {{($setting->currency =="$") ?  'selected' : ''}}>$</option>
                        <option value="৳" {{($setting->currency =="৳") ?  'selected' : ''}}>৳</option>
                    </select>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="phone_one" value= "{{$setting->phone_one}}" placeholder="Enter phone_one">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="phone_two" value="{{$setting->phone_two}}" placeholder="Enter phone_two">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" name="main_email" value="{{$setting->main_email}}" placeholder="Enter main_email">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" name="support_email" value="{{$setting->support_email}}" placeholder="Enter support_email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control"  id="exampleInputEmail1" name="address" value="{{$setting->address}}" rows="2" cols="50">
                           Enter Meta Description
                            </textarea>
                    </div>

                    <strong class="text-info">Images</strong>

                    <div class="form-group">
                        <input type="file" class="form-control" id="exampleInputEmail1" name="logo" value="{{$setting->logo}}" placeholder="Enter logo">
                        <input type="hidden" name="old_logo" value="{{$setting->logo}}">
                      </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="exampleInputEmail1" name="favicon" value="{{$setting->favicon}}" placeholder="Enter favicon">
                        <input type="hidden" name="old_favicon" value="{{$setting->favicon}}">
                      </div>

                    <strong class="text-info">Social Acconts</strong>

                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="facebook" value="{{$setting->facebook}}" placeholder="Enter facebook">
                      </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="twitter" value="{{$setting->twitter}}" placeholder="Enter twitter">
                      </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="linkedin" value="{{$setting->linkedin}}" placeholder="Enter linkedin">
                      </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="instragram" value="{{$setting->instragram}}" placeholder="Enter instragram">
                      </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="youtube" value="{{$setting->youtube}}" placeholder="Enter youtube">
                      </div>

                   
                    
                 
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
                    
                  
            </div>
          </div>     
        </div>
     </section>        





@endsection    




