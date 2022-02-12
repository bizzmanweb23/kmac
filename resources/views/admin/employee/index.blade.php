@extends('admin.layout.dashboard')

@section('content')
          <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                          
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.html"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active"> Employee Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Start -->
                
                <div class="row">
                    <div class="col-lg-12">
						<div class="card">
                            <div class="card-body">
                                <div class="mfh-machine-profile">
                                    <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab20" data-toggle="tab" href="#profile0" role="tab" aria-controls="profile" aria-selected="false">Department</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content ad-content2" id="myTabContent2">
                                        <div class="tab-pane fade active show" id="home0" role="tabpanel">
                                            <br>
                                            <div class="page-title-box">
                                                <h4 class="page-title"><button type="button" class="btn btn-primary squer-btn" data-toggle="modal" data-target=".bd-example-modal-lg">ADD EMPLOYEE</button></h4>
                                            </div>
                                            <br><br>
                                            <div class="card-body">
                                                <div class="row">
												  <?php
												  foreach($result as $data)
												  {
												  ?>
                                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                                        <div class="prooduct-details-box">                                 
                                                            <div class="media">
                                                                <img src="asset/employeeImg/<?php echo $data->employee_image;?>" alt="">
                                                                <div class="media-body ms-3">
                                                                    <div class="product-name">
                                                                        <h6><a href="#" title=""><?php echo $data->member_name;?></a></h6>
                                                                    </div>
                                                                    <div class="price"> 
                                                                        <div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> <?php echo $data->mobile_number;?></div>
                                                                    </div>
                                                                    <div class="avaiabilty">
                                                                        <div class="text-success"><i class="fa fa-envelope"></i> <?php echo $data->email_address;?></div>
                                                                        <button type="button" class="btn btn-primary squer-btn" rel="<?php echo $data->id;?>" id="viewProfile"> View Profile <i class="fas fa-angle-right"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<?php
												      }
												    ?>
                                                </div>
                                                <div class="ad-load-btn">
                                                    <button class="btn btn-primary squer-btn mt-2 mr-2" data-original-title="" title=""><i class="fa fa-spin fa-spinner mr-2"></i>Load More</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile0" role="tabpanel">
                                            <h4 class="page-title"><button type="button" class="btn btn-primary squer-btn" data-toggle="modal" data-target=".bd-example1-modal-lg">ADD DEPARTMENT</button></h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="department-box">
                                                        <h4>Departname Name</h4>
                                                        <button class="btn btn-primary">Employee</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
                                </div>
                            </div>
					    </div>
					</div>
                </div>    
