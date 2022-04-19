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
	<div class="row items-table" >
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
        <div class="card-header pb-0">
        <h4>Inventory Master</h4>
	 <a href="#addInventoryModal" class="btn btn-primary squer-btn" style="float:right;margin-top: -28px;" data-toggle="modal"><span>Add Inventory</span></a>
  </div>
        <div class="card-body">
            <table class="table table-striped table-hover border table-sm" id="example"   >                
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
                    <a href="{{ route('delete-item', $rows->id) }}" class="p-3 delete" >
                        <i class="fa fa-trash-alt"></i>
                    </a>
                    <a href="javascript:void(0)" class="p-3 edit-row" value="{{$rows->id}}">
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
    <section class="edit-modal" id='edit-modal'> 
    <form class='update-form'>  
    <div class="card">
                    <div class="card-header">
                        <h4 class='heading'>
                            Edit Item
                        </h4>
                    </div>
                <div class="card-body">
				
                <div class="row">
                    <div class="col-md-6">
					    <label>Item:</label>
                        <input type="hidden" class='id' name='id'>
                        <input type="text" class="form-control item_name"  
                               placeholder="Item" name="item_name"> 
						<span id="Item_error" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
		                <label>Item Code:</label>
                        <input type="text" class="form-control item_code" id="item_code"
                               placeholder="Item Code" name="item_code"> 
						<span id="item_code_error" style="color: red"></span>
                    </div>					
                </div> 
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-4">
                    <button type="button" class="btn btn-primary updateForm" id="">Save</button>
                       <button class="cancel btn btn-danger" type="button" >Cancel</button> 
  
		        </div>
				</div>
</form>
    </section>       
 
<div id="addInventoryModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content"> 
		  <form method="post" id="inventory_master_form"> @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class='heading'>
                            Add New Item
                        </h4>
                    </div>
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
              <button type="submit" class="btn btn-primary" id="save_inventoryDetails">Save</button>
                      
  
		        </div>
				</div>
                			
            </form>
		</div>
	</div>
</div> 

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
        $('.cancel').on('click', function(){
            location.reload();
        });
        loadItemList(); 
        
        edit_row();
        add_item();

        $('.edit-modal').hide();
    });
    function loadItemList(){
        $.ajax({
            url : '{{ url("get/inventory/items") }}',
            type : 'post', 
            dataType : 'Json',
            success: function(data){
                $.each(data, function(key , value){
                    $('.inv_items').append('<option>'+value.item_name+'</option>');
                     $('.inv_code').append('<option>'+value.item_code+'</option>');
                     
                });
            }
        });
    }
    function add_item(){
        $('#inventory_master_form').on('submit', function(e){ 
            e.preventDefault();
            var list = $(this).serialize(); 
                $.ajax({
                    url : '{{ url("add/inventory/item") }}',
                    type : 'post',
                    data : $(this).serialize(),
                    success: function(data){ 
                        location.reload();
                    }
            });
        });
    }
    // function delere_row(){
    //     $(document).on('click','.delete', function(){
    //         var id = $(this).attr('value');
             
    //         $.ajax({
    //             url : '{{ url("delete/item") }}'+'/'+id,
    //             type : 'post',
    //             data : id,
    //             success:function(data){
    //                 console.log(data);
    //             }
    //         });
    //     });
    // }
    function edit_row(){
        $(document).on('click','.edit-row', function(){ 
             
            $('.edit-modal').show();
            $('.items-table').hide();
            var id = $(this).attr('value');
            $.ajax({
                url : '{{ url("get/selected/item") }}'+'/'+id,
                type : 'get',
                data : id,
                dataType: 'json', 
                success: function(data){
                   $.each(data, function(key,value){
                    
                     $('.id').val(value.id);
                     $('.item_name').val(value.item_name);
                     $('.item_code').val(value.item_code);
                   });
                }
            }); 
             

        });
        //update form method

        $('.updateForm').on('click', function(e){
            e.preventDefault();
            var form = $('.update-form').serialize();
           
            $.ajax({
                url : '{{ url("update/item") }}',
                type : 'post',
                data : form,

                successs : function(data){  
                    location.reload();
                    
                }
            });
        });
    }
    
     
   
</script>
@endsection
 
