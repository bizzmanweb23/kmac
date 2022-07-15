@extends("Admin.layout.main")
@section("content")
<div class="row">
    <div class="col-sm-4 col-3">
            <h4 class="page-title">Employee Leave</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('emp.leave.form') }}" class="btn btn btn-primary float-right" id="add">
        <i class="fa fa-plus mr-1"></i> Add New</a>
 
    </div>
</div>
<div class="card">
    <div class="card-body">
    <table class="table table-sm table-bordered display compact" id="example">
<thead>
 
<th>Action</th>
<th>Document</th>
<th>Leave Type</th> 
<th>Employee</th>
<th><i class="fa fa-calendar"></i> Request Duration</th> 
<th><i class="fa fa-calendar"></i> Applied On</th>
<th>Status</th>
<th>Change Status</th> 
</thead>
<tbody>
@foreach($fields as $key => $value)
<tr>
<td>
    <a class="dropdown-item  delete-leave" href="javascript:void(0)" val="{{$value->leave_id}}">
    <i class="fa fa-trash mr-1"></i>    
    Delete</a>    
    <!-- <a class="dropdown-item  " href="#" val="{{$value->leave_id}}">
    <i class="fa fa-edit mr-1"></i>    
    Edit</a> -->
    <a class="dropdown-item view-leave" id="view" data-toggle="modal" data-target="#view-modal" 
       href="javascript:void(0)" val="{{$value->leave_id}}">
    <i class="fa fa-eye mr-1"></i>    
    View</a>
    
</td>
<td>
<img src="{{ url('/public/storage/leave_attachment').'/'.$value->leave_attachment}}" width="100" class='rounded'>
</td>   
<td>{{$value->type_name}}</td>
<td>{{$value->first_name.' '.$value->last_name}}</td>
<td>{{ $value->period }}</td>
<td>{{$value->applied_on}}</td>
<td> 
@if($value->status_id == 1)  
<a class="custom-badge status-green " href="#">
  {{$value->status_name}}
</a> 
@endif
@if($value->status_id == 2)  
<a class="custom-badge status-blue  " href="#" >
    {{$value->status_name}}
</a> 
@endif
@if($value->status_id == 3)  
<a class="custom-badge status-red " href="#">
     {{$value->status_name}}
</a> 
@endif  
</td>
<td>
<div class="dropdown ">
<a class="custom-badge status-blue dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
    Choose Action
</a>

<div class="dropdown-menu dropdown-menu-right"> 
    <a class="dropdown-item pending" href="javascript:void(0)" val="{{$value->leave_id}}" code="1" >Aproove</a>
    <a class="dropdown-item pending" href="javascript:void(0)" val="{{$value->leave_id}}" code="2" >Pending</a>
    <a class="dropdown-item pending" href="javascript:void(0)" val="{{$value->leave_id}}" code="3" >Declined</a>
</div>
</div>
</td>
</tr>
@endforeach         

</tbody>
</table>
</div>
</div> 

<!-- Modal -->
<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Leave Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-lg table-bordered">
              <tbody class="view-body" style="font-size: 11pt;">
                  
              </tbody>
          </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            <i class="fa fa-remove"></i>
            Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection
@section("javascript")
<script>
$(document).ready(function(){
      
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#example').DataTable();
    //delete 
$(document).on('click', '.delete-leave', function(e){
    e.preventDefault();
    var cnf = confirm('DELETED WILL NOT BE RECOVERED');
    if(!cnf){

    } else { 
    $id= $(this).attr('val');
    
    $.ajax({
        url: "{{ url('delete/leave') }}",
        type : "POST",
        data : {id: $id},
        dataType: "Json",
        success : function(data)
        {
            document.location.reload();
            console.log(data);
        }
    });
}
});
//view
$(document).on('click', '.view-leave', function(e){
    e.preventDefault();
    $id = $(this).attr('val');
    $('.view-body').empty();
    $.ajax({
        url : "{{url('view/leave')}}",
        type : "post",
        dataType: "Json",
        data : {id: $id},
        success: function(response)
        {    
            $.each(response, function(key , values){
             
            if(values.status_id == 1){
                $b = 'bg-success text-white';
                $status = 'Aprooved';
            }
            if(values.status_id == 2){
                $b = 'bg-primary text-white';
                $status = 'Pending';
            }
            if(values.status_id == 3){
                $b = 'bg-danger text-white';
                $status = 'Declined';
            }
             
            $rows = '<tr><td>Employee: </td><td>'+values.first_name+' '+values.last_name+'</td></tr>';          
            
            $rows += '<tr><td>Company name: </td><td>'+values.trading_name+'</td></tr>';
            
            $rows += '<tr><td>Leave From: </td><td>'+values.from_date+'</td></tr>';          
            $rows += '<tr><td>Leave To: </td><td>'+values.to_date+'</td></tr>';          
            $rows += '<tr><td>Leave Period: </td><td>'+values.period+'</td></tr>'; 
            $rows += '<tr><td>Leave Type : </td><td>'+values.type_name+'</td></tr>'; 
            $rows += '<tr><td>Leave Status : </td><td class='+$b+'>'+$status+'</td></tr>'; 
            
            });
            $('.view-body').append($rows);
             
// $.each(response, function(key , value){
            //     $('.employee').text(value.first_name+' '+value.last_name);
            //     $('.company').text(value.trading_name);
            //     $('.leave-from').text(value.from_date);
            //     $('.leave-to').text(value.to_date);
            //     $('.leave-period').text(value.period);
            //     $('.leave-type').text(value.type_name);
                
            //     console.log(value);

            // });
        }
    });
});
//change status
$('.pending').click(function(){
        var $id = $(this).attr('val');
        var $code = $(this).attr('code');
         
         $.post(
                '{{ url("change/leave/status") }}',
         {     
                id: $id,
                code: $code,
         }
         ).done(function(data)
                {
                document.location.reload();
                 
                }
        ).success(
                function(data)
                {
                        alert(data);
                }
        );
        
 });

});
</script>
@endsection
