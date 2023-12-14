<form id="edit_form" method="POST" action="{{route('coupon.update')}}">
    @csrf @method('put')
<div class="modal-body">

        <div class="form-group">
          
          <input type="text" class="form-control" name="coupon_code" value="{{$data->coupon_code}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Coupon Code">
          <small id="emailHelp" class="form-text text-muted">Enter a Coupon Code.</small>
        </div>
        <input type="hidden" value="{{$data->id}}" name="id">

        <div class="form-group">
          
          <select class="form-control" name="coupon_type" id="">
              <option value="1" @if($data->type==1) selected  @endif>fixed</option>
              <option value="2" @if($data->type==2) selected  @endif>percentage</option>
          </select>
          <small id="emailHelp" class="form-text text-muted">Select Coupon type.</small>
        </div>
        
        <div class="form-group">
          
          <input type="date" class="form-control" value="{{$data->valid_date}}" name="valid_date" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Date">
          <small id="emailHelp" class="form-text text-muted">Untill which date the coupon will be valideated.</small>
        </div>

        <div class="form-group">
          
          <input type="text" class="form-control" value="{{$data->coupon_amount}}" name="coupon_amount" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a Amount">
          <small id="emailHelp" class="form-text text-muted">Enter the coupon Amount.</small>
        </div>

        <div class="form-group">
          
          <select class="form-control" name="status" id="">
              <option value="inactive" @if($data->status=="inactive") selected  @endif>inactive</option>
              <option value="active" @if($data->status=="active") selected  @endif >active</option>
          </select>
          <small id="emailHelp" class="form-text text-muted">Select Coupon type.</small>
        </div>
        
        
       
     
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Edit coupon</button>

</div>
</form>

<script>
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
</script>