<!-- this is large modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
				    <form method="post" enctype="multipart/form-data" id="employee_form">
			        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="myLargeModalLabel">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row add-profile-user">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <img src="{{ asset('asset/image/user3.jpg') }}" alt="" class="rounded-circle ">
                                    <label for="employee_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input type="file" style="display: none" name="employee_image" id="employee_image">
                                        <span id="employee_image_error" style="color: red"></span>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="member_name" class="col-form-label">Your Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Name" name="member_name" id="member_name">
										<span id="member_name_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jobPosition" class="col-form-label">Job Position</label>
                                        <select class="select2 form-control" id="jobPosition" name="jobPosition">
                                            <option value="Director">Director</option>
                                            <option value="Trainee">Trainee</option>
                                            <option value="CEO">CEO</option>											
                                        </select>
										<span id="jobPosition_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_number" class="col-form-label">Mobile</label>
                                        <input class="form-control" type="text" placeholder="Contact Number" name="mobile_number" id="mobile_number">
										<span id="mobile_number_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department" class="col-form-label">Department</label>
                                        <select class="select2 form-control" id="department" name="department">
                                            <option value="Management">Management</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Administration">Administration</option>
                                        </select>
										<span id="department_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="manager" class="col-form-label">Manager</label>
                                        <select class="select2 form-control" id="Manager" name="manager">
                                            <option value="Management">Management</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Administration">Administration</option>
                                        </select>
										<span id="manager_error" style="color: red"></span>
								    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_address" class="col-form-label">Work Email</label>
                                        <input class="form-control" type="email" placeholder="Enter Your Email" name="email_address" id="email_address">
										<span id="email_address_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="default_customer" class="col-form-label">Default Customer</label>
                                        <input class="form-control" type="text" placeholder="customer" name="default_customer" id="default_customer">
										<span id="default_customer_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input class="form-control" type="password" placeholder="********" name="password"  id="password">
										<span id="password_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                                    </li>
                                </ul>
                                <div class="tab-content ad-content2" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" placeholder="Address here" name="address" id="address">
													<span id="address_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country" class="col-form-label">Country</label>
                                                    <input class="form-control" type="text" placeholder="country name" name="country" id="country">
													<span id="country_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emaiAddress" class="col-form-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="Your Email" name="emaiAddress" id="emaiAddress">
													<span id="emaiAddress_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Identification_number" class="col-form-label">Identification No.</label>
                                                    <input class="form-control" type="text" placeholder="ID NO." name="Identification_number" id="Identification_number">
													<span id="Identification_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_number" class="col-form-label">Mobile</label>
                                                    <input class="form-control" type="text" placeholder="Contact Number" name="contact_number" id="contact_number">
													<span id="contact_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="passport_number" class="col-form-label">Passport No.</label>
                                                    <input class="form-control" type="text" placeholder="passport no." name="passport_number" id="passport_number">
													<span id="passport_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_account" class="col-form-label">Bank Account</label>
                                                    <input class="form-control" type="text" placeholder="Bank account no." name="bank_account" id="bank_account">
													<span id="bank_account_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender" class="col-form-label">Gender</label>
                                                    <select class="select2 form-control" id="Gender" name="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
													<span id="gender_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="work_distance" class="col-form-label">Home Work Distance</label>
                                                    <input class="form-control" type="text" placeholder=" Distance" name="work_distance" id="work_distance">
													<span id="work_distance_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth" class="col-form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" placeholder="" name="date_of_birth" id="date_of_birth">
													<span id="date_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="place_of_birth" class="col-form-label">Place of birth</label>
                                                    <input class="form-control" type="text" placeholder="Birth Place" name="place_of_birth" id="place_of_birth">
													<span id="place_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country_of_birth" class="col-form-label">Country of Birth</label>
                                                    <input class="form-control" type="text" placeholder="Country of birth" name="country_of_birth" id="country_of_birth">
													<span id="country_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marital_status" class="col-form-label">Marital Status</label>
                                                    <select class="select2 form-control" name="marital_status" id="marital_status">
                                                        <option value="Married">Married</option>
                                                        <option value="Single">Single</option>
                                                    </select>
													<span id="marital_status_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_name" class="col-form-label">ID name</label>
                                                    <input class="form-control"  type="text" placeholder="id name" name="id_name" id="id_name">
													<span id="id_name_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_number" class="col-form-label">ID No.</label>
                                                    <input class="form-control" type="text" placeholder="ID No." name="id_number" id="id_number">
													<span id="id_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_file" class="col-form-label">ID File</label>
                                                    <input class="form-control" type="file" placeholder="" name="id_file" id="id_file">
													<span id="id_file_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                                                                                                
                                                <div class="form-group">
                                                    <label for="certification_level" class="col-form-label">Certification Level</label>
                                                    <select class="select2 form-control" id="certification_level" name="certification_level">
                                                        <option value="Graduate">Graduate</option>
                                                        <option value="PG"> Post Graduate</option>
                                                        <option value="Masters"> Masters</option>
                                                    </select>
													<span id="certification_level_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field_of_study" class="col-form-label">Field of study</label>
                                                    <input class="form-control" type="text" name="field_of_study" placeholder="Field of study" id="field_of_study">
													<span id="field_of_study_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="school" class="col-form-label">School</label>
                                                        <input class="form-control" type="text" placeholder="School" name="school" id="school">
														<span id="school_error" style="color: red"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="button" id="saveEmployeeDetail">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
			</div>
		</div>

