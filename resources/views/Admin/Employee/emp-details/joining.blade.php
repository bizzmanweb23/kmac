@extends('Admin.layout.main')
@section('content')
<div class="container-fluid my-3">
    <h3 class="lead">Employee Joining Bonus</h3>
</div>
<div class="row">
    <div class="col-3  ">
    <div class="card">
    <div class="card-body">
    <h4 class='lead'>
            Upload 
    </h4>
    <br>
    <form method="post" action="{{ url('add/bonus') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Employee </label> 
                <input type="hidden" name="id" >
                <select name="employee"  class="form-control">
                @foreach($employees as $values)
                <option value="{{$values->Emp_ID}}">
                    {{$values->first_name.' '.$values->last_name}}
                </option>
                @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="">Attachment</label>
                <input type="file" name="attachment" class="form-control"> 
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                <i class="fa fa-check mr-1"></i>
                Save
                </button>
            </div>

    </form>
    </div>
    </div>
    </div>

    <div class="col-9 card bg-white">
    <div class="card-body">
    <table class="table table-sm border">
            <thead>
                <th>
                Action
                </th>
                <th>
                Employee
                </th> 
                <th>
                Attachment
                </th>
            </thead>
            <tbody>
            @foreach($licence as $values)
            <tr>
               <td style="width: 2cm;">
                    <a href="javascript:void(0)" 
                        val="{{$values->id}}" 
                        class="dropdown-item delete"  >
                    <i class="fa fa-trash-o m-r-5"></i>
                        Delete
                    </a>
                    <a  href="#" class="dropdown-item" 
                        data-toggle="modal" data-target="#view-modal" >
                        <i class="fa fa-trash-o m-r-5"></i> 
                        View
                    </a>
                     
                </td>

                <td>{{$values->employee_id}}</td>
                <td>
                    <img src="public/storage/licence/{{ $values->attachment }}"  width="150px" height="100px"/>
                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
    </div>
    </div> 
</div>
@endsection
@section('javascript')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    }); 
   
    $('.table').DataTable();
   
    $('.delete').click(function(){
        $id = $(this).attr('val');
        $cnf = confirm('Deleted can not be recovered');
        if(!$cnf){
            
        } else {
           
            $.ajax({
                url : "{{url('delete/bonus') }}",
                method: "POST",
                data : {id: $id},
                dataType: "Json",
                success: function(data){
                document.location.reload();
                }
            });
        }
    });
    
    //view
    
});
</script>
@endsection