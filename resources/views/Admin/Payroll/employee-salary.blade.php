@extends('Admin.layout.main')
@section('content')

<div class="container-fluid  content">
<div class="row mt-5">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Basic Salary </h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
        <a href="{{ url('add/salary/form') }}" class="btn btn btn-primary   float-right" id="add">
        <i class="fa fa-plus mr-1"></i>Add Salary</a>
    </div>
</div>
<!--From here from starts-->
 	<!--From here table starts-->
<div class="row " id="table-section">
    <div class="col-md-12">
    <div class="card border">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-sm table-bordered display compact" id="example">
        <thead> 
                <th>Action</th>
                <th>Employee</th> 
                <th>Payroll Type</th>
                <th>Allowances</th> 
                <th>Payslip</th>
                <th>Net Salary</th>
                <th>Status</th>
                <th>Change Status</th>
        </thead>
        <tbody>
                @foreach($data as $values)
                <tr>
                <td> 
                <a class="dropdown-item edit" href="javascript:void(0)"  
                 data-toggle="modal" data-target="#editmodal" val="{{$values->salary_id}}">
                    <i class="fa fa-pencil m-r-5"></i> 
                    Edit
                </a> 
                <a class="dropdown-item delete" href="javascript:void(0)" val="{{$values->salary_id}}" >
                    <i class="fa fa-trash-o m-r-5"></i>
                    Delete
                </a>
                <a class="dropdown-item view" href="javascript:void(0)"    
                    data-toggle="modal" data-target="#viewmodal" val="{{$values->salary_id}}">
                    <i class="fa fa-trash-o m-r-5"></i> 
                    View
                </a>
                </td>
              
                <td>
                {{$values->first_name.' '.$values->last_name}}
                <br>
                (
                <span class="font-italic">
                {{$values->trading_name}}
                </span>
                )
                </td> 
                <td>
                {{$values->payroll_type}}
                </td>
                <td>  
                <span>
                Housing Allowance :
                {{$values->housing_allowance}}
                </span>
                <br>

                <span>
                Transport Allowance :
                {{$values->transport_allowance}}
                </span>
                <br>

                <span>
                Performance Allowance :
                {{$values->performance_allowance}}
                </span>
                <br>
                <span>
                Incentives :
                {{$values->incentives}}
                </span>
                <br>
                <span>
                Bonous :
                {{$values->bonous}}
                </span>
                </td>
                <td>
                    <a href="{{ route('make.payslip',$values->salary_id) }}" 
                       class='btn btn-primary text-center make-payslip' 
                       code="{{$values->salary_id}}">
                        Make 
                        Payslip
                    </a>
                </td>
                
                <td>
                {{
                    $values->housing_allowance 
                    +$values->transport_allowance
                    +$values->performance_allowance
                }}
                </td>
                <td>
                @if($values->status == 1)
                    <span class="custom-badge status-green">
                        paid
                    </span>
                @endif
                @if($values->status == 0)
                    <span class="custom-badge status-red">
                        unpaid
                    </span>
                @endif
                </td>
                 
                <td>
<div class="dropdown ">
<a class="custom-badge status-blue dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
    Choose Action
</a>

<div class="dropdown-menu dropdown-menu-right"> 
    <a class="dropdown-item pending" href="javascript:void(0)" val="{{$values->salary_id}}" code="1" >Paid</a>
    <a class="dropdown-item pending" href="javascript:void(0)" val="{{$values->salary_id}}" code="2" >Unpaid</a>
     
</div>
</div>
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
  
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg w-100" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form id="update-salary">
                @csrf 
                    <div class="col">
                        <div class="form-group">
                            <label>Employee</label>
                            <input type="text" class="form-control" class="emp-name"  >       
                        </div>                         
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" class="form-control" class="cmp-name"  >      
                        </div> 
                    </div>
                
                
                        <div class="form-group col">
                            <label>Housing Allowance</label>
                            <input type="text" class="form-control" class="housing" >
                        </div>
                        <div class="col form-group">
                            <label>Transport Allowance</label>
                            <input type="text" class="form-control" class="transport" >
                        </div>
                        <div class="col form-group">
                            <label>Performance Allowance</label>
                            <input type="text" class="form-control" class="performance"  >
                        </div>
                
                        <div class="form-group col">
                            <label>Net Salary</label>
                            <input type="text"  class="form-control" class="net-salary"  >
                        </div>
                        <div class="col form-group">
                            <label>Bonus</label>
                            <input type="text" class="form-control" class="bonus"  >
                        </div> 
                
                <div class="m-t-20 text-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save " id="update-btn">
                            <i class="fa fa-check-square mr-1"></i>
                            Update
                    </button>
                </div> 
            </form>
        </div>
        
    </div>
  </div>
