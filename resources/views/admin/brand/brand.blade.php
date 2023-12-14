@extends('layouts.home_app')

@section('admin_contain')
{{-- css  --}}
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
{{-- css  --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Brands</a></li>
              <li class="breadcrumb-item active">Show Brands</li>
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
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable for Brands</h3>
                      <button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add Brand</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="" class="table table-bordered table-striped ytable">
                        <thead>
                        <tr>
                          <th>Serial Number</th>
                          <th>Brand Name</th>
                          <th>Brand Slug</th>
                          <th>Brand Logo</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- <th>Moon</th> --}}

                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          
                        
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
          </div>     
        </div>
     </section>        



     
<!-- Modal for add data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            
           
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="Brand_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Name">
                  <small id="emailHelp" class="form-text text-muted">Enter a Brand Name.</small>
                </div>
                <div class="form-group">
                  
                  <input type="file" class="form-control dropify" name="Brand_logo"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Name">
                  <small id="emailHelp" class="form-text text-muted">Enter a Brand logo.</small>
                </div>
                
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Brand</button>

        </div>
    </form>
      </div>
    </div>
  </div>
<!-- Modal for edit data -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Brand Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            
       
        <form method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="modal-body">

          
          <div class="form-group">
                  
            <input type="text" class="form-control" id="e_brand_name" name="Brand_name" aria-describedby="emailHelp" placeholder="Enter a Name">
            <small id="emailHelp" class="form-text text-muted">Enter a Brand Name.</small>
          </div>
          <div class="form-group">
            
            <input type="file" class="form-control dropify" id="e_brand_logo" name="Brand_logo"  aria-describedby="emailHelp" placeholder="Enter a Name">
            <small id="emailHelp" class="form-text text-muted">Enter a Brand logo.</small>
          </div>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit Brand</button>

        </div>
        <input type="hidden" id="e_brand_id" name="id">
        <input type="hidden" id="e_old_brand_logo" name="old_logo">
    </form>
   
      </div>
    </div>
  </div>
  @push('script')
      
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- for dropify --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- for dropify --}}


  <script>
    $('body').on('click','.edit',function(){
      // let cat_id = $(this).data('id');
      let brand_id = $(this).attr('data-id');

      // alert(cat_id);
      $.get("brand/edit/"+brand_id,function(data){
        $('#e_brand_name').val(data.brand_name);
        $('#e_old_brand_logo').val(data.brand_logo);
        // $('#e_subcatagory_name').val(data.Subcatagory_name);
        // $('#e_subcatagory_id').val(data.Subcatagory_id);
        // $('#e_childcatagory_name').val(data.Childcatagory_name);
        $('#e_brand_id').val(data.id);
        console.log(data)

      });
    });
  </script>
  <script>
    $(function childcatagory(){
        var table=$('.ytable').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('brand.index')}}",
            columns:[
              {data:'DT_RowIndex',name:'DT_RowIndex'},
              {data:'brand_name',name:'brand_name'},
              {data:'brand_slug',name:'brand_slug'},
              {data:'brand_logo',name:'brand_logo',render:function(data,type,full,meta){
                return "<img src=\""+data+"\" width=\"120\" height=\"35\" />";
              }},
              {data:'action',name:'action',orderable:true,searchable:true},
            ]
            // console.log(data);
        });
    });
  </script>
  {{-- for dropify --}}
  <script>
    $('.dropify').dropify();
  </script> 
  {{-- for dropify

  @endpush 

@endsection    