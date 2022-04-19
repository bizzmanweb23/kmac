@extends('admin.layout.dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-wrapper">
    <div class="main-content">
        <!-- Page Title Start -->
        <div class="row">
            <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-title-wrapper">
                    <div class="breadcrumb-list">
                        <ul>
                            <li class="breadcrumb-link">
                                <a href="index.html"><i class="fas fa-home mr-2"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-link active">Inventory Master</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products view Start -->
	<div class="row">
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
        <div class="card-header pb-0">
        <h4>Inventory Master</h4>
	 <a href="#addInventoryModal" class="btn btn-primary squer-btn" style="float:right;margin-top: -28px;" data-toggle="modal"><span>Add Inventory</span></a>
 
	
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover border table-sm" id="example" >                
            <thead>  
                <th>Sno</th>
                <th>Item name</th>
                <th>Item Code</th> 
                <th>Actions</th> 
            </thead>
            <tbody>
            @foreach($master as $rows)
            <tr>
                <td>{{$rows->id}}</td>
                <td>{{$rows->item_name}}</td>
                <td>{{$rows->item_code}}</td>
                <td>
                    <a href="javascript:void(0)" class="alert " name="{{$rows->id}}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                    <a href="javascript:void(0)" class="alert " name="{{$rows->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
      
    </div> 
        <div id="showView"></div>
 
<div id="addInventoryModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Inventory's Details</h1>
            </div>
			</div>
		  <form method="post" id="inventory_master_form">@csrf
                <div class="card">
                <div class="card-body">
				
                <div class="row">
                    <div class="col-md-6">
					    <label>Item*:</label>
                        <input type="text" class="form-control form-control-user" id="item_name"
                               placeholder="Item" name="item_name">
 
						<span id="Item_error" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
		                <label>Item Code*:</label>
                        <input type="text" class="form-control form-control-user" id="item_code"
                               placeholder="Item Code" name="item_code">
						<span id="item_code_error" style="color: red"></span>
                    </div>					
                </div> 
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
              <button type="submit" class="btn btn-primary squer-btn" id="save_inventoryDetails">Save</button>
                       <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
  
		        </div>
				</div>
                			
            </form>
		</div>
	</div>
</div> 
        </div></div>
<div id="user_loder" style="display: none">
        @include('admin.loader.index')
</div> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){ 
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#example').dataTable({
            "pagingType": "full_numbers"
        }); 
    });

    $('#inventory_master_form').on('submit', function(e){ 
        e.preventDefault();
        var list = $(this).serialize();
        //alert(list);
        $.ajax({
          url : '{{ url("add/inventory/item") }}',
          type : 'post',
          data : $(this).serialize(),
          success: function(data){
              console.log(data.msg);
              location.reload();
          }
        });
    });
    
     
   
</script>
@endsection
 
