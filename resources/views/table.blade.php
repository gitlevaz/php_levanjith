@extends('layouts.app')
@section('content')
@include('module.editmodle')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">



<div class="container">
  <h2>Sales Person List</h2><br><br>
  <a href="{{url('home')}} "class="addmem btn btn-primary">Add New Member</a>
  <a href="{{url('add_route')}} "class="addmem btn btn-primary">Add Route</a>

  <table id="view_table"  class="table table-striped table-bordered view_table" style="width: 100%;">

    
    <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>TelePhone</th>
          <th>JoinDate</th>
          <th>Action</th>
        </tr>
      </thead>
  
            <tbody  class="tbody-light">
                    
          </tbody>
        </table>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script type="text/javascript">

 var datatable = $('#view_table').DataTable({
  processing: true,
  serverSide: true,
  ajax: '{{url('get-clients')}}',
  columns: [
      {data: 'id', name: 'id'}, 
      {data: 'name', name: 'name'},
      {data:'email', name:'email'},
      {data:'tele_no', name:'tele_no'},
      {data:'join_date', name:'join_date'},
      {data: 'action', name: 'action', orderable: false}
  ],
});


function abcd(id){
  $('#ok').css('display', 'inline')
}

//edit
$('.view_table').on('click', '.btn-edit', function(){
  var av_id = $(this).data('id')
//   getDoctor(av_id)
// })
// function getDoctor(av_id){
  $.ajax({
    url: '{{url('get-client-id')}}/'+av_id,
    type: 'GET'
  })
  .done(function(data){
    console.log(data);
    $('#av_id').val(av_id)  
    editodal(data)
  })
})

function editodal(data){
  $('#ids').val(data.id)
  $('#name').val(data.name)
  $('#name').val(data.name)
  $('#tele_no').val(data.divition)
  $('#tele_no').val(data.tele_no)
  $('#join_date').val(data.join_date)
  $('#comments').val(data.comments)
}

//update
$('#btnEditAvailable').on('click', function(){
  var formData = $('.change-client').serialize()
  console.log(formData);
  $.ajax({
    url: '{{url('change-client')}}',
    type: 'POST',
    data: formData
  })
  .done(function(data){
    if(data.msg){
      swal({
        text: data.msg,
        icon: 'success'
      })
      datatable.ajax.reload()
      clearModal()
      $('#addAvailableModal').modal('hide')
    }
    if(data.errors){
      swal({
       text: data.errors[0],
       icon: 'warning'
      })
    }
  })
})

function clearModal(){
  $('.input-cl').val('')

}

//delete
$('.view_table').on('click', '.btn-delete', function(){
  var av_id = $(this).data('id')
  if(confirm('Are you sure you want to Delete?')){
      $.ajax ({
      url:'{{url('client-del')}}/'+av_id,
      type:'GET'
    })

    .done(function(data){
    if(data.msg){
      swal({
        text: data.msg,
        icon: 'success'
      })
      datatable.ajax.reload()
      clearModal()
      $('#addAvailableModal').modal('hide')
    }
    if(data.errors){
      swal({
       text: data.errors[0],
       icon: 'warning'
      })
    }
  })

  }
  else{}

})


</script>
{{-- <style>
  .addmem {
  position: absolute;
  left: 380px;
}
  </style> --}}
@endsection
