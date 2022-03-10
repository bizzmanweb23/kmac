 <script>
 $('body').on('click','#save_inventoryDetails',function() {
	   //alert ('hello');
        var form = $('#inventory_details_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.inventory.store') }}",
			headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                $('#user_loder').show()
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success(data.message);
                }
				else{
					toastr.error();
				}
				
                $('#inventory_details_form').trigger("reset");
				window.location.href="{{ route('admin.inventory.index') }}";
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#Item_error').html(err.Item)
                    $('#item_code_error').html(err.item_code)
                    $('#quantity_in_error').html(err.quantity_in)
                    $('#cost_per_pcs_error').html(err.cost_per_pcs)
                    $('#total_cost_error').html(err.total_cost)
                    $('#quantity_out_error').html(err.quantity_out)
                    $('#on_hand_quantity_error').html(err.address)
                    $('#actual_quantity_error').html(err.city)
                    $('#adjustment_error').html(err.country)
                    if (err.Item) {
                        toastr.error(err.Item);
                    }
					if (err.item_code) {
                        toastr.error(err.item_code);
                    }
					if (err.quantity_in) {
                        toastr.error(err.quantity_in);
                    }
					if (err.cost_per_pcs) {
                        toastr.error(err.cost_per_pcs);
                    }
					if (err.total_cost) {
                        toastr.error(err.total_cost);
                    }
					if (err.quantity_out) {
                        toastr.error(err.quantity_out);
                    }
					if (err.on_hand_quantity_error) {
                        toastr.error(err.on_hand_quantity_error);
                    }
					if (err.actual_quantity) {
                        toastr.error(err.actual_quantity);
                    }
					if (err.adjustment) {
                        toastr.error(err.adjustment);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#inventory_details_form :input').click(function() {
        $('#Item_error').html('')
        $('#item_code_error').html('')
        $('#quantity_in_error').html('')
        $('#cost_per_pcs_error').html('')
        $('#total_cost_error').html('')
        $('#quantity_out_error').html('')
        $('#on_hand_quantity_error').html('')
        $('#actual_quantity_error').html('')
        $('#adjustment_error').html('')
    })
	
</script>