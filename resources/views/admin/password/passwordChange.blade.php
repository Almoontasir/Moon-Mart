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
          <div class="row">
            <div class="col-12">
               
                   
                <div class="hold-transition login-page">
                    <div class="login-box">
                        <div class="card card-outline card-primary">
                          <div class="card-header text-center">
                            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
                          </div>
                          <div class="card-body">
                            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
                            <form action="{{route('admin.password_update')}}" method="post">
                                @csrf
                              <div class="input-group mb-3">
                                <input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror" placeholder="Old Password" required>
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                  </div>
                                </div>
                               
                              </div>

                              <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                  </div>
                                </div>
                                
                              </div>

                              <div class="input-group mb-3">
                                <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                  </div>
                                </div>
                               
                              </div>

                              <div class="row">
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary btn-block">Change password</button>
                                </div>
                                <!-- /.col -->
                              </div>
                            </form>
                      
                            <p class="mt-3 mb-1">
                              <a href="login.html">Login</a>
                            </p>
                          </div>
                          <!-- /.login-card-body -->
                        </div>
                      </div>
                </div>
                    
                  
            </div>
          </div>     
        </div>
     </section>        





@endsection    




