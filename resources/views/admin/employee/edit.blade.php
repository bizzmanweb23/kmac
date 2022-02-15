<form method="post" enctype="multipart/form-data" id="edit_employee_form">
			        @csrf
					<input type="hidden" id="edit_employee_id" value="<?php echo $result[0]->id;?>">
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
                                    <img src="asset/employeeImg/<?php echo $result[0]->employee_image;?>" alt="" class="rounded-circle ">
                                    <label for="employee_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
										<input type="hidden" id="oldFile" value="<?php echo $result[0]->employee_image;?>">
                                        <input type="file" style="display: none" name="employee_image" id="employee_image">
                                        <span id="employee_image_error" style="color: red"></span>
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="member_name" class="col-form-label">Your Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Your Name" value="<?php echo $result[0]->member_name;?>" name="member_name" id="member_name">
										<span id="member_name_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jobPosition" class="col-form-label">Job Position</label>
                                        <select class="select2 form-control" id="jobPosition" name="jobPosition">
                                            <option <?php if($result[0]->jobPosition == 'Director'){ echo 'selected';}?> value="Director">Director</option>
                                            <option <?php if($result[0]->jobPosition == 'Trainee'){ echo 'selected';}?> value="Trainee">Trainee</option>
                                            <option <?php if($result[0]->jobPosition == 'CEO'){ echo 'selected';}?> value="CEO">CEO</option>											
                                        </select>
										<span id="jobPosition_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile_number" class="col-form-label">Mobile</label>
                                        <input class="form-control" type="text" placeholder="Contact Number" value="<?php echo $result[0]->mobile_number;?>" name="mobile_number" id="mobile_number">
										<span id="mobile_number_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="department" class="col-form-label">Department</label>
                                        <select class="select2 form-control" id="department" name="department">
                                            <option <?php if($result[0]->department == 'Management'){ echo 'selected';}?> value="Management">Management</option>
                                            <option <?php if($result[0]->department == 'Sales'){ echo 'selected';}?> value="Sales">Sales</option>
                                            <option <?php if($result[0]->department == 'Administration'){ echo 'selected';}?> value="Administration">Administration</option>
                                        </select>
										<span id="department_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="manager" class="col-form-label">Manager</label>
                                        <select class="select2 form-control" id="Manager" name="manager">
                                            <option <?php if($result[0]->manager == 'Management'){ echo 'selected';}?> value="Management">Management</option>
                                            <option <?php if($result[0]->manager == 'Sales'){ echo 'selected';}?> value="Sales">Sales</option>
                                            <option <?php if($result[0]->manager == 'Administration'){ echo 'selected';}?> value="Administration">Administration</option>
                                        </select>
										<span id="manager_error" style="color: red"></span>
								    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_address" class="col-form-label">Work Email</label>
                                        <input class="form-control" type="email" placeholder="Enter Your Email" value="<?php echo $result[0]->email_address;?>" name="email_address" id="email_address">
										<span id="email_address_error" style="color: red"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="default_customer" class="col-form-label">Default Customer</label>
                                        <input class="form-control" type="text" placeholder="customer" value="<?php echo $result[0]->default_customer;?>" name="default_customer" id="default_customer">
										<span id="default_customer_error" style="color: red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password" class="col-form-label">Password</label>
                                        <input class="form-control" type="password" placeholder="********" name="password" value="<?php echo $result[0]->password;?>"  id="password">
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
                                                    <input class="form-control" type="text" placeholder="Address here" value="<?php echo $result[0]->address;?>" name="address" id="address">
													<span id="address_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country" class="col-form-label">Country</label>
                                                    <input class="form-control" type="text" placeholder="country name" value="<?php echo $result[0]->country;?>" name="country" id="country">
													<span id="country_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emaiAddress" class="col-form-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="Your Email" value="<?php echo $result[0]->emaiAddress;?>" name="emaiAddress" id="emaiAddress">
													<span id="emaiAddress_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Identification_number" class="col-form-label">Identification No.</label>
                                                    <input class="form-control" type="text" placeholder="ID NO." name="Identification_number" value="<?php echo $result[0]->Identification_number;?>" id="Identification_number">
													<span id="Identification_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_number" class="col-form-label">Mobile</label>
                                                    <input class="form-control" type="text" placeholder="Contact Number" value="<?php echo $result[0]->contact_number;?>" name="contact_number" id="contact_number">
													<span id="contact_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="passport_number" class="col-form-label">Passport No.</label>
                                                    <input class="form-control" type="text" placeholder="passport no." name="passport_number" value="<?php echo $result[0]->passport_number;?>" id="passport_number">
													<span id="passport_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="bank_account" class="col-form-label">Bank Account</label>
                                                    <input class="form-control" type="text" placeholder="Bank account no." name="bank_account" value="<?php echo $result[0]->bank_account;?>" id="bank_account">
													<span id="bank_account_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender" class="col-form-label">Gender</label>
                                                    <select class="select2 form-control" id="Gender" name="gender">
                                                        <option <?php if($result[0]->gender == 'Male'){ echo 'selected';}?> value="Male">Male</option>
                                                        <option <?php if($result[0]->gender == 'Male'){ echo 'selected';}?> value="Female">Female</option>
                                                    </select>
													<span id="gender_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="work_distance" class="col-form-label">Home Work Distance</label>
                                                    <input class="form-control" type="text" placeholder=" Distance" value="<?php echo $result[0]->work_distance;?>" name="work_distance" id="work_distance">
													<span id="work_distance_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth" class="col-form-label">Date Of Birth</label>
                                                    <input class="form-control" type="date" placeholder="" name="date_of_birth" value="<?php echo $result[0]->date_of_birth;?>" id="date_of_birth">
													<span id="date_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="place_of_birth" class="col-form-label">Place of birth</label>
                                                    <input class="form-control" type="text" placeholder="Birth Place" name="place_of_birth" value="<?php echo $result[0]->place_of_birth;?>" id="place_of_birth">
													<span id="place_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country_of_birth" class="col-form-label">Country of Birth</label>
                                                    <input class="form-control" type="text" placeholder="Country of birth" name="country_of_birth" value="<?php echo $result[0]->country_of_birth;?>" id="country_of_birth">
													<span id="country_of_birth_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marital_status" class="col-form-label">Marital Status</label>
                                                    <select class="select2 form-control" name="marital_status" id="marital_status">
                                                        <option <?php if($result[0]->marital_status == 'Married'){ echo 'selected';}?> value="Married">Married</option>
                                                        <option <?php if($result[0]->marital_status == 'Single'){ echo 'selected';}?> value="Single">Single</option>
                                                    </select>
													<span id="marital_status_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_name" class="col-form-label">ID name</label>
                                                    <input class="form-control"  type="text" placeholder="id name" name="id_name" value="<?php echo $result[0]->id_name;?>" id="id_name">
													<span id="id_name_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_number" class="col-form-label">ID No.</label>
                                                    <input class="form-control" type="text" placeholder="ID No." value="<?php echo $result[0]->id_number;?>" name="id_number" id="id_number">
													<span id="id_number_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_file" class="col-form-label">ID File</label>
													<input type="hidden" id="oldIdFile" value="<?php echo $result[0]->id_file;?>">
                                                    <input class="form-control" type="file" placeholder="" name="id_file" value="<?php echo $result[0]->id_file;?>" id="id_file">
													<span id="id_file_error" style="color: red"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                                                                                                
                                                <div class="form-group">
                                                    <label for="certification_level" class="col-form-label">Certification Level</label>
                                                    <select class="select2 form-control" id="certification_level" name="certification_level">
                                                        <option <?php if($result[0]->certification_level == 'Graduate'){ echo 'selected';}?> value="Graduate">Graduate</option>
                                                        <option <?php if($result[0]->certification_level == 'PG'){ echo 'selected';}?> value="PG"> Post Graduate</option>
                                                        <option <?php if($result[0]->certification_level == 'Masters'){ echo 'selected';}?> value="Masters"> Masters</option>
                                                    </select>
													<span id="certification_level_error" style="color: red"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field_of_study" class="col-form-label">Field of study</label>
                                                    <input class="form-control" type="text" name="field_of_study" value="<?php echo $result[0]->field_of_study;?>" placeholder="Field of study" id="field_of_study">
													<span id="field_of_study_error" style="color: red"></span>
                                                </div>
                                            </div>
										</div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="school" class="col-form-label">School</label>
                                                        <input class="form-control" type="text" placeholder="School" name="school" value="<?php echo $result[0]->school;?>" id="school">
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
                                    <button class="btn btn-primary" type="button" id="EditEmployeeDetail">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>