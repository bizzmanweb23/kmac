@extends("Admin.layout.main")
@section("content")
<div class="container-fluid row my-3">
<div class="col-sm-4 col-3">
    <h4 class="page-title">Termination</h4>
</div>
<div class="col-sm-8 col-9 text-right m-b-20">
    <a href="{{ route('termination.add.form') }}" class="btn btn btn-primary float-right" >
    <i class="fa fa-plus mr-1"></i> 
    Add New
    </a>
</div>
</div>

<div class="container-fluid">
    <div class="row" id="table-section">
		<div class="col-md-12">
		<div class="card">
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-sm table-bordered display compact" id="example">
                <thead>
                <tr>
                <th>Action</th>
                <th><i class="fa fa-user mr-1"></i>Employee</th>
                <th>Terminated By</th>  
                <th>Company</th>
                <th>Termination Type</th>
                <th><i class="fa fa-calendar mr-1"></i>Notce Date</th> 
                <th><i class="fa fa-calendar mr-1"></i>Terminaton Date</th>

                </tr>
                </thead>
                <tbody>
            @foreach($data as $values)
            <tr>
             <td>
                <div>
                    <a href="javascript:void(0)" class="dropdown-item d"
                        
                        val="{{ $values->termination_id}}" >
                        <i class="fa fa-trash-o m-r-5"></i> 
                        Delete
                    </a>

                    <a href="javascript:void(0)" class="dropdown-item seeList"  
                        val="{{ $values->termination_id}}" 
                        data-toggle="modal" data-target="#view-terminatio">
                        <i class="fa fa-eye m-r-5"></i> 
                        View
                    </a> 
                
                </div>         
            </td> 
                    <td>
                            {{$values->employee_terminated}}
                    </td>
                    <td>
                            {{$values->terminated_by}}
                    </td>
                    <td>
                        {{
                            $values->trading_name
                        }}
                    </td>
                    <td>
                        {{
                            $values->type
                        }}
                    </td>
                    <td>
                            {{$values->notice_date}}
                    </td>
                    <td>
                            {{$values->termination_date }}
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
</div>


<div class="modal fade" id="view-termination" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Termination</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-lg table-bordered">
      	<tbody>
        <tr>
                <td>
                Employee 
                </td>
                <td>
                <span id="employee"></span>
                </td>
        </tr>
        <tr>
                <td>
                        Company 
                </td>
                <td>
                        <span id="company">

                        </span>
                </td>
        </tr>
        <tr>
                <td>
                        Terminated By 
                </td>
                <td>
                        <span id="terminated-by">

                        </span>
                </td>
        </tr>
        <tr>
                <td>
                        Notice Date
                </td>
                <td>
                        <span id="notice-date">

                        </span>
                </td>
        </tr>
        <tr>
                <td>
                        Termination Date	
                </td>
                <td>
                        <span id="termination-date">

                        </span>
                </td>
        </tr>

        <tr>
                <td>
                        Termination Type
                </td>
                <td>
                        <span id="termination-type">

                        </span>
                </td>
        </tr>
      		 
      	</tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
   
      </div>
    </div>
  </div>
</div>
@endsection
@section("javascript")
<script>
$(document).ready(function(){
     
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    }); 
    $('.table').DataTable(); 
    
    $('.seeList').click(function(e){
        e.preventDefault();
        alert();
    });
     
    function viewmodal(){
        alert();
    } 
    
});
</script>
@endsection
