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
              <li class="breadcrumb-item"><a href="#">Pages</a></li>
              <li class="breadcrumb-item active">Show Pages</li>
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
                      <h3 class="card-title">DataTable with default features</h3>
                      <button class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add Category</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial Number</th>
                          <th>Page Name</th>
                          <th>Page Title</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach ($pages as $key=>$items)
                          
                      <tr>
                        <td>{{++$key}}</td>
                        <td>{{$items->page_name}} </td>
                        <td>{{$items->page_title}}</td>
                        <td class="d-flex"> <a href="#" class="btn btn-sm btn-info mx-2 edit" data-id =" {{$items->id}}" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                            {{-- <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                            <form action="{{route('page.delete',$items->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                {{-- <input type="hidden" name="_method" value="delete"> --}}
                                <button type="submit" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        {{-- <i class="fas fa-edit"> --}}
                      </tr>
                      @endforeach      
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
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
          <h5 class="modal-title" id="exampleModalLabel">Category Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('page.store')}}">
            @csrf
        <div class="modal-body">
           
                <div class="form-group">
                  
                 <label class="form-text text-muted" for="">Page Position</label>
                 <select class="form-control"  name="page_position" id="">
                  <option value="1">page one</option>
                  <option value="2">page two</option>
                 </select>
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="page_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a page Name" required>
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="page_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a page Title" required>
                </div>
                <div class="form-group">
                  <textarea name="page_description" id="" cols="63" rows="5"></textarea>
                  <small id="emailHelp" class="form-text text-muted">Enter text there</small>
                </div>
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add categories</button>

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
          <h5 class="modal-title" id="exampleModalLabel">Category Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            
       
        <form method="POST" action="{{route('catagory.update')}}">
            @csrf
            @method('put')
        <div class="modal-body">
           

                <div class="form-group">
                  
                  <label class="form-text text-muted" for="">Page Position</label>
                  <select class="form-control"  name="page_position" id="">
                   <option value="1">page one</option>
                   <option value="2">page two</option>
                  </select>
                 </div>
                 <div class="form-group">
                   
                   <input type="text" class="form-control" name="page_name" id="e_page_name" aria-describedby="emailHelp" placeholder="Enter a page Name" required>
                 </div>
                 <div class="form-group">
                   
                   <input type="text" class="form-control" name="page_title" id="e_page_title" aria-describedby="emailHelp" placeholder="Enter a page Title" required>
                 </div>
                 <div class="form-group">
                   <textarea name="page_description" id="e_page_description" cols="63" rows="5"></textarea>
                   <small id="emailHelp" class="form-text text-muted">Enter text there</small>
                 </div>
                 <input type="hidden" id="e_catagory_id"name="id">
               
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add categories</button>

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
      let page_id = $(this).attr('data-id');
      // alert(page_id);
      $.get("pages/edit/"+page_id,function(data){
        $('#e_page_name').val(data.page_name);
        $('#e_page_position').val(data.page_position);
        $('#e_page_title').val(data.page_title);
        $('#e_page_description').val(data.page_description);
        $('#e_page_id').val(data.id);
        console.log(data.id)

      });
    });
  </script>

  @endpush 

@endsection    