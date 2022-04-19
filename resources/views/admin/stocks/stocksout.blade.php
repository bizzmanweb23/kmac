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
                            <li class="breadcrumb-link active">Stock Out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products view Start -->
	<div class="row data-table">
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card table-card">
        <div class="card-header pb-0">
        <h4>Stocks out</h4>
	 <a href="#addInventoryModal" class="btn btn-primary squer-btn" style="float:right;margin-top: -28px;" data-toggle="modal"><span>Add Stocks In</span></a>
 
	
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover border table-sm" id="example"  >                
            <thead>  
                <th>Sno</th>
                <th>Date</th>
                <th>Delivary Order</th> 
                <th>Location</th>
                <th>Item</th>
                <th>Item Code</th>
                <th>Qty Per Pcs</th>
                <th>Cost Per Pcs $</th> 
                <th>Sub Cost $</th>
                <th>Action</th>
            </thead>
            <tbody>
           @foreach($stocksout as $rows)
            <tr>
                <td>{{ $rows->id  }}</td>
                <td>{{ $rows->date }}</td>
                <td>{{ $rows->delivary_order }}</td>
                <td>{{ $rows->location }}</td>
                <td>{{ $rows->item }}</td>
                <td>{{ $rows->item_code }}</td>
                <td>{{ $rows->qty_per_pcs }}</td>
                <td><span>$ </span>{{ $rows->cost_per_pcs }}</td>
                <td><span>$ </span>{{ $rows->sub_cost }}</td>
                <td>
                    <a href="javascript:void(0)" class="delete p-3" value='{{$rows->id}}'>
                        <i class="fa fa-trash-alt"></i>
                    </a>

                    <a href="javascript:void(0)" class="edit p-3" value='{{$rows->id}}'>
                        <i class="fa fa-edit"></i>
                    </a>
                  <!--   <a href="{{ route('stocksout-edit', $rows->id ) }}" class="  edit">
                        <i class="fa fa-edit"></i>
                    </a> -->
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
      
    </div> 
        
 
<div id="addInventoryModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content"> 
		<div class="card">
            <div class="card-header">
                <h5>Add New</h5>
            </div>
        <div class="card-body">
            <form method="post" action="{{ route('stockout-add') }}"> @csrf
                <div class="row">
                    <div class="col">
                        <label>Date</label>
                        <input type="text" name="date" class="form-control" >
                    </div>
                    <div class="col">
                        <label>Delivary Order</label>
                        <input type="text" name="delivary-order" class="form-control"  >
                    </div>
                    <div class="col">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>item</label>
                        <input type="text" name="item" class="form-control"  >
                    </div>
                    <div class="col">
                        <label>Item Code</label>
                        <input type="text" name="item-code" class="form-control"  >
                    </div>
                    <div class="col">
                        <label>Qty Per Pcs</label>
                        <input type="text" name="qty-per-pcs" class="form-control"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Cost Per Pcs</label>
                        <input type="text" name="cost-per-pcs" class="form-control"  >
                    </div> 
                </div>
                <div class="row mt-3  ">
                    <div class="col ">
                        <button class="btn btn-primary" type="submit">Add new</button>
                         <button class="cancel btn btn-danger" type="button" >Cancel</button> 
                    </div>
                </div>
            </form>  
        </div>      
        </div>
		</div>
	</div>
</div> 

<section class="edit-form">
    <div class="card">
        <div class="card-header">
            <h5>Edit Stock Out</h5>
        </div>
        <div class="card-body">
             <form method="post" class="update-stockout"> 
                <div class="row">
                    <div class="col">
                        <label>Date</label>
                        <input type="hidden" name="id" class="id">
                        <input type="text" name="date" class="date form-control" >
                    </div>
                    <div class="col">
                        <label>Delivary Order</label>
                        <input type="text" name="delivary-order" class="delivary-order form-control"  >
                    </div>
                    <div class="col">
                        <label>Location</label>
                        <input type="text" name="location" class="location form-control"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>item</label>
                        <input type="text" name="item" class=" item form-control"  >
                    </div>
                    <div class="col">
                        <label>Item Code</label>
                        <input type="text" name="item-code" class="item-code form-control"  >
                    </div>
                    <div class="col">
                        <label>Qty Per Pcs</label>
                        <input type="text" name="qty-per-pcs" class="qty-per-pcs form-control"  >
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Cost Per Pcs</label>
                        <input type="text" name="cost-per-pcs" class="cost-per-pcs form-control"  >
                    </div> 
                </div>
                <div class="row mt-3  ">
                    <div class="col ">
                        <button class="update btn btn-primary" type="button"  >Add new</button>
                         <button class="cancel btn btn-danger" type="button" >Cancel</button> 
                    </div>
                </div>
            </form>  
        </div>
    </div>
</section>
</div></div>

<div id="showView"></div>
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

        $(document).on('click', '.delete', function(){
           
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
                // Swal.fire(
                //   'Deleted!',
                //   'Your file has been deleted.',
                //   'success'
                // )
                $.ajax({
                url : '{{ url("stockout/delete") }}'+'/'+id,
                type : 'post', 
                success : function(data){
                    location.reload();
                }
            });
              }
            });
          
        });

        $('.edit-form').hide();

        $(document).on('click', '.edit', function(){
            $('.data-table').hide();
            $('.edit-form').show();
            var id = $(this).attr('value');
            
            $.ajax({
                url : "{{url('stockout/edit')}}"+'/'+id,
                type : "post",
                dataType : 'json',
                success : function(data){
                   $.each(data, function(key , value){
                    
                    $('.id').val(value.id);
                    $('.date').val(value.date);
                    $('.delivary-order').val(value.delivary_order);
                    $('.location').val(value.location);

                    $('.item').val(value.item);
                    $('.item-code').val(value.item_code);
                    $('.qty-per-pcs').val(value.qty_per_pcs);

                    $('.cost-per-pcs').val(value.cost_per_pcs);
                    $('.delivary-order').val(value.delivary_order);
                    
                   });
                }
            });
        });

        $(document).on('click','.update', function(e){
            e.preventDefault();
            var rows = $('.update-stockout').serialize();
            $.ajax({
                url: '{{ url("update/stockout") }}',
                type : 'post',
                data : rows, 
                success : function(data){
                    
                     location.reload();
                     
                }
            });
        });
    }); 
     
   
</script>
@endsection
 
