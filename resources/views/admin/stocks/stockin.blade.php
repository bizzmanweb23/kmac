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
                <th>Item</th>
                <th>Item Code</th> 
                <th>Package Size</th>
                <th>Qty</th>
                <th>Qty Expanded</th>
                <th>Cost Per Pack</th>
                <th>Cost Per Pcs</th> 
                <th>Action</th>
            </thead>
            <tbody>
           @foreach($stocksin as $rows)
            <tr>
                <td>{{$rows->id}}</td>
                <td>{{ $rows->item }}</td>
                <td>{{ $rows->item_code }}</td>
                <td>{{ $rows->pkg_size }}</td>
                <td>{{ $rows->pkg_qty }}</td>
                <td>{{ $rows->pkg_qty_expanded }}</td>
                <td><span>$ </span>{{$rows->cost_per_pack}}</td>
                <td><span>$ </span>{{$rows->cost_per_pcs}}</td>

                <td>
                    <a href="javascript:void(0)" class="btn btn-prmary btn-sm mx-3 delete" id='delete' value="{{$rows->id}}" data='{{$rows->item}}'>
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
                Stock In
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
    
    $(document).ready(function(){ 
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        }); 
        $('.cancel').on('click',function(){
           location.reload();
        });
        $('#example').dataTable({
            "pagingType": "full_numbers"
        }); 

        $.ajax({
            url: '{{ url("inventory/items") }}',
            type : 'post', 
            dataType: 'json', 
                success : function(data){
                    res = data['items']; 
                    $.each(res, function(key, values){  
                    $('.items_list').append('<option  getname='+values.item_name+' value='+values.item_name+'>'+values.item_name+'</option>');
                    
                    });

                }
        });
        //add new stock
         $('#add_form_div').hide();
         
        $(document).on('click','.show-add-form',function(){
            $('#display-table').hide();
            $('#add_form_div').show();
            
        });
        
        $(document).on('submit','.add_stock_form', function(e){
            e.preventDefault();
            //
            itemName = $('.item').val();
            itemCode = $('.item_code').val(); 
            pkgSize = $('.pkg_size').val();
            qty = $('.qty').val();
            qtyExpanded = $('.qty_expanded').val(); 
            costPerPack = $('.cost_per_pack').val();
            costPerPcs = $('.cost_per_pcs').val();
           
            if(itemName.length < 1){
                 $('.item_error').text('Please Fill Item Name');
            }
            else{
                $('.item_error').text('');
            }
            if(itemCode.length < 1){
                 $('.item_code_error').text('Please Fill Item Code'); 
            }
            else{
                 $('.item_code_error').text('');
            }
            if(pkgSize.length < 1){
                 $('.pkg_size_error').text('Please Fill Package Size');
            }
            else{
                $('.pkg_size_error').text('');
            }
            if(qty.length < 1){
                 $('.qty_error').text('Please Fill Quantity Error');
            }
            else{
                $('.qty_error').text('');
            }
            if(qtyExpanded < 1){
                 $('.qty_expanded_error').text('Please Fill Quantity Expanded');
            }
            else{
                 $('.qty_expanded_error').text('');
            }
            if(costPerPack.length < 1){
                 $('.cost_per_pack_error').text('Please Fill Cost Per Pack');
            }
            else{
                $('.cost_per_pack_error').text('');          
            }
            if(costPerPcs.length < 1){
                 $('.cost_per_pcs_error').text('Please Fill Cost Per Pcs');
            } 
            else{
                $('.cost_per_pcs_error').text('');         
            }
            $.ajax({
                url : '{{ route("addNewStock") }}',
                type : 'post',
                data : $(this).serialize(),
                success : function(response){
                       alert(response);
                }
            });
          
        });
        $(document).on('change','.items_list', function(){ 
        var getname = $('option:selected').attr('getname'); 
        var itemValue = $("option:selected").html();
        var str = $("option:selected").text(); 
        id = itemValue;
          console.log(itemValue); 
        if(id){
            $.ajax({
            url : '{{ url("item/code") }}'+'/'+id,
            type : 'post',
            dataType : 'json',

            success : function(data){  

                // $.each(data, function(key ,value){
                //     name = value.item_code 
                //     $('.item-code').val(value.item_code);
                //     $('.qty-in').val(value.qty_in);
                //     $('.cost-per-pcs').val(value.cost_per_pcs);
                //     $('.total-cost').val(value.total_cost);
                //     $('.qty-out').val(value.qty_out);
                //     $('.on-hand-qty').val(value.on_hand_qty);
                //     $('.actual_qty').val(value.actual_qty);
                //     $('.adjustment').val(value.adjustment); 
                // });  
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
        
        $('.edit-form').hide();
  
        $(document).on('click', '.edit',function(){
             
            $('.edit-form').show();
            $('#display-table').hide();
            var id = $(this).attr('value'); 
            $.ajax({
                url : "{{url('stockin/edit')}}"+"/"+id,
                type : "get",
                data : id,
                dataType:'json',
                success : function(data){
                    $.each(data, function(key, value){ 
                        $('.id').val(value.id);
                        $('.item').val(value.item);
                        $('.item_code').val(value.item_code);
                        $('.pkg_size').val(value.pkg_size);
                        $('.qty').val(value.pkg_qty);
                        $('.qty_expanded').val(value.pkg_qty_expanded); 
                        $('.cost_per_pack').val(value.cost_per_pack);
                        $('.cost_per_pcs').val(value.cost_per_pcs);
                    });
                }
            });
        });
        
        $('.updateStockIn').on('submit', function(e){
            e.preventDefault(); 
            
            $.ajax({
               url : "{{ route('updateStockIn') }}",
               type : "post",
               data : $(this).serialize(),
               success :function(result){
                   console.log(result);
               }
            });
        });

        $(document).on('click', '.delete',function(){ 
            var id = $(this).attr('value'); 
            var item = $(this).attr('data');
            Swal.fire({
                  title: 'Are you sure want to Delete',
                  text: item,
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) { 
                    // Swal.fire(
                    //   'Deleted!',
                    //   'Your file has been deleted.',
                    //   'success'
                    // )

                      $.ajax({
                            url : "{{url('stockin/delete')}}"+"/"+id,
                            type : "get",
                            data : id,
                            success : function(data){ 
                               location.reload();
                            }
                        });
                  }
            });

            
        });
        
      

    }); 
     
   
</script>
@endsection
 
