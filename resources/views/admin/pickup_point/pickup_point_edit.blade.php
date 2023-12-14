<form id="edit_form" method="POST" action="{{route('pickup_point.update')}}">
    @csrf @method('put')
<div class="modal-body">

        <div class="form-group">
          
          <input type="text" class="form-control" name="pickup_point_name" value="{{$data->pickup_point_name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a pickup point name">
          <small id="emailHelp" class="form-text text-muted">Enter a pickup point name.</small>
        </div>

        <div class="form-group">
          
          <input type="text" class="form-control" name="pickup_point_address" value="{{$data->pickup_point_address}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  pickup point address">
          <small id="emailHelp" class="form-text text-muted">Enter a pickup point address.</small>
        </div>

        <div class="form-group">
          
          <input type="text" class="form-control" name="pickup_point_phone" value="{{$data->pickup_point_phone}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  a pickup point phone">
          <small id="emailHelp" class="form-text text-muted">Enter a pickup point phone.</small>
        </div>

        <div class="form-group">
          
          <input type="text" class="form-control" name="pickup_point_phone_two" value="{{$data->pickup_point_phone_two}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter an another pickup point phone">
          <small id="emailHelp" class="form-text text-muted">Enter an another pickup point phone.</small>
        </div>

        <input type="hidden" value="{{$data->id}}" name="id">        
           
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Update Pickup Points</button>

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
      // console.log(data);
      toastr.success(data);
      $('#edit_form')[0].reset();
      $('#EditModal').modal('hide');
      table.ajax.reload();
    }
  });
  

});
</script>

