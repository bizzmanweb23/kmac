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
                                    <li class="breadcrumb-link active">Inventory Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Products view Start -->
				<div class="row display-table">
                    <!-- Styled Table Card-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card table-card">
                            <div class="card-header pb-0">
                                <h4>Inventory Management</h4>
				<a href="#addInventoryModal" class="btn btn-primary squer-btn" style="float:right;margin-top: -28px;" data-toggle="modal"><span>Add Inventory</span></a>
								
                            </div>
                            <div class="card-body">
                            <table class="table table-striped table-hover border table-sm" id="table" data-toggle="table" data-height="460" data-pagination="true"
                                       data-show-pagination-switch="true" data-search="true">                
				            <thead>  						         
							<th>Item name</th>
							<th>Item Code</th>
							<th>Quantity IN</th>
							<th>Cost Per PCS</th>
							<th>Total Cost</th>
							<th>Quantity Out</th>
							<th>On Hand Quantity</th>
							<th>Actual Quantity</th>
							<th>Adjustment</th>
							<th>Actions</th> 
							</thead>
							<tbody>
								<?php
									foreach($result as $data)
									{
								?>
								<tr>
								<td><?php echo $data->item_name;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->item_code;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->quantity_in;?></td>
								<td style="border: 1px solid #dee2e6;">$ <?php echo $data->cost_per_pcs;?></td>
								<td style="border: 1px solid #dee2e6;">$ <?php echo $data->total_cost;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->quantity_out;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->on_hand_quantity;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->actual_quantity;?></td>
								<td style="border: 1px solid #dee2e6;"><?php echo $data->adjustment;?></td>
								<td style="border: 1px solid #dee2e6;">
									<!-- <a href="javascript:void(0)" class='ml-3 view-item' value='<?php echo $data->id; ?>'><i class='fa fa-eye'></i></a>
									<a href="javascript:void(0)" class='ml-3 edit-item' value='<?php echo $data->id; ?>'><i class='fa fa-edit'></i></a> -->
									<a href="javascript:void(0)" class='ml-3 delete-item' value='<?php echo $data->id; ?>'><i class='fa fa-trash'></i></a>									
								</td>
								</tr>
								<?php
									}
								?>
							</tbody>
							</table>
		                    </div>
                        </div>
                    </div>
                </div>
            
	<div id="showView"></div>
<!-- Add Modal HTML -->
<div id="addInventoryModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  
		    <form method="post" id="inventory_details_form">
			    <div class="card">
			    <div class="card-header">
			    
		   		<div class="text-left">
                	<h4 class="text-gray-900 text-uppercase">Fill Inventory's Details</h4>
            	</div>
			 
			    </div>
                <div class="card-body">
				 
                <div class="row">
                <div class="col-md-6">
			<label>Item*:</label>
			 
			<select class="items_list form-control" name='item_name'>
				<option>Clik to Select Items</option>
			</select>
<!--            <input type="text" class="form-control form-control-user" id="item_name"
								placeholder="Item" name="item_name"> 
						-->
			<span id="Item_error" style="color: red"></span>
                </div>
            <div class="col-md-6">
			<label>Item Code*:</label>
			<input type="text" class='item-code form-control' name='item_code'>
                         
<!--                        <input type="text" class="form-control form-control-user" id="item_code"
                               placeholder="Item Code" name="item_code">-->
			<span id="item_code_error" style="color: red"></span>
            </div>					
            </div>
            <br>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="list-group-item nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Stock In</button>
    <button class="list-group-item nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Stock Out</button>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <br>
                    <div class="  row customer">
                        <div class="col-md-4">
						    <label>Quantity IN*:</label>
                                <input type="text" class="qty-in form-control form-control-user form-sm" id="quantity_in"
                                       placeholder="Quantity IN" name="quantity_in">
						        <span id="quantity_in_error" style="color: red"></span>
                        </div>
						<div class="col-md-4">
						    <label>Cost per PCS*:</label>
                                <input type="text" class="cost-per-pcs form-control form-control-user" id="cost_per_pcs"
                                       placeholder="Cost Per PCS" name="cost_per_pcs">
						        <span id="cost_per_pcs_error" style="color: red"></span>
                        </div> 
                        <div class="col-md-4">
						    <label>Total Cost*:</label>
                                <input type="text" class=" total-cost form-control form-control-user" id="total_cost"
                                       placeholder="Total Cost" name="total_cost">
						        <span id="total_cost_error" style="color: red"></span>
                        </div>
                     </div> 
               
            </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  	 <br>
    <div class="row mt-2 customer">
        <div class="col-md-6">
		    <label>Quantity OUT*:</label>
                <input type="text" class="qty-out form-control form-control-user" id="quantity_out"
                       placeholder="Quantity OUT" name="quantity_out">
		        <span id="quantity_out_error" style="color: red"></span>
        </div>
    </div>
	 
	</div>
   
