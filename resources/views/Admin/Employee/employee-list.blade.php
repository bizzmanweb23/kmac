@extends("Admin.layout.main")
@section("content")
 
 

<div class="row mt-5">
<div class="col-sm-4 col-3">
        <h4 class="page-title">Employee List</h4>
</div>
<div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ route('emp.add') }}" class="btn btn btn-primary float-right" id="add">
                <i class="fa fa-plus mr-1"></i> Add New</a>
</div>
</div>

<div class="row" id="table-section">
<div class="col-md-12">
<div class="card border">
<div class="card-body">
<div class="table-responsive">
<table class="table table-sm table-bordered display compact" id="example">
<thead>
    <tr>
        <th>Action</th>
        <th>
            <i class="fa fa-user"></i>
            name
        </th> 
        <th>Company</th> 
        <th>  
            Contact
        </th>
        <th>
            Role
        </th>
    </tr>
</thead>
<tbody>
@foreach(@$data as $values)
<tr>
    <td style="width: 2cm;">
        <a href="javascript:void(0)"  class="dropdown-item delete  "val="{{ $values->employee_id}}" >
            <i class="fa fa-trash-o m-r-5"></i>
            Delete
        </a>
        <a  href="javascript:void(0)" class="dropdown-item view  " val="{{ $values->employee_id}}" 
            data-toggle="modal" data-target="#view-modal" >
            <i class="fa fa-trash-o m-r-5"></i> 
            View
        </a>
        <a href="javascript:void(0)" class="dropdown-item edit-modal edit-employee" id="edit-employee" val="{{$values->employee_id}}"
        data-toggle="modal" data-target="#edit-modal"
           >
            <i class="fa fa-pencil m-r-5"></i> 
            Edit
        </a> 
    </td>

    <td>
        {{@$values->first_name.' '.$values->last_name}} 

    </td>
    <td>
        {{ @$values->trading_name}}
    </td>
    <td> 
       <span>
           Contact: 
            {{
           @$values->emp_contact
        }}
       </span><br>
       <span>Email: 
              {{
            @$values->email
        }}
       </span><br>


    </td>
    <td> 
        {{@$values->role_name}}

    </td>
</tr>
@endforeach
</tbody>
</table> 
</div>
</div>
</div>
</div>
</div>
<!-- View Modal -->
 
<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Employee View</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-lg table-bordered">
     <tr>
         <td>
             First Name
         </td>
         <td>
             <span class="first-name"></span>
         </td>
     </tr>
     <tr>
         <td>
             Last Name
         </td>
         <td>
             <span class="last-name">
                 
             </span>
         </td>
     </tr>
      
     <tr>
         <td>
             Company
         </td>
         <td>
             <span class="company-name"></span>
         </td>
     </tr>
     <tr>
         <td>
             Trading Name
         </td>
         <td>
             <span class="trading-name"></span>
         </td>
     </tr>
     <tr>
         <td>
             Contact Number 
         </td>
         <td>
             <span class="contact-number">
                 
             </span>
         </td>
     </tr>
     <tr>
         <td>
             Role
         </td>
         <td>
             <span class="role">
                 
             </span>
         </td>
     </tr>
     <tr>
         <td>
             Date of Joining
         </td>
         <td>
             <span class="date-of-joining">
                 
             </span>
         </td>
     </tr>
     <tr>
         <td>
             Date of Birth
         </td>
         <td>
             <span class="date-of-birth">
                 
             </span>
         </td>
     </tr>
 </table>
 <div class="mt-3 text-right">
    <button type="button" class="btn btn-danger  "  data-dismiss="modal" >
      Close</button>
</div>
      </div>
      
    </div>
  </div>
</div>
<!-- End View Modal -->
<!-- start edit form --> 
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h4>Employee Edit</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body edit-modal-body">
        
<form  method="post" id="update-form"  > 
@csrf
  
<input type="hidden" name="userid" id="user-id" class="user-id"  >
   
<div class="row mt-3">
    <div class="col-md-6">
        <label>First Name</label>
        <input type="text" name="first-name" id="first-name" 
               class="form form-control form-sm" placeholder="First Name" ></input>   
    </div>
     <div class="col-md-6">
         <label>Last Name</label>
        <input type="text" name="last-name" id="last-name" 
               class="form form-control form-sm" placeholder="Last Name" ></input>   
    </div> 
