@extends('layouts.home_app')

@section('admin_contain')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All ChildCatagories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Subcategories</a></li>
              <li class="breadcrumb-item active">Show ChildCategories</li>
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
                      <h3 class="card-title">DataTable for Childcatagories</h3>
                      <button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add ChildCategory</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="" class="table table-bordered table-striped ytable">
                        <thead>
                        <tr>
                          <th>Serial Number</th>
                          <th>Category Name</th>
                          <th>SubCategory Name</th>
                          <th>ChildCategory Name</th>
                          <th>SubCategory Slug</th>
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


     
<!-- Modal for add data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('childcatagory.store')}}">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <select name="Subcatagory_id" id="" class="form-control">
                    @foreach ($catagory as $items)
                        
                    <option>{{$items->Catagory_name}}</option>
                    @php
                        $sub = DB::table('subcatagories')->where('Catagory_id',$items->id)->get();
                    @endphp
                    @foreach ($sub as $item)
                    <option value="{{$item->id}}" selected>__{{$item->Subcatagory_name}}</option>
                    @endforeach
                    @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted">Select a category.</small>
              </div>
           
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="Childcatagory_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Name">
                  <small id="emailHelp" class="form-text text-muted">Enter a Subcategory Name.</small>
                </div>
                
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Childcategories</button>

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
          <h5 class="modal-title" id="exampleModalLabel">Edit Childcategory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            
       
        <form method="POST" action="{{route('childcatagory.update')}}">
            @csrf
            @method('put')
        <div class="modal-body">

            <div class="form-group">
                  
                <input type="text" class="form-control" name="Catagory_name" id="e_catagory_name" value =" "
                aria-describedby="emailHelp" placeholder="Enter a Name" readonly>
                <input type="hidden" id="e_catagory_id"name="Catagory_id">
                
                {{-- <select name="catagory_id" id="">
                    <option value="" id="e_catagory_name"></option>
                </select> --}}
                {{-- <small id="emailHelp" class="form-text text-muted">Enter a Subcategory Name.</small> --}}
              </div>
           
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="Subcatagory_name" id="e_subcatagory_name" value =" "
                  aria-describedby="emailHelp" placeholder="Enter a Name" readonly>
                  <input type="hidden" id="e_subcatagory_id"name="Subcatagory_id" >
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="Childcatagory_name" id="e_childcatagory_name" value =" "
                  aria-describedby="emailHelp" placeholder="Enter a Name">
                  <small id="emailHelp" class="form-text text-muted">Enter a Childcategory Name.</small>
                  <input type="hidden" id="e_childcatagory_id"name="id">
                </div>
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>

        </div>
    </form>
   
      </div>
    </div>
  </div>
  @push('script')
      
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('body').on('click','.edit',function(){
      // let cat_id = $(this).data('id');
      let childcat_id = $(this).attr('data-id');

      // alert(cat_id);
      $.get("childcatagory/edit/"+childcat_id,function(data){
        $('#e_catagory_name').val(data.Catagory_name);
        $('#e_catagory_id').val(data.Catagory_id);
        $('#e_subcatagory_name').val(data.Subcatagory_name);
        $('#e_subcatagory_id').val(data.Subcatagory_id);
        $('#e_childcatagory_name').val(data.Childcatagory_name);
        $('#e_childcatagory_id').val(data.id);
        console.log(data)

      });
    });
  </script>
  <script>
    $(function childcatagory(){
        var table=$('.ytable').DataTable({
            processing:true,
            serverSide:true,
            ajax:"{{route('childcatagory.index')}}",
            columns:[
              {data:'DT_RowIndex',name:'DT_RowIndex'},
              {data:'Catagory_name',name:'Catagory_name'},
              {data:'Subcatagory_name',name:'Subcatagory_name'},
              {data:'Childcatagory_name',name:'Childcatagory_name'},
              {data:'Childcatagory_slug',name:'Childcatagory_slug'},
              {data:'action',name:'action',orderable:true,searchable:true},
            ]
            // console.log(data);
        });
    });
  </script>

  @endpush 

@endsection    