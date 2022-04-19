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
                            <li class="breadcrumb-link active">Stock In</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products view Start -->
	<div class="row">
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id='display-table'>
        <div class="card table-card">
        <div class="card-header pb-0">
        <h4>Stocks In</h4>
	<a href="javascript:void(0)" class="show-add-form btn btn-primary squer-btn" style="float:right;margin-top: -28px;" > Add Stock In </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover border table-sm" id="example"  >                
            <thead>  
                <th>Sno</th>
                <th>Name</th>
                <th>Image</th> 
                <th>Description</th>
                <th>Status</th> 
                <th>Action</th>
            </thead>
            <tbody>
           @foreach($assets as $rows)
            <tr>
                <td>{{$rows->id}}</td> 
                <td>{{$rows->name}}</td> 
                <td>{{$rows->image}}</td> 
                <td>{{$rows->description}}</td>
                <td>{{$rows->status}}</td>  

                <td>
                    <a href="javascript:void(0)" class="btn btn-prmary btn-sm mx-3 delete" id='delete' value="{{$rows->id}}" data='{{$rows->id}}'>
                        <i class="fa fa-trash-alt"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-prmary btn-sm mx-3 edit" id='edit' value="{{$rows->id}}">
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
    

 
<div id='add_form_div'> 
    <form id="addStockIn" class='add_stock_form'> 
    <div class="card">
        <div class="card-header">
            <h4>
                Add Status
            </h4>
        </div>
        <div class="card-body"> 
        <div class="row">
            <div class="col-md-6">
		    <label>Item*:</label> 
            <input class="form-control item" name='item' placeholder='Item Name'/>
            <span class="item_error" style="color: red"> </span>
            </div>
            <div class="col-md-6">
		    <label>Item Code*:</label>
            <input type="text" class="form-control item_code" id="item_code"
                    placeholder="Item Code" name="item_code"> 
		    <span class="item_code_error" style="color: red"></span>
            </div>					
            </div> 
            <br> 
            <div class="row">
                <div class="col">
                     <label>Package Size:</label>
                    <input type="text" class="form-control pkg_size" id="pkg_size"
                           placeholder="Item Code" name="pkg_size"> 
                    <span class="pkg_size_error" style="color: red"></span>
                </div>
                <div class="col">
                    <label>Quantity*:</label>
                    <input type="text" class="form-control qty" id="qty"
                           placeholder="Package Quantity" name="qty"> 
                    <span class="qty_error" style="color: red"></span>
                </div>
                <div class="col">
                    <label>Qty Expanded*:</label>
                    <input type="text" class="form-control qty_expanded" id="qty_expanded"
                           placeholder="Quantity Expanded" name="qty_expanded"> 
                    <span class="qty_expanded_error" style="color: red"></span>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Cost Per Pack*:</label>
                    <input type="text" class="form-control cost_per_pack" id="cost_per_pack"
                           placeholder="Cost Per Pack" name="cost_per_pack"> 
                    <span class="cost_per_pack_error" style="color: red"></span>
                </div>
                <div class="col-md-6">
                    <label>Cost Per Pcs*:</label>
                    <input type="text" class="form-control cost_per_pcs" id="cost_per_pcs"
                           placeholder="Cost Per Pcs" name="cost_per_pcs"> 
                    <span class="cost_per_pcs_error" style="color: red"></span>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                <button type="submit" class="btn btn-primary" id="save_inventoryDetails">Save</button>
                <button class="cancel btn btn-danger" type="button" data-dismiss="modal">Cancel</button> 
            </div>
		    </div> 
	</div>
    </div>            
    </form>
</div> 
<section>
<div class="edit-form"> 
    <form class="updateStockIn"> 
              <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit Stock In
                        </h4>
                    </div>
                <div class="card-body"> 
                <div class="row">
                    <div class="col-md-6">
		    <label>Item*:</label>
<!--                    <select class="items_list form-control form-sm" name='stock-item'></select>-->
                    <input type='hidden' class='id' name='id-value'/>
                    <input class="form-control item" name='item' placeholder='Item Name'/>
                    <span class="item_error" style="color: red"> </span>
                    </div>
                    <div class="col-md-6">
		    <label>Item Code*:</label>
                    <input type="text" class="form-control item_code" id="item_code"
                    placeholder="Item Code" name="item-code"> 
		    <span class="item_code_error" style="color: red"></span>
                    </div>					
                </div> <br>

                <div class="row">
                    <div class="col">
                         <label>Package Size:</label>
                        <input type="text" class="form-control pkg_size" id="pkg_size"
                               placeholder="Item Code" name="pkg-size"> 
                        <span class="pkg_size_error" style="color: red"></span>
                    </div>
                    <div class="col">
                         <label>Quantity*:</label>
                        <input type="text" class="form-control qty" id="qty"
                               placeholder="Package Quantity" name="qty"> 
                        <span class="qty_error" style="color: red"></span>
                    </div>
                    <div class="col">
                         <label>Qty Expanded*:</label>
                        <input type="text" class="form-control qty_expanded" id="qty_expanded"
                               placeholder="Quantity Expanded" name="qty-expanded"> 
                        <span class="qty_expanded_error" style="color: red"></span>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                         <label>Cost Per Pack*:</label>
                        <input type="text" class="form-control cost_per_pack" id="cost_per_pack"
                               placeholder="Cost Per Pack" name="cost-per-pack"> 
                        <span class="cost_per_pack_error" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                         <label>Cost Per Pcs*:</label>
                        <input type="text" class="form-control cost_per_pcs" id="cost_per_pcs"
                               placeholder="Cost Per Pcs" name="cost-per-pcs"> 
                        <span class="cost_per_pcs_error" style="color: red"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                    <button type="submit" class="btn btn-primary" id="update_stock">Save</button>
                    <button class="cancel btn btn-danger" type="button"  >Cancel</button> 
                    </div>
		</div> 
                </div>
                </div>
                 
                			
            </form>
</div> 
</section>
<div id="user_loder" style="display: none">
        @include('admin.loader.index')
</div> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
 
     
   
</script>
@endsection
 
