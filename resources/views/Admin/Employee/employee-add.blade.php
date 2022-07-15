@extends("Admin.layout.main")
@section("content") 
<div class="row mt-5">
    <div class="col-sm-4 col-3">
            <h4 class="page-title"> Add Employee</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('emp.add') }}" class="btn btn btn-primary float-right" id="back">
                    <i class="fa fa-backward mr-1"></i> Back</a>
    </div>
</div>
<section class="container my-3 mb-5">
<div class="row">
    <div class="col-md-10 offset-1">
 
<form  method="post" id="add-emp-form"  >
@csrf
<div class="row mt-3">
    <div class="col">
        <label>First Name</label>
        <input type="text" name="first-name" class="form form-control form-sm" placeholder="First Name"></input>   
    </div>
     <div class="col">
        <label>Last Name</label>
        <input type="text" name="last-name" class="form form-control form-sm" placeholder="Last Name"></input>   
    </div> 
</div> 
 
<div class="row mt-3">
    <div class="col">
       <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="date-of-birth" class="form form-control form-sm" placeholder="Date of Birth" /> 
       </div> 
    </div>

    <div class="col">
        <div class="form-group">
             <label>Contact Number</label>
        <input type="text" name="contact-number" class="form form-control form-sm contact-number" placeholder="Contact Number">
        </div>     
    </div>
</div>  

<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Company</label>
        <select name="company-id" class="form form-control"> 
            @foreach($company as $comp)
            <option value="{{$comp->company_id }}">{{$comp->trading_name}}</option>
            @endforeach
        </select> 
        </div>
    </div>
     <div class="col">
        <div class="form-group">
            <label>Date of Joining</label>
        <input type="date" name="date-of-joining" class="form form-control form-sm" placeholder="Date of Joining"> 
        </div> 
    </div>  
</div>

<div class="row">
    <div class="col-md-6">
        <label>Role</label>
        <select name="role" class="form form-control"> 
            @foreach($roles as $roles)
            <option value="{{ $roles->role_id}}">{{$roles->role_name}}</option>
            @endforeach 
        </select> 
    </div>
     <div class="col-md-6">
        <label>Gender</label> 
        <select name="gender" class="form form-control"> 
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div> 
</div>
    
<div class="row mt-3">
    <div class="col">
         <div class="form-group">
        <label>Email</label>
    <input type="email" name="email" class="form form-control form-sm" placeholder="Email"> 
    </div> 
    </div>
</div>

<div class="row mt-3">
<div class="col-md-12">
    <label>Address</label>
    <textarea type="text" name="address" class="form form-control form-sm" placeholder="Address">

    </textarea>   
</div>

</div>
<div class="mt-3 text-right">
   
<button type="button" class="btn btn-primary add-emp-btn" value="Add" >
    <i class="fa fa-check-square mr-2"></i>
    Add Employee
</button>
</div>
</form>
</div>
</div>
</section>
<br><br><br>
@endsection
@section("javascript")
<script>
$(document).ready(function(){
   //add new employee
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    }); 
    $('#back').click(function(){
       window.history.go(-1);return false; 
    });
    $(document).on('click','.add-emp-btn', function(e){  
        e.preventDefault();
        form = $('#add-emp-form').serialize(); 
        
        $.ajax({
           type : "POST",
           url : "{{ url('add/employee') }}",
           data: form,
           
           success: function(data){
                
                document.location = "{{ url('employee') }}"; 
                 
           },
           error : function(data){
                
           } 
        }); 
    });
    //end add new employee
});
</script>
@endsection
