@extends('layouts.home_app')

@section('admin_contain')

@push('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="{{asset('backend')}}/plugins/dropify/dropify.css"> --}}


    
@endpush

 <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="POST" id="myform" action="{{route('product.store')}}" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <!-- left column -->
          <div class="col-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Product Name <span class="text-danger">*</span></label>
                          <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name " required>
                        </div>
                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Product Code <span class="text-danger">*</span></label>
                          <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Code" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Catagory/Subcatagory<span class="text-danger">*</span></label>
                          <select  class="form-control" name="subcategory_id" id="subcategory_id" required>
                            <option disabled style="color:rgb(236, 17, 17)" selected value="">Select Subcategory</option>
                            @foreach ($category as $item)
                            @php
                                
                                $subcatagory = DB::table('subcatagories')->where('Catagory_id',$item->id)->get();
                            @endphp
                                
                            <option disabled style="color:blue" value="">{{$item->Catagory_name}}</option>
                            @foreach ($subcatagory as $row)
                            <option  value="{{$row->id}}">---{{$row->Subcatagory_name}}</option>
                                
                            @endforeach
                            @endforeach
                          </select>
                    
                        </div>
                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Child Catagory <span class="text-danger">*</span></label>
                          <select  class="form-control" name="childcategory_id" id="childcategory_id">
                          
                            
                          </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Brand<span class="text-danger">*</span></label>
                          <select  class="form-control" name="brand_id" id="brand" required>

                              @foreach ($brand as $item)
                              
                                  
                              <option  value="{{$item->id}}">{{$item->brand_name}}</option>
                            
                              @endforeach
                            </select>
                      
                           
                          </select>
                    
                        </div>
                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Pickup Point</label>
                          <select  class="form-control" name="pickup_point_id" id="pickup_point_id">
                            @foreach ($pickup_point as $item)
                              
                                  
                            <option  value="{{$item->id}}">{{$item->pickup_point_name}}</option>
                          
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Unit<span class="text-danger">*</span></label>
                          <input type="text"  name="unit" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name " required>
                    
                        </div>
                        <div class=" col-6 form-group d-flex flex-column">
                            <label for="exampleInputEmail1">Tags</label>
                            <input type="text" name="tags" class="form-control"  data-role="tagsinput" id="tags">
                          </div>
                    </div>

                    <div class="row">

                        <div class=" col-4 form-group">
                          <label for="exampleInputEmail1">Purchase Price</label>
                          <input type="text" name="purchase_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Purchase Price ">
                        </div>
                        <div class=" col-4 form-group">
                          <label for="exampleInputEmail1">Selling Price <span class="text-danger">*</span></label>
                          <input type="text"  name="selling_price" class="form-control" id="exampleInputEmail1" required placeholder="Enter Selling Price">
                        </div>
                        <div class=" col-4 form-group">
                          <label for="exampleInputEmail1">Discount Price</label>
                          <input type="text" name="discount_price" class="form-control" id="exampleInputEmail1" placeholder="Enter Discount Price">
                        </div>
                    </div>
                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Warehouse<span class="text-danger">*</span></label>
                          <select  class="form-control" name="warehouse_id" id="warehouse_id">
                            
                            @foreach ($warehouse as $item)
                              
                                  
                            <option  value="{{$item->id}}">{{$item->ware_name}}</option>
                          
                            @endforeach
                            
                          </select>
                    
                        </div>
                        <div class=" col-6 form-group">
                            <label for="exampleInputEmail1">Stock</label>
                            <input type="text" class="form-control" name="stock_quantity" id="exampleInputEmail1" placeholder="Enter Stock">
                          </div>
                    </div>

                    <div class="row">

                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Color <span class="text-danger">*</span></label><br>
                          {{-- <input type="text" data-role="tagsinput" class="form-control"   name="" id=""  placeholder="Enter Size"> --}}
                          <input type="text" name="color" data-role="tagsinput" class="form-control" id="exampleInputEmail1" required>
                        </div>
                        <div class=" col-6 form-group">
                          <label for="exampleInputEmail1">Size </label><br>
                          <input type="text" name="size" data-role="tagsinput" class="form-control" id="exampleInputEmail1">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Details <span class="text-danger">*</span></label>
                        <textarea name="description" id="" class=" summernote" required ></textarea>
                      </div>

                      
                      <div class="row">
                        <div class="form-group col-lg-12">
                          <label for="exampleInputPassword1">Video Embed Code</label>
                          <input class="form-control" name="video" value="{{ old('video') }}" placeholder="Only code after embed word">
                          <small class="text-danger">Only code after embed word</small>
                        </div>
                      </div>
                      

               
                </div>
                <!-- /.card-body -->

             
              
            </div>
            <!-- /.card -->
          </div>

          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-4">
            <!-- Form Element sizes -->
            <div class="card card-success">
              {{-- <div class="card-header">
                <h3 class="card-title">Different Height</h3>
              </div> --}}
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Main Thumbnail <span class="text-danger">*</span> </label><br>
                    <input type="file" name="thumbnail" required="" accept="image/*" class="dropify">
                  </div>
                <br>
                <div class="">  
                    <table class="table table-bordered" id="dynamic_field">
                    <div class="card-header">
                      <h3 class="card-title">More Images (Click Add For More Image)</h3>
                    </div> 
                      <tr>  
                          <td><input type="file" accept="image/*" name="images[]" class="form-control name_list" /></td>  
                          <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
                      </tr>  
                    </table>    
                  </div>
                  <div class="card p-4">
                    <h6>Featured Product</h6>
                   <input type="checkbox" name="featured" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                 </div>

                 <div class="card p-4">
                    <h6>Todays Deal</h6>
                   <input type="checkbox" name="today_deal" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                 </div>
                 <div class="card p-4">
                  <h6>Slider Product</h6>
                 <input type="checkbox" name="product_slider" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success">
               </div>

               <div class="card p-4">
                  <h6>Trendy Product</h6>
                 <input type="checkbox" name="trendy" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success">
               </div>

                 {{-- <div class="card p-4">
                    <h6>Trendy Product</h6>
                   <input type="checkbox" name="trendy" value="1"  data-bootstrap-switch data-off-color="danger" data-on-color="success">
                 </div> --}}

                 <div class="card p-4">
                    <h6>Status</h6>
                   <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                 </div>
                {{-- <input class="form-control" type="text" placeholder="Default input">
                <br>
                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm"> --}}
                
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (right) -->
        
           
            <button id="button"   class="btn  btn-info ml-2">Submit</button>



        </div>
    </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> 
  <!-- /.content-wrapper -->

@endsection

@push('script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script> --}}
<script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
{{-- <script src="{{ asset('backend') }}/plugins/dropify/dropify.js"></script> --}}
{{-- <script type="text/javascript" src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> --}}
    <script>
      $('.bg_color_control').removeClass('dark-mode');
    </script>
    <script>
      $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
    </script>
    <script>
        // $('.dropify').dropify();
     





$(document).ready(function(){      
       var postURL = "<?php echo url('addmore'); ?>";
       var i=1;  


       $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="images[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
       });  

       $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
       });  
     }); 

    </script>


    {{-- ajax request for collect child catagory  --}}
    
    
    
    <script>
      $('#subcategory_id').change(function(){
        // let sub_id = $(this).data('id');
        // let cat_id = $(this).attr('data-id');
        let sub_id = $(this).val();
        //  alert(sub_id);
        $.get("/get-child-category/"+sub_id,function(data){
          $('select[name=childcategory_id]').empty();
          $.each(data,function(key,data){
            // $('select[name="childcategory_id"]').append('<option value="'+ data.id +'">'+ data.childcategory_name +'</option>');
            $('select[name="childcategory_id"]').append('<option value="'+ data.id +'">'+ data.Childcatagory_name+'</option>');
          })
          
            console.log(data);
         });
      });
      const form = document.getElementById('myform');
      form.addEventListener('keypress',function (e){
        // alert("moon");
        if(e.keyCode==13)
        {
          // alert('moon');
          e.preventDefault();
        }
      });
    </script>
    {{-- <script>
     $("#subcategory_id").change(function(){
      var id = $(this).val();
      $.ajax({
           url: "{{ url("/get-child-category/") }}/"+id,
           type: 'get',
           success: function(data) {
            // console.log(data);
                $('select[name="childcategory_id"]').empty();
                   $.each(data, function(key,data){
                    // console.log(data.id);
                      $('select[name="childcategory_id"]').append('<option value="'+ data.id +'">'+ data.Childcatagory_name +'</option>');
                });
           }
        });
     });
    </script> --}}
   
@endpush