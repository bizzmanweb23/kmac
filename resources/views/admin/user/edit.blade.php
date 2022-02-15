 <form method="post" enctype="multipart/form-data" id="editUser_form">
			@csrf
			<input type="hidden" id="editUserId" value="<?php echo $result[0]->id;?>">
            <div class="modal-body">
                <div class="container">
                    <div class="row add-profile-user">
                        <div class="col-md-1"></div>
                        <div class="col-md-3 upload">
						    <img src="asset/userImage/<?php echo $result[0]->user_image;?>" alt="User Image" class="rounded-circle">
                                    <label for="user_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input type="file" style="display: none" name="user_image" id="user_image">
                                        <span id="user_image_error" style="color: red"></span>
                                    </label>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                               <label for="user_name" class="col-form-label">Your Name</label>
                               <input class="form-control" type="text" placeholder="Enter Your Name" value="<?php echo $result[0]->user_name;?>" id="user-name" name="user_name">
							   <span id="user_name_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="email_address" class="col-form-label">Your Email</label>
                               <input class="form-control" type="email" placeholder="Enter Your Email" value="<?php echo $result[0]->email_address;?>" id="email_address" name="email_address">
							   <span id="email_address_error" style="color: red"></span>
                           </div>
                        </div>
                       
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="contact_number" class="col-form-label">Contact Number</label>
                               <input class="form-control" type="text" placeholder="Contact Number" value="<?php echo $result[0]->contact_number;?>" id="contact_number" name="contact_number">
							   <span id="contact_number_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label">Password</label>
                               <input class="form-control" type="password" placeholder="123456" value="<?php echo $result[0]->password;?>" name="password" id="password">
							   <span id="paswword_error" style="color: red"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--select--</option>
                                                <option <?php if($result[0]->gender == 'Male'){ echo 'selected';}?> value="Male">Male</option>
                                                <option <?php if($result[0]->gender == 'Female'){ echo 'selected';}?>value="Female">Female</option>
                                                <option <?php if($result[0]->gender == 'Other'){ echo 'Selected';}?> value="Other">Other</option>
                                            </select>
                                            <span id="gender_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <label class="col-form-label">Address</label>
                               <textarea class="form-control" type="text" placeholder="Address" name="address" id="address"><?php echo $result[0]->address;?></textarea>
							   <span id="address_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label">City</label>
                               <input class="form-control" type="text" placeholder="City" value="<?php echo $result[0]->city;?>" name="city" id="city">
							   <span id="city_error" style="color: red"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label"> Country</label>
                               <input class="form-control" type="text" placeholder="Country" name="country" value="<?php echo $result[0]->country;?>" id="country">
							   <span id="country_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <label class="col-form-label">Bio</label>
                               <textarea class="form-control" type="text" placeholder="On the other hand, we denounce with righteous indignation" name="bio_info" id="bio_info"><?php echo $result[0]->bio_info;?></textarea>
							   <span id="bio_info_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group mb-0">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" id="edit_user_details">Submit</button>
                </div>
            </div>
			</form>