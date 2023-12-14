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
              <li class="breadcrumb-item"><a href="#">Categories</a></li>
              <li class="breadcrumb-item active">Show Categories</li>
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
                <form action="{{route('seo.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="meta_title" value="{{old('meta_title')}}" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="meta_author" value="{{old('meta_author')}}" placeholder="Enter Meta Author">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="meta_tag" value="{{old('meta_tag')}}" placeholder="Enter Meta Tag">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control"  id="exampleInputEmail1" name="meta_description" value="{{old('meta_description')}}" rows="2" cols="50">
                           Enter Meta Description
                            </textarea>
                      {{-- <input type="text" class="form-control" id="exampleInputEmail1" name="meta_description" value="{{old('meta_description')}}" placeholder="Enter Meta Description"> --}}
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="meta_keyword" value="{{old('meta_keyword')}}" placeholder="Enter Meta Keyword">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="google_varification" value="{{old('google_varification')}}" placeholder="Enter Google Varification ">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="google_analytics" value="{{old('google_analytics')}}" placeholder="Enter google analytics">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="alexa_varification" value="{{old('alexa_varification')}}" placeholder="Enter alexa varification">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="google_addsense" value="{{old('google_addsense')}}" placeholder="Enter google addsense">
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




