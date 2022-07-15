@extends('Admin.layout.main')
@section('content')
<div class="row mt-5 ">
    <div class="col">
            <h4 class="page-title">Update Employee</h4>
    </div>
    <div class="col">
            <a href="{{ url('employee') }}" class="btn btn btn-primary float-right" id="back">
                    <i class="fa fa-backward mr-1"></i> Back</a>
    </div>
</div> 
<div class='row'>
<div class="col-8 offset-2">
@foreach($result as $values)
<form  method="post" id="update-form"  > 
@csrf
  
<input type="hidden" name="userid" id="user-id" class="user-id"  >
   
<div class="row mt-3">
    <div class="col-md-6">
        <label>First Name</label>
        <input type="text" name="first-name" id="first-name" 
               class="form form-control form-sm" placeholder="First Name" value="{{$values->first_name}}"></input>   
    </div>
     <div class="col-md-6">
         <label>Last Name</label>
        <input type="text" name="last-name" id="last-name" 
               class="form form-control form-sm" placeholder="Last Name" value="{{$values->last_name}}"></input>   
    </div> 
</div> 

<div class="row mt-3">
   
     <div class="col-md-6">
        <label>Date of Joining</label>
        <input type="date" name="date-of-joining" class="form form-control form-sm"
               placeholder="Date of Joining" value="{{$values->date_of_joining}}" ></input>   
    </div>
     <div class="col-md-6">
        <label>Contact Number</label>
        <input type="text" name="contact-number" id="contact-number" 
               class="form form-control form-sm" placeholder="Contact Number" value="{{$values->emp_contact}}"></input>   
    </div> 
</div> 

<div class="row mt-3"> 
    <div class="col-md-6">
         <label>Company</label>
       <select class="form-control" name="company" required='required'>
           @foreach($company as $values)
           <option value="{{@$values->company_id}}">{{@$values->trading_name}}</option>
           @endforeach
       </select>
    </div>
     <div class="col-md-6">
        <label>Role</label>
        <select class="form-control" name="role-id" required='required'>
           @foreach($roles as $values)
           <option value="{{@$values->role_id}}">{{@$values->role_name}}</option>
           @endforeach
        </select> 
    </div> 
</div> 
<br>
<div class="row">
    <div class="col">
        <div class="form-group">
             <label>Email</label>
        <input type="email" name="email" 
               id="email" class="form form-control form-sm" 
               placeholder="Email"></input>   
        </div> 
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label>Address</label>
        <textarea type="text" name="address"  id="address" rows="7" 
                  class="form form-control form-sm" placeholder="Address" value="{{$values->address}}"> 
        </textarea>   
    </div>

</div>
<div class="mt-3 text-right">
    <button type="button" class="btn btn-danger  "  data-dismiss="modal" > 
    Cancel</button>
    <button type="button" class="btn btn-primary update-emp"  id="update-emp">
        <i class="fa fa-check-square mr-2"></i>Update </button>
</div>
</form>
@endforeach
</div>
</div>
@endsection
@section('javascript')
<script>
$(document).ready(function(){

        $('.edit').click(function(){ 
        id = $(this).attr('val');
        $.ajax({ 

            url : '{{ url("employee/edit") }}',
            type :"POST",
            data: {id:id}, 
            dataType: 'Json',
            success: function(data){
                
                $.each(data, function(key, value){
                    alert(value);
                    console.log(value.employee_id);
                                   });
            }
        }); 

    }); 
});
</script>
@endsection