</div> 		 
				
 
	<div class="row mt-3">
	    <div class="col-md-6">
			<label>On Hand Quantity*:</label>
            <input type="text" class="on-hand-qty form-control form-control-user" id="on_hand_quantity"
                   placeholder="On Hand Quantity" name="on_hand_quantity">
			<span id="on_hand_quantity_error" style="color: red"></span>
        </div>
        <div class="col-md-6">
			<label>Actual Quantity*:</label>
            <input type="text" class="actual-qty form-control form-control-user" id="actual_quantity"
                   placeholder="Actual Quantity" name="actual_quantity">
		    <span id="actual_quantity_error" style="color: red"></span>
        </div>
    </div>
	<div class="row mt-3">
	    <div class="col-md-6">
		    <label>Adjustment*:</label>
            <input type="text" class="adjustment form-control form-control-user" id="adjustment"
                   placeholder="Adjustment" name="adjustment">
			<span id="adjustment_error" style="color: red"></span>
        </div>
    </div>
	<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
	<button type="button" class="btn btn-primary squer-btn" id="save_inventoryDetails">Save</button>
	</div>
	</div>
    </div>
                </div>				
            </form>
		</div>
	</div>
</div>
<!-- Add Boker -->
<!-- View Broker Modal -->
<section class="view_broker_modal">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
				<select class="items_list form-control" name='item_name'></select>
				</div>
				<div class="col-md-6">
				<input type="text" class='item-code form-control' name='item_code'>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				<label>Quantity IN*:</label>
                <input type="text" class="qty-in form-control form-control-user form-sm" id="quantity_in" name="quantity_in">						
				</div>
				<div class="col-md-3">
				<label>Cost per PCS*:</label>
                <input type="text" class="cost-per-pcs form-control form-control-user" id="cost_per_pcs"
                                       placeholder="Cost Per PCS" name="cost_per_pcs">
				</div>
				<div class="col-md-3">
				<label>Total Cost*:</label>
                <input type="text" class=" total-cost form-control form-control-user" id="total_cost"
                                       placeholder="Total Cost" name="total_cost">
				</div>
				<div class="col-md-3">
				<label>Quantity OUT*:</label>
                <input type="text" class="qty-out form-control form-control-user" id="quantity_out"
                       placeholder="Quantity OUT" name="quantity_out">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				<label>On Hand Quantity*:</label>
            	<input type="text" class="on-hand-qty form-control form-control-user" id="on_hand_quantity"
                   placeholder="On Hand Quantity" name="on_hand_quantity">						
				</div>
				<div class="col-md-4">
				<label>Actual Quantity*:</label>
            	<input type="text" class="actual-qty form-control form-control-user" id="actual_quantity"
                   placeholder="Actual Quantity" name="actual_quantity">					
				</div>
				<div class="col-md-4">
				<label>Adjustment*:</label>
            <input type="text" class="adjustment form-control form-control-user" id="adjustment"
                   placeholder="Adjustment" name="adjustment">	
				</div>
			</div>
			<h5>view modal</h5>	
			<select class="items_list_edit form-control" name='item_name'></select>					
		</div>
	</div>
</section>
 
