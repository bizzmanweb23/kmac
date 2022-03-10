@extends('admin.layout.dashboard')

@section('content')
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
				<div class="row">
                    <!-- Styled Table Card-->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card table-card">
                            <div class="card-header pb-0">
                                <h4>Inventory Management</h4>
								<a href="#addInventoryModal" class="btn btn-primary squer-btn" style="float:right;margin-top: -28px;" data-toggle="modal"><span>Add Inventory</span></a>
								
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-hover" id="table" data-toggle="table" data-height="460" data-pagination="true"
                                       data-show-pagination-switch="true" data-search="true">                
				                    <thead>
					                            <tr>						         
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
					                            </tr>
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
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->cost_per_pcs;?></td>
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->total_cost;?></td>
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->quantity_out;?></td>
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->on_hand_quantity;?></td>
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->actual_quantity;?></td>
									            <td style="border: 1px solid #dee2e6;"><?php echo $data->adjustment;?></td>
									            <td style="border: 1px solid #dee2e6;">
									                <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="broker_view" title="View"><i class="las la-eye"></i></a> 
									                <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="edit_broker_details" title="Edit"><i class="las la-edit"></i></a>
                                                    <a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" rel="<?php echo $data->id;?>" id="delete_broker_details" title="Delete"><i class="far fa-trash-alt"></i></i></a>										
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
		    <div class="p-1">
		    <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Fill Inventory's Details</h1>
            </div>
			</div>
		    <form method="post" id="inventory_details_form">
			    <div class="card">
                <div class="card-body">
				@csrf
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
				<ul class="nav nav-tabs mt-4" role="tablist">                          
				    <li class="nav-item">
					    <a class="nav-link active" data-bs-toggle="tab" href="#stock_details">STOCK IN</a>
				    </li>
                </ul>
				<div id="stock_details" class="container tab-pane active"><br>
                    <div class="row mt-2 customer">
                        <div class="col-md-6">
						    <label>Quantity IN*:</label>
                                <input type="text" class="form-control form-control-user" id="quantity_in"
                                       placeholder="Quantity IN" name="quantity_in">
						        <span id="quantity_in_error" style="color: red"></span>
                        </div>
						<div class="col-md-6">
						    <label>Cost per PCS*:</label>
                                <input type="text" class="form-control form-control-user" id="cost_per_pcs"
                                       placeholder="Cost Per PCS" name="cost_per_pcs">
						        <span id="cost_per_pcs_error" style="color: red"></span>
                        </div>
                    </div>
					<div class="row mt-2 customer">
                        <div class="col-md-6">
						    <label>Total Cost*:</label>
                                <input type="text" class="form-control form-control-user" id="total_cost"
                                       placeholder="Total Cost" name="total_cost">
						        <span id="total_cost_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				<hr>
				<ul class="nav nav-tabs mt-4" role="tablist">                          
				    <li class="nav-item">
					    <a class="nav-link active" data-bs-toggle="tab" href="#outstock_details">STOCK OUT</a>
				    </li>
                </ul>
				<div id="outstock_details" class="container tab-pane active"><br>
                    <div class="row mt-2 customer">
                        <div class="col-md-6">
						    <label>Quantity OUT*:</label>
                                <input type="text" class="form-control form-control-user" id="quantity_out"
                                       placeholder="Quantity OUT" name="quantity_out">
						        <span id="quantity_out_error" style="color: red"></span>
                        </div>
                    </div>
                </div>
				<hr>
				<div class="row mt-3">
				    <div class="col-md-6">
						<label>On Hand Quantity*:</label>
                        <input type="text" class="form-control form-control-user" id="on_hand_quantity"
                               placeholder="On Hand Quantity" name="on_hand_quantity">
						<span id="on_hand_quantity_error" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
						<label>Actual Quantity*:</label>
                        <input type="text" class="form-control form-control-user" id="actual_quantity"
                               placeholder="Actual Quantity" name="actual_quantity">
					    <span id="actual_quantity_error" style="color: red"></span>
                    </div>
                </div>
				<div class="row mt-3">
				    <div class="col-md-6">
					    <label>Adjustment*:</label>
                        <input type="text" class="form-control form-control-user" id="adjustment"
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
<div id="viewBrokerModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="show_details">
		     <form method="get" id="broker_details_form">
			    <div class="card">
                <div class="card-body">
			    <input type="hidden" id="broker_id">
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
                        <input type="text" class="form-control form-control-user" id="last_name"
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
                               placeholder="Enter Your City" value="" name="city">
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
                            <option value="Senior Broker">Senior Broker</option>
                            <option value="Broker">Broker</option>
                            <option value="Assistant Broker Jab">Assistant Broker Jab</option>
                            <option value="Junior Broker">Junior Broker</option>                                          
                        </select>
						<span id="brokerType_error" style="color: red"></span>
                    </div>
					<div class="col-md-3">
					    <label>Select Broker Percentage*:</label>
                        <select name="broker_commision" id="broker_commision">
						    <option value="0">--Select Percentage--</option>
                            <option value="60%">60%</option>
                            <option value="50%">50%</option>
                            <option value="40%">40%</option>
                            <option value="30%">30%</option>                                          
                        </select>
						<span id="brokerCommision_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
				        <button class="btn btn-primary text-light px-3 mb-0" style="color:#fff; background: #a36626 !important;" type="button">Back</button>
					</div>
				</div>
                </div>
                </div>				
            </form>
		</div>
	</div>
</div>
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
@section('javascript')
@include('admin.js.inventory')
@endsection
@endsection
