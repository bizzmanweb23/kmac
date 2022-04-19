@extends('admin.layout.dashboard')

@section('content')

@foreach($result as $rows)
<section style="margin-top: 1in; margin-left: 5in; display: inline-block;" > 
	<div class="card" style="width:100%">
		<div class="card-header">
			<h5>Stock Out Edit</h5>
		</div>
		<div class="card-body">
			<form method="post" action="{{ route('update-stock-out') }}">@csrf
				<div class="row">
					<div class="col">
						<label>Date</label>
						<input type="hidden" name="id" value="{{ $rows->id }}">
						<input type="text" name="date" class="form-control" value="{{$rows->date}}">
					</div>
					<div class="col">
						<label>Delivary Order</label>
						<input type="text" name="delivary-order" class="form-control" value="{{$rows->delivary_order}}">
					</div>
					<div class="col">
						<label>Location</label>
						<input type="text" name="location" class="form-control" value="{{$rows->location}}">
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>item</label>
						<input type="text" name="item" class="form-control" value="{{$rows->item}}">
					</div>
					<div class="col">
						<label>Item Code</label>
						<input type="text" name="item-code" class="form-control" value="{{$rows->item_code}}">
					</div>
					<div class="col">
						<label>Qty Per Pcs</label>
						<input type="text" name="qty-per-pcs" class="form-control" value="{{$rows->qty_per_pcs}}">
					</div>
				</div>

				<div class="row">
					<div class="col">
						<label>Cost Per Pcs</label>
						<input type="text" name="cost-per-pcs" class="form-control" value="{{$rows->cost_per_pcs}}">
					</div> 
				</div>
				<div class="row mt-3 text-right">
					<div class="col ">
						<button class="btn btn-primary" type="submit">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endforeach

@endsection