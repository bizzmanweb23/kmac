 <script>
 $('body').on('click','#saveEmployeeDetail',function() {
	   //alert ('hello');
        var form = $('#employee_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ route('admin.employee.store') }}",
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
				window.location.href="{{ route('admin.employee.index') }}";
                $('#user_loder').hide()
            },
            error: function(error) {
                $('#user_loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#employee_image_error').html(err.employee_image)
                    $('#member_name_error').html(err.member_name)
                    $('#jobPosition_error').html(err.jobPosition)
                    $('#mobile_number_error').html(err.mobile_number)
                    $('#department_error').html(err.department)
                    $('#manager_error').html(err.manager)
                    $('#email_address_error').html(err.email_address)
                    $('#default_customer_error').html(err.default_customer)
                    $('#password_error').html(err.password)
                    $('#address_error').html(err.address)
                    $('#country_error').html(err.country)
                    $('#emaiAddress_error').html(err.emaiAddress)
                    $('#Identification_number_error').html(err.Identification_number)
                    $('#contact_number_error').html(err.contact_number)
                    $('#passport_number_error').html(err.passport_number)
                    $('#bank_account_error').html(err.bank_account)
                    $('#gender_error').html(err.gender)
                    $('#work_distance_error').html(err.work_distance)
                    $('#date_of_birth_error').html(err.date_of_birth)
                    $('#place_of_birth_error').html(err.place_of_birth)
                    $('#country_of_birth_error').html(err.country_of_birth)
                    $('#marital_status_error').html(err.marital_status)
                    $('#id_name_error').html(err.id_name)
                    $('#id_number_error').html(err.id_number)
                    $('#id_file_error').html(err.id_file)
                    $('#certification_level_error').html(err.certification_level)
                    $('#field_of_study_error').html(err.field_of_study)
                    $('#school_error').html(err.school)
                    if (err.employee_image) {
                        toastr.error(err.employee_image);
                    }
					if (err.member_name) {
                        toastr.error(err.member_name);
                    }
					if (err.jobPosition) {
                        toastr.error(err.jobPosition);
                    }
					if (err.mobile_number) {
                        toastr.error(err.mobile_number);
                    }
					if (err.department) {
                        toastr.error(err.department);
                    }
					if (err.manager) {
                        toastr.error(err.manager);
                    }
					if (err.email_address) {
                        toastr.error(err.email_address);
                    }
					if (err.default_customer) {
                        toastr.error(err.default_customer);
                    }
					if (err.password) {
                        toastr.error(err.password);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.country) {
                        toastr.error(err.country);
                    }
					if (err.emaiAddress) {
                        toastr.error(err.emaiAddress);
                    }
					if (err.Identification_number) {
                        toastr.error(err.Identification_number);
                    }
					if (err.contact_number) {
                        toastr.error(err.contact_number);
                    }
					if (err.passport_number) {
                        toastr.error(err.passport_number);
                    }
					if (err.bank_account) {
                        toastr.error(err.bank_account);
                    }
					if (err.gender) {
                        toastr.error(err.gender);
                    }
					if (err.work_distance) {
                        toastr.error(err.work_distance);
                    }
					if (err.date_of_birth) {
                        toastr.error(err.date_of_birth);
                    }
					if (err.place_of_birth) {
                        toastr.error(err.place_of_birth);
                    }
					if (err.country_of_birth) {
                        toastr.error(err.country_of_birth);
                    }
					if (err.marital_status) {
                        toastr.error(err.marital_status);
                    }
					if (err.id_name) {
                        toastr.error(err.id_name);
                    }
					if (err.id_number) {
                        toastr.error(err.id_number);
                    }
					if (err.id_file) {
                        toastr.error(err.id_file);
                    }
					if (err.certification_level) {
                        toastr.error(err.certification_level);
                    }
					if (err.field_of_study) {
                        toastr.error(err.field_of_study);
                    }
					if (err.school) {
                        toastr.error(err.school);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#employee_form :input').click(function() {
        $('#employee_image_error').html('')
        $('#member_name_error').html('')
        $('#jobPosition_error').html('')
        $('#mobile_number_error').html('')
        $('#department_error').html('')
        $('#manager_error').html('')
        $('#email_address_error').html('')
        $('#default_customer_error').html('')
        $('#password_error').html('')
        $('#address_error').html('')
        $('#country').html('')
        $('#emaiAddress').html('')
        $('#Identification_number').html('')
        $('#contact_number').html('')
        $('#passport_number_error').html('')
        $('#bank_account_error').html('')
        $('#gender_error').html('')
        $('#work_distance_error').html('')
        $('#date_of_birth_error').html('')
        $('#place_of_birth_error').html('')
        $('country_of_birth_error').html('')
        $('marital_status_error').html('')
        $('id_name_error').html('')
        $('id_file_error').html('')
        $('certification_level_error').html('')
        $('field_of_study_error').html('')
        $('school_error').html('')
    })
	
	$('body').on('click','#viewProfile',function(){
		var id=$(this).attr('rel');
    $.ajax({
    url: "{{ route('admin.view_employee_details') }}",
    type: "get",
    data: 
	{
        "_token": "{{ csrf_token() }}",
         id: id
    },
    dataType: "html",
    beforeSend: function() 
	{
        $('#user_loder').show()
    },
    success: function(data) 
	{
        $('#user_loder').hide();
        $('#show_employeeDetails').html(data);
        $('#editEmployeeModal').modal('show');			
    },
    error: function() 
	{
        $('#user_loder').hide();
        alert("Fail")
    }
    })
	})
	
	$('body').on('click','#EditEmployeeDetail',function(){
		var empId = $('#edit_employee_id').val();
                var form = $('#edit_employee_form')[0];
                var data = new FormData(form);
				data.append('id',empId)
				var url= "{{ route('admin.edit_employee_details') }}";
                toastr.options = 
				{
                    "closeButton": true,
                    "newestOnTop": true,
                    "positionClass": "toast-top-right"
                };
            $.ajax
			({
                url: url,
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
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        $('#editEmployeeModal').modal("hide");
				        window.location.href="{{ route('admin.employee.index') }}";
                        $('#user_loder').hide()
                }
				else{
					toastr.error();
				}
            },
            error: function(error) 
			{
                $('#user_loder').hide()
				var err = error.responseJSON.errors;
				if (error.status == 422) {
                     toastr.error("Error");
                    $('#member_name_error').html(err.member_name)
                    $('#jobPosition_error').html(err.jobPosition)
                    $('#mobile_number_error').html(err.mobile_number)
                    $('#department_error').html(err.department)
                    $('#manager_error').html(err.manager)
                    $('#email_address_error').html(err.email_address)
                    $('#default_customer_error').html(err.default_customer)
                    $('#password_error').html(err.password)
                    $('#address_error').html(err.address)
                    $('#country_error').html(err.country)
                    $('#emaiAddress_error').html(err.emaiAddress)
                    $('#Identification_number_error').html(err.Identification_number)
                    $('#contact_number_error').html(err.contact_number)
                    $('#passport_number_error').html(err.passport_number)
                    $('#bank_account_error').html(err.bank_account)
                    $('#gender_error').html(err.gender)
                    $('#work_distance_error').html(err.work_distance)
                    $('#date_of_birth_error').html(err.date_of_birth)
                    $('#place_of_birth_error').html(err.place_of_birth)
                    $('#country_of_birth_error').html(err.country_of_birth)
                    $('#marital_status_error').html(err.marital_status)
                    $('#id_name_error').html(err.id_name)
                    $('#id_number_error').html(err.id_number)
                    $('#certification_level_error').html(err.certification_level)
                    $('#field_of_study_error').html(err.field_of_study)
                    $('#school_error').html(err.school)
					if (err.member_name) {
                        toastr.error(err.member_name);
                    }
					if (err.jobPosition) {
                        toastr.error(err.jobPosition);
                    }
					if (err.mobile_number) {
                        toastr.error(err.mobile_number);
                    }
					if (err.department) {
                        toastr.error(err.department);
                    }
					if (err.manager) {
                        toastr.error(err.manager);
                    }
					if (err.email_address) {
                        toastr.error(err.email_address);
                    }
					if (err.default_customer) {
                        toastr.error(err.default_customer);
                    }
					if (err.password) {
                        toastr.error(err.password);
                    }
					if (err.address) {
                        toastr.error(err.address);
                    }
					if (err.country) {
                        toastr.error(err.country);
                    }
					if (err.emaiAddress) {
                        toastr.error(err.emaiAddress);
                    }
					if (err.Identification_number) {
                        toastr.error(err.Identification_number);
                    }
					if (err.contact_number) {
                        toastr.error(err.contact_number);
                    }
					if (err.passport_number) {
                        toastr.error(err.passport_number);
                    }
					if (err.bank_account) {
                        toastr.error(err.bank_account);
                    }
					if (err.gender) {
                        toastr.error(err.gender);
                    }
					if (err.work_distance) {
                        toastr.error(err.work_distance);
                    }
					if (err.date_of_birth) {
                        toastr.error(err.date_of_birth);
                    }
					if (err.place_of_birth) {
                        toastr.error(err.place_of_birth);
                    }
					if (err.country_of_birth) {
                        toastr.error(err.country_of_birth);
                    }
					if (err.marital_status) {
                        toastr.error(err.marital_status);
                    }
					if (err.id_name) {
                        toastr.error(err.id_name);
                    }
					if (err.id_number) {
                        toastr.error(err.id_number);
                    }
					if (err.certification_level) {
                        toastr.error(err.certification_level);
                    }
					if (err.field_of_study) {
                        toastr.error(err.field_of_study);
                    }
					if (err.school) {
                        toastr.error(err.school);
                    }
                }
                console.log(error)
            }
        })
	})
	
		$('#edit_employee_form :input').click(function() {
        $('#member_name_error').html('')
        $('#jobPosition_error').html('')
        $('#mobile_number_error').html('')
        $('#department_error').html('')
        $('#manager_error').html('')
        $('#email_address_error').html('')
        $('#default_customer_error').html('')
        $('#password_error').html('')
        $('#address_error').html('')
        $('#country').html('')
        $('#emaiAddress').html('')
        $('#Identification_number').html('')
        $('#contact_number').html('')
        $('#passport_number_error').html('')
        $('#bank_account_error').html('')
        $('#gender_error').html('')
        $('#work_distance_error').html('')
        $('#date_of_birth_error').html('')
        $('#place_of_birth_error').html('')
        $('country_of_birth_error').html('')
        $('marital_status_error').html('')
        $('id_name_error').html('')
        $('certification_level_error').html('')
        $('field_of_study_error').html('')
        $('school_error').html('')
    })
</script>