</div>  
<!--end modal-->	
<!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">View Modal</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <table class="table  m-auto ">
        <tr>
        <td>
            Employee Name
        </td>
        <td>
            <span id="employee">

            </span>
        </td>
        </tr>
        <tr>
            <td>Company</td>
            <td>
                <span id="company">
                    
                </span>
            </td>
        </tr>
         <tr>
            <td>Salary</td>
            <td>
                <span id="salary">
                    
                </span>
            </td>
        </tr>
         <tr>
            <td>Housing Allowance</td>
            <td>
                <span id="ha" class="ha">
                    
                </span>
            </td>
        </tr>
        <tr>
            <td>Transport Allowance</td>
            <td>
                <span id="ta" class="ta">
                    
                </span>
            </td>
        </tr>
        <tr>
            <td>Performance Allowance</td>
            <td>
                <span id="pa" class="pa">
                    
                </span>
            </td>
        </tr>
        <tr>
            <td>Incentives</td>
            <td>
                <span id="incentive">
                    
                </span>
            </td>
        </tr>
        <tr>
            <td>Bonus</td>
            <td>
                <span id="bonus">
                    
                </span>
            </td>
        </tr>
        </table>
      </div>
      <div class="form-group p-3 text-right">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--end modal-->

</div>

@endsection
@section('javascript')
<script>
$(document).ready(function(){  

$.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
});

$('#add-form').hide();

$('#add').click(function(){
    $('#add-form').slideToggle();
});

$('#example').DataTable();
        //save employee salary
	        //edit
        $(document).on('click','.edit',function(){
            var id = $(this).attr('val');
             
            $.ajax({
                type: "POST",
                url : "{{ url('view/salary') }}",
                data : {id: id},
                dataType : "JSON",
                success : function(data)
                {  
                    $.each(data , function(key, value)
                    {   
                        $('.emp-name').val(value.first_name+' '+value.last_name);
                        $('.cmp-name').val(value.trading_name); 
                        $('.housing').val(value.salary);
                        $('.performance').val(value.housing_allowance);
                        $('.transport').val(value.transport_allowance);
                        $('.net-salary').val(value.salary); 
                        $('.bonus').val(value.bonous); 
                        console.log(value);
                    });
                }
            });
        });
        //update
        $(document).on('click','#update-btn', function(e){
            e.preventDefault();
            var FORM = $('#update-salary').serialize();
            alert(FORM);
        });
        //view 
        $(document).on('click','.view',function(){
            var id = $(this).attr('val');
            
            $.ajax({
                type: "POST",
                url : "{{ url('view/salary') }}",
                data : {id: id},
                dataType : "JSON",
                success : function(data)
                {   
                    $.each(data , function(key, value)
                    {
                        $('#employee').text(value.first_name+' '+value.last_name);
                        $('#company').text(value.trading_name); 
                        $('#salary').text(value.salary);
                        $('.ha').text(value.housing_allowance);
                        $('.ta').text(value.transport_allowance);
                        $('.pa').text(value.performance_allowance);
                        $('#incentive').text(value.incentives);
                        $('#bonus').text(value.bonous); 
                            
                    });
                }
            });
        });

        //delete
        $('.delete').click(function(){
        var alert = confirm('do you want to delete'); 
        if(!alert)
        {
           
        } 
        else 
        {
            var id = $(this).attr('val'); 
            $.ajax({
                type: "POST",
                url : "{{ url('delete/salary') }}",
                data : {id: id},
                dataType : "JSON",
                success : function(data)
                {  
                document.location.reload();

                }
            }); 
        }
        });
    //for payslip
    $('.make-payslip').click(function(){
        $id = $(this).attr('code');
        $.ajax({
            url : '{{url("make/payslip")}}',
            type: 'POST',
            data : { id: $id },
            dataType: 'JSON',
            success : function(response)
            {
                alert(response);
            }
        });
    });
});
</script>
@endsection 