<!-- this is an Edit Modal -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
				    <form method="post" enctype="multipart/form-data" id="employee_form">
			        @csrf
                    <div class="modal-header">
                        <h5 class="modal-title h4">Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row add-profile-user">
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <img src="{{ asset('asset/image/user3.jpg') }}" alt="" class="rounded-circle ">
                                    <label for="employee_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input type="file" style="display: none" name="employee_image" id="employee_image">
                                        <span id="employee_image_error" style="color: red"></span>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="member_name" class="col-form-label">Your Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Name" name="member_name" id="member_name">
										<span id="member_name_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jobPosition" class="col-form-label">Job Position</label>
                                        <select class="select2 form-control" id="jobPosition" name="jobPosition">
                                            <option value="Director">Director</option>
                                            <option value="Trainee">Trainee</option>
                                            <option value="CEO">CEO</option>											
                                        </select>
										<span id="jobPosition_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_number" class="col-form-label">Mobile</label>
                                        <input class="form-control" type="text" placeholder="Contact Number" name="mobile_number" id="mobile_number">
										<span id="mobile_number_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department" class="col-form-label">Department</label>
                                        <select class="select2 form-control" id="department" name="department">
                                            <option value="Management">Management</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Administration">Administration</option>
                                        </select>
										<span id="department_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="manager" class="col-form-label">Manager</label>
                                        <select class="select2 form-control" id="Manager" name="manager">
                                            <option value="Management">Management</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Administration">Administration</option>
                                        </select>
										<span id="manager_error" style="color: red"></span>
								    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_address" class="col-form-label">Work Email</label>
                                        <input class="form-control" type="email" placeholder="Enter Your Email" name="email_address" id="email_address">
										<span id="email_address_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="default_customer" class="col-form-label">Default Customer</label>
                                        <input class="form-control" type="text" placeholder="customer" name="default_customer" id="default_customer">
										<span id="default_customer_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input class="form-control" type="password" placeholder="********" name="password"  id="password">
										<span id="password_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                                    </li>
                                </ul>
                                <div class="tab-content ad-content2" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address" class="col-form-label">Address</label>
                                                    <input class="form-control" type="text" placeholder="Address here" name="address" id="address">
													<span id="address_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country" class="col-form-label">Country</label>
                                                    <input class="form-control" type="text" placeholder="country name" name="country" id="country">
													<span id="country_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emaiAddress" class="col-form-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="Your Email" name="emaiAddress" id="emaiAddress">
													<span id="emaiAddress_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Identification_number" class="col-form-label">Identification No.</label>
                                                    <input class="form-control" type="text" placeholder="ID NO." name="Identification_number" id="Identification_number">
													<span id="Identification_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_number" class="col-form-label">Mobile</label>
                                                    <input class="form-control" type="text" placeholder="Contact Number" name="contact_number" id="contact_number">
													<span id="contact_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="passport_number" class="col-form-label">Passport No.</label>
                                                    <input class="form-control" type="text" placeholder="passport no." name="passport_number" id="passport_number">
													<span id="passport_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_account" class="col-form-label">Bank Account</label>
                                                    <input class="form-control" type="text" placeholder="Bank account no." name="bank_account" id="bank_account">
													<span id="bank_account_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender" class="col-form-label">Gender</label>
                                                    <select class="select2 form-control" id="Gender" name="gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
													<span id="gender_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="work_distance" class="col-form-label">Home Work Distance</label>
                                                    <input class="form-control" type="text" placeholder=" Distance" name="work_distance" id="work_distance">
													<span id="work_distance_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth" class="col-form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" placeholder="" name="date_of_birth" id="date_of_birth">
													<span id="date_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="place_of_birth" class="col-form-label">Place of birth</label>
                                                    <input class="form-control" type="text" placeholder="Birth Place" name="place_of_birth" id="place_of_birth">
													<span id="place_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country_of_birth" class="col-form-label">Country of Birth</label>
                                                    <input class="form-control" type="text" placeholder="Country of birth" name="country_of_birth" id="country_of_birth">
													<span id="country_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marital_status" class="col-form-label">Marital Status</label>
                                                    <select class="select2 form-control" name="marital_status" id="marital_status">
                                                        <option value="Married">Married</option>
                                                        <option value="Single">Single</option>
                                                    </select>
													<span id="marital_status_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_name" class="col-form-label">ID name</label>
                                                    <input class="form-control"  type="text" placeholder="id name" name="id_name" id="id_name">
													<span id="id_name_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_number" class="col-form-label">ID No.</label>
                                                    <input class="form-control" type="text" placeholder="ID No." name="id_number" id="id_number">
													<span id="id_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_file" class="col-form-label">ID File</label>
                                                    <input class="form-control" type="file" placeholder="" name="id_file" id="id_file">
													<span id="id_file_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                                                                                                
                                                <div class="form-group">
                                                    <label for="certification_level" class="col-form-label">Certification Level</label>
                                                    <select class="select2 form-control" id="certification_level" name="certification_level">
                                                        <option value="Graduate">Graduate</option>
                                                        <option value="PG"> Post Graduate</option>
                                                        <option value="Masters"> Masters</option>
                                                    </select>
													<span id="certification_level_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field_of_study" class="col-form-label">Field of study</label>
                                                    <input class="form-control" type="text" name="field_of_study" placeholder="Field of study" id="field_of_study">
													<span id="field_of_study_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="school" class="col-form-label">School</label>
                                                        <input class="form-control" type="text" placeholder="School" name="school" id="school">
														<span id="school_error" style="color: red"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="button" id="saveEmployeeDetail">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
			</div>
		</div>			
<!-- this is department modal-->
        <div class="modal fade bd-example1-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="myLargeModalLabel">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="another-number" class="col-form-label">Department Name</label>
                                        <input class="form-control" type="text" placeholder=" Department name" id="another-number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label">Manager</label>
                                        <select class="select2 form-control" id="Manager">
                                            <option value="Manager1">Manager 1</option>
                                            <option value="Manager2">Manager 2</option>
                                            <option value="Manager3">Manager 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group mb-0">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="button">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@section('javascript')
@include('admin.js.employee')
@endsection
@endsection