</div> 

<div class="row mt-3">
   
     <div class="col-md-6">
        <label>Date of Joining</label>
        <input type="date" name="date-of-joining" id="joining-date" class="form form-control form-sm"
               placeholder="Date of Joining" ></input>   
    </div>
     <div class="col-md-6">
        <label>Contact Number</label>
        <input type="text" name="contact-number" id="contact-number" 
               class="form form-control form-sm" placeholder="Contact Number" ></input>   
    </div> 
</div> 

<div class="row mt-3"> 
    <div class="col-md-6">
         <label>Company</label>
       <select class="form-control" id="company-name" name="company" required='required'>
        @foreach($company as $values)
        <option value="{{$values->company_id}}">{{$values->trading_name}}</option>
        
        @endforeach
       </select>
    </div>
     <div class="col-md-6">
        <label>Role</label>
        <select class="form-control" id="role-id" name="role-id" required='required'>
             @foreach($roles as $values)
             <option value="{{$values->role_id}}">{{$values->role_name}}</option>
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
               id="email" 
               class="form form-control form-sm" 
               placeholder="Email">
                   
        </input>   
        </div> 
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <label>Address</label>
        <textarea type="text" name="address"  id="address" rows="7" 
                  class="form form-control form-sm" 
                  placeholder="Address"> 
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
     
     
      
    </div>
  </div>
</div>
<!-- emd edot form --> 
@endsection
@section("javascript")
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    }); 
   
    var table = $('#example').DataTable(); 
    //delete
    $('.delete').click(function(){
        $id = $(this).attr('val');
        var cfm = confirm('Do you want to delete');
        if(!cfm){ 
        } else 
        {
            $.ajax({
                type :"POST",
                url : '{{ url("employee/delete")}}',
                data: {id: $id}, 
                dataType: 'json',
                success: function(data){
                    $.each(data, function(key, value){
                        console.log(value);
                        document.location.reload();
                    });
                }
            });
        } 
    });
    //view
    $('.view').click(function(){
        $id = $(this).attr('val'); 
             
        $.ajax({
            type :"POST",
            url : '{{ url("employee/vew")}}', 
            data: {id: $id},
            dataType: 'Json',
            success: function(response){
                
        console.log(response);
       
              $.each(response, function(key, value){
                    $('.first-name').text(value.first_name);
                    $('.last-name').text(value.last_name);
                    $('.company-name').text(value.name);
                    $('.trading-name').text(value.trading_name);
                    $('.contact-number').text(value.emp_contact);
                    $('.role').text(value.role_name);
                    $('.date-of-birth').text(value.date_of_birth);
                    $('.date-of-joining').text(value.date_of_joining); 
                    console.log(value.contact_number);
                });
            }
        });
    });
    //edit form
    $('.edit-employee').click(function(){ 
        $id = $(this).attr('val'); 
        $.ajax({  
            url : '{{ url("employee/edit") }}',
            type :"POST",
            data: {id:$id}, 
            dataType: 'Json',
            success: function(response){ 
                $.each(response,function(key, value){
                    console.log(value);
                    $('.user-id').val(value.employee_id);
                    $('#first-name').val(value.first_name);  
                    $('#last-name').val(value.last_name);
                    $('#contact-number').val(value.emp_contact);
                    //$('#company-name').val(response['employee'][0]['trading_name']);
                    $('#email').val(values.email);
                    $('#address').val(value.address);
                });
//                $('.user-id').val(response['employee'][0]['employee_id']);
//                $('#first-name').val(response['employee'][0]['first_name']);  
//                $('#last-name').val(response['employee'][0]['last_name']);
//                $('#contact-number').val(response['employee'][0]['emp_contact']);
//                //$('#company-name').val(response['employee'][0]['trading_name']);
//                $('#email').val(response['employee'][0]['email']);
//                $('#address').val(response['employee'][0]['address']); 
                
            }
        }); 

    });
    
    
    $('.update-emp').click(function(){
          
        var form = $('#update-form').serialize();  
         
        $.ajax({ 

            url : '{{ url("employee/update") }}',  
            type :"POST",
            data: form,
            dataType: 'JSON',
            success: function(data){
                alert(data.message);
                document.location.reload(); 
                console.log(data);
            }
        }); 

    });
 });
</script>
@endsection
