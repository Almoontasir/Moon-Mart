@extends('layouts.home_app')

@section('admin_contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All pickup points</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">pickup points</a></li>
              <li class="breadcrumb-item active">Show pickup points</li>
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
                      <h3 class="card-title">DataTable for pickup points</h3>
                      <button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add Pickup Points</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="" class="table table-bordered table-striped ytable">
                        <thead>
                        <tr>
                          
                          <th>Serial Number</th>
                          <th>Pickup Point</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Backup Phone</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- <th>Moon</th> --}}

                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Browser</th>
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

</div>

<form id="deleted_form"  action="" method="POST">
  @csrf @method('DELETE')
  {{-- <input type="hidden" name="_token" value="'. csrf_token().'" />
  <input type="hidden" name="_method" value="delete"> --}}
 {{-- <button id="delete_coupon"  class="btn btn-sm btn-danger deleteYazra"><i class="fas fa-trash"></i></button> --}}
</form>


<!-- Modal for add data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add pickup points</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     <form id="add_form" method="POST" action="{{route('pickup_point.store')}}">
            @csrf
        <div class="modal-body">
        
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="pickup_point_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a pickup point name">
                  <small id="emailHelp" class="form-text text-muted">Enter a pickup point name.</small>
                </div>
                
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="pickup_point_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  pickup point address">
                  <small id="emailHelp" class="form-text text-muted">Enter a pickup point address.</small>
                </div>
                

                <div class="form-group">
                  
                  <input type="text" class="form-control" name="pickup_point_phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  a pickup point phone">
                  <small id="emailHelp" class="form-text text-muted">Enter a pickup point phone.</small>
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="pickup_point_phone_two" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter an another pickup point phone">
                  <small id="emailHelp" class="form-text text-muted">Enter an another pickup point phone.</small>
                </div>   
                                         
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add pickup points</button>

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
          <h5 class="modal-title" id="exampleModalLabel">Edit pickup points</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

           <div id="modal-body">
            
          
          </div> 
       
        {{-- <form method="POST" action="{{route('warehouse.update')}}">
            @csrf
            @method('put')
        <div class="modal-body">

            <div class="form-group">
                  
                <input type="text" class="form-control" id="e_warehouse_name" name="ware_name"  aria-describedby="emailHelp" placeholder="Enter a Name">
                <small id="emailHelp" class="form-text text-muted">Enter a Warehouse Name.</small>
              </div>
              <div class="form-group">
                
               <textarea name="ware_address" id="e_warehouse_address" cols="63.5" rows="3"></textarea>
                <small id="emailHelp" class="form-text text-muted">Enter a Warehouse Address.</small>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="ware_phone" id="e_warehouse_phone" aria-describedby="emailHelp" placeholder="Enter a phone Number">
                <small id="emailHelp" class="form-text text-muted">Enter a Warehouse phone Number.</small>
              </div>
              <input type="hidden" id="e_warehouse_id" name="id">
              
               
             
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit Subcategories</button>

         </div>
        </form> --}}
   
      </div>
    </div>
  </div>
  @push('script')
      
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  {{-- <script>
    $('body').on('click','.edit',function(){
      // let cat_id = $(this).data('id');
      let warehouse_id = $(this).attr('data-id');

      // alert(cat_id);
      $.get("warehouse/edit/"+warehouse_id,function(data){
        $('#e_warehouse_name').val(data.ware_name);
        $('#e_warehouse_address').val(data.ware_address);
        $('#e_warehouse_phone').val(data.ware_phone);
        $('#e_warehouse_id').val(data.id);
        console.log(data);

      });
    });
  </script> --}}
  <script>
    $('body').on('click','.edit',function(){
      // let cat_id = $(this).data('id');
      // let pickup_point_id = $(this).attr('data-id');
      let pickup_point_id = $(this).attr('id');

      // alert(cat_id);
      $.get("pickup_point/edit/"+pickup_point_id,function(data){
        $('#modal-body').html(data);
        // console.log(data);

      });
    });
  </script>
  <script>
    $(function pickup(){
         table=$('.ytable').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('pickup_point.index')}}",
            columns:[
              {data:'DT_RowIndex',name:'DT_RowIndex'},
              {data:'pickup_point_name',name:'pickup_point_name'},
              {data:'pickup_point_address',name:'pickup_point_address'},
              {data:'pickup_point_phone',name:'pickup_point_phone'},
              {data:'pickup_point_phone_two',name:'pickup_point_phone_two'},
              {data:'action',name:'action',orderable:true,searchable:true},
            ]
            // console.log(data);
        });
    });
  </script>

  <script>
      // data passing
  $('#add_form').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var request = $(this).serialize();
    $.ajax({
      url:url,
      type:'Post',
      async:false,
      data:request,
      success:function(data){
        console.log(data);
        toastr.success(data);
        $('#add_form')[0].reset();
        $('#addModal').modal('hide');
        table.ajax.reload();
      }
    });
    

  });

  
  </script>

  {{-- <script>
    $('#edit_form').submit(function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var request = $(this).serialize();
    $.ajax({
      url:url,
      type:'Post',
      async:false,
      data:request,
      success:function(data){
        console.log(data);
        toastr.success(data);
        $('#edit_form')[0].reset();
        $('#EditModal').modal('hide');
        table.ajax.reload();
      }
    });
    

  });
  </script> --}}

  @endpush 

@endsection    