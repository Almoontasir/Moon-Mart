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
                <form action="{{route('smtp.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="mailer" value="{{$smtp->mailer}}" placeholder="Enter mailer">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="host" value="{{$smtp->host}}" placeholder="Enter host">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="port" value="{{$smtp->port}}" placeholder="Enter port">
                    </div>
                    
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" value="{{$smtp->user_name}}" placeholder="Enter user_name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputEmail1" name="password" value="{{$smtp->password}}" placeholder="Enter password ">
                    </div>
                    
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="exampleInputEmail1" name="id" value="{{$smtp->id}}" >
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