<!-- Edit Broker Modal -->
<div id="edit_Broker_Modal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_edit_details">
             <form method="post" id="broker_edit_form">
			    <div class="card">
                <div class="card-body">
				@csrf
                <div class="row">
                    <div class="col-md-4">
					    <label>First Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="First Name" name="first_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Last Name*:</label>
                        <input type="text" class="form-control form-control-user" id="first_name"
                               placeholder="Last Name" name="last_name">
						<span id="first_name_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
						<label>Address*:</label>
                        <input type="text" class="form-control form-control-user" id="address"
                               placeholder="Enter Your Address" name="address">
						<span id="address_error" style="color: red"></span>
                    </div>					
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>City*:</label>
                        <input type="text" class="form-control form-control-user" id="city"
                               placeholder="Enter Your City" name="city">
						<span id="city_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Country*:</label>
                        <input type="text" class="form-control form-control-user" id="country"
                               placeholder="Enter Your Country" name="country">
					    <span id="country_error" style="color: red"></span>
                    </div>
					<div class="col-md-4">
					    <label>Mobile Number*:</label>
                        <input type="text" class="form-control form-control-user" id="mobile_number"
                               placeholder="Enter your Mobile Number" name="mobile_number">
						<span id="mobile_number_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-2">
				    <div class="col-md-4">
						<label>Email Address*:</label>
                        <input type="text" class="form-control form-control-user" id="email_address"
                               placeholder="Enter your Email Address" name="email_address">
					    <span id="email_address_error" style="color: red"></span>
                    </div>
                    <div class="col-md-4">
						<label>Select Broker Type*:</label>
                        <select name="broker_type" id="broker_type">
						    <option value="0">--Select--</option>
                            <option value="1">Senior Broker</option>
                            <option value="2">Broker</option>
                            <option value="3">Assistant Broker Jab</option>
                            <option value="4">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Select Broker Percentage*:</label>
                        <select name="broker_commision" id="broker_commision">
						    <option value="0">--Select Percentage--</option>
                            <option value="1">60%</option>
                            <option value="2">50%</option>
                            <option value="3">40%</option>
                            <option value="4">30%</option>                                          
                        </select>
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" id="brokeredit_button" type="button">Save</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
        </div>
	</div>
</div>
<!-- Delete Broker Modal -->
<div id="deleteBrokerModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
			    <input type="hidden" id="deleteID">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Broker Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-danger" value="Delete" id="deleteBrokerButton">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Broker Modal -->
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Vehicle Record</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
 
<div id="user_loder" style="display: none">
        @include('admin.loader.index')
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
	function item_code_display(){
		
	}
	var getNameArray = [];
	$(document).ready(function(){
     	$.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        }); 
            
    $.ajax({
	url: '{{ url("inventory/items") }}',
	type : 'post', 
	dataType: 'json',
	            
        success : function(data){
            res = data['items']; 
            $.each(res, function(key, values){  
            $('.items_list').append('<option getid='+values.id+' getname='+values.item_name+' value='+values.item_name+'>'+values.item_name+'</option>');
			$('.items_list_edit').append('<option getid='+values.id+' getname='+values.item_name+' value='+values.item_name+'>'+values.item_name+'</option>');
             //console.log(values.item_name);
            });
        }
    });

	$(document).on('change','.items_list', function(){
		 
		var getname = $('option:selected').attr('getname');
		var id = $("option:selected").attr('getid');
		var itemValue = $("option:selected").val();
		var str = $("option:selected").text(); 
		 
		if(id){
			$.ajax({
			url : '{{ url("item/code") }}'+'/'+id,
			type : 'post',
			dataTayp : 'json',

			success : function(data){  
				$.each(data, function(key ,value){
					name = value.item_code 
					$('.item-code').val(value.item_code);
					$('.qty-in').val(value.qty_in);
					$('.cost-per-pcs').val(value.cost_per_pcs);
					$('.total-cost').val(value.total_cost);
					$('.qty-out').val(value.qty_out);
					$('.on-hand-qty').val(value.on_hand_qty);
					$('.actual_qty').val(value.actual_qty);
					$('.adjustment').val(value.adjustment); 
				});  
			}
		});
		} else {
			$.ajax({
			url : '{{ url("item/code") }}'+'/'+1,
			type : 'post',
			dataTayp : 'json',
				success : function(response){

					$.each(response, function(key ,value){
						$('.item_code').val(value.item_code);
					}); 

				}
			});
		} 
		 
	});

	$(document).on('click','.delete-item', function(e){
		e.preventDefault();
		var id = $(this).attr('value');
		Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
			  	$.ajax({
					url : '{{ url("delete/broker/item") }}'+'/'+id,
					type : 'post',
					data : id,
					success : function(data){ 
						location.reload();  
					}
				 });
			    // Swal.fire(
			    //   'Deleted!',
			    //   'Your file has been deleted.',
			    //   'success'
			    // )
			  }
		});

		 
	});
	$('.view_broker_modal').hide();
	$(document).on('click','.view-item', function(e){
		e.preventDefault();
		var id = $(this).attr('value');
		
		$.ajax({
			url : '{{ url("view/item") }}'+'/'+id,
			type : 'get',
			data : id,
			success : function(data){ 
				console.log(data);
				 
				$('.view_broker_modal').show();
				$('.display-table').hide();
			}
		 });
		 
	});
	$(document).on('click','.edit-item', function(e){
		e.preventDefault();
		var id = $(this).attr('value');
		$('#edit_Broker_Modal').show();
		 
	});
    
});
</script>
@section('javascript')
@include('admin.js.inventory')
@endsection
@endsection
