 <script>
 $('body').on('click','#user_details',function() {
	   alert ('hello');
        var form = $('#user_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.user.store') }}",
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
				
                $('#user_form').trigger("reset");
				window.location.href="{{ route('admin.user.index') }}";
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#user_image_error').html(err.user_image)
                    $('#user_name_error').html(err.user_name)
                    $('#email_address_error').html(err.email_address)
                    $('#contact_number_error').html(err.contact_number)
                    $('#paswword_error').html(err.paswword)
                    $('#confirm_password_error').html(err.confirm_password)
                    $('#address_error').html(err.address)
                    $('#city_error').html(err.city)
                    $('#country_error').html(err.country)
                    $('#bio_info_error').html(err.bio_info)
                    if (err.user_image) {
                        toastr.error(err.user_image);
                    }
					if (err.user_name) {
                        toastr.error(err.user_name);
                    }
					if (err.email_address) {
                        toastr.error(err.email_address);
                    }
					if (err.contact_number) {
                        toastr.error(err.contact_number);
                    }
					if (err.paswword) {
                        toastr.error(err.paswword);
                    }
					if (err.confirm_password) {
                        toastr.error(err.confirm_password);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.city) {
                        toastr.error(err.city);
                    }
					if (err.country) {
                        toastr.error(err.country);
                    }
					if (err.bio_info) {
                        toastr.error(err.bio_info);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#user_form :input').click(function() {
        $('#user_image_error').html('')
        $('#user_name_error').html('')
        $('#email_address_error').html('')
        $('#contact_number_error').html('')
        $('#paswword_error').html('')
        $('#confirm_password_error').html('')
        $('#address_error').html('')
        $('#city_error').html('')
        $('#country_error').html('')
        $('#bio_info_error').html('')
    })
</script>