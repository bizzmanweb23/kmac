@extends('admin.layout.dashboard')

@section('content')
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title"><button type="button" class="btn btn-primary squer-btn" data-toggle="modal" data-target=".bd-example-modal-lg">ADD USERS</button></h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="{{ route('admin.dashboard.index') }}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active"> Users Management</li>
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
								<div class="row">
								    <?php 
									foreach($result as $data)
									{
									?>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box">                                 
										  <div class="media">
											<img src="asset/userImage/<?php echo $data->user_image;?>" alt="">
											<div class="media-body ms-3">
											  <div class="product-name">
												<h6><a href="#" title=""><?php echo $data->user_name;?></a></h6>
											  </div>
											  <div class="price"> 
                                                <div class="text-muted me-2"><i class="fa fa-phone-alt"> </i><?php echo $data->contact_number;?></div>
                                              </div>
                                              <div class="avaiabilty">
                                                <div class="text-success"><i class="fa fa-envelope"></i><?php echo $data->email_address;?></div>
                                                <button type="button" class="btn btn-primary squer-btn" id="viewUserProfile" rel="<?php echo $data->id;?>"> View Profile <i class="fas fa-angle-right"></i></button>
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
					</div>
                </div>
<!-- this is large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="post" enctype="multipart/form-data" id="user_form">
			@csrf
            <div class="modal-header">
              <h5 class="modal-title h4" id="myLargeModalLabel">Add users</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row add-profile-user">
                        <div class="col-md-1"></div>
                        <div class="col-md-3 upload">
						    <img src="{{ asset('asset/image/imageicon.png') }}" alt="User Image" class="rounded-circle">
                                    <label for="user_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        <input type="file" style="display: none" name="user_image" id="user_image">
                                        <span id="user_image_error" style="color: red"></span>
                                    </label>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                               <label for="user_name" class="col-form-label">Your Name</label>
                               <input class="form-control" type="text" placeholder="Enter Your Name" id="user-name" name="user_name">
							   <span id="user_name_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="email_address" class="col-form-label">Your Email</label>
                               <input class="form-control" type="email" placeholder="Enter Your Email" id="email_address" name="email_address">
							   <span id="email_address_error" style="color: red"></span>
                           </div>
                        </div>
                       
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="contact_number" class="col-form-label">Contact Number</label>
                               <input class="form-control" type="text" placeholder="Contact Number" id="contact_number" name="contact_number">
							   <span id="contact_number_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label">Password</label>
                               <input class="form-control" type="password" placeholder="123456" name="password" id="password">
							   <span id="paswword_error" style="color: red"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option value="">--select--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <span id="gender_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <label class="col-form-label">Address</label>
                               <textarea class="form-control" type="text" placeholder="Address" name="address" id="address"></textarea>
							   <span id="address_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label">City</label>
                               <input class="form-control" type="text" placeholder="City" name="city" id="city">
							   <span id="city_error" style="color: red"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label"> Country</label>
                               <input class="form-control" type="text" placeholder="Country" name="country" id="country">
							   <span id="country_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <label class="col-form-label">Bio</label>
                               <textarea class="form-control" type="text" placeholder="On the other hand, we denounce with righteous indignation" name="bio_info" id="bio_info"></textarea>
							   <span id="bio_info_error" style="color: red"></span>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group mb-0">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" id="user_details">Submit</button>
                </div>
            </div>
			</form>
          </div>
        </div>
      </div>
<!-- View User Modal -->
<div id="viewUserModal" class="modal fade bd-example-modal-lg">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		    <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-xl-8">
                    <div class="card"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                        <div class="card-header">
                            <h4 class="card-title mb-0">My Profile</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div id="viewDetails">
                                    <form method="post" enctype="multipart/form-data" id="user_form">
			                            @csrf
						                <div class="profile-title">
							                <div class="media ad-profile2-img">                        
								                <img alt="" src="{{ asset('asset/image/user.jpg')}}">
                    						    <div class="media-body">
								                    <h5 class="mb-1">MARK JECNO</h5>
								                    <p>DESIGNER</p>
							                    </div>
							                </div>
						                </div>                     
                                        <div class="mb-3">
                                            <label class="form-label">Bio</label>
                                            <textarea class="form-control" rows="5" spellcheck="false">On the other hand, we denounce with righteous indignation</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email-Address</label>
                                                    <input class="form-control" placeholder="your-email@domain.com" value="dummyuser@mail.com" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control" type="password" value="*********" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Website</label>
                                                    <input class="form-control" value="bizzmanweb.sg" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input class="form-control" placeholder="Enter Phone No" value="1800 419 4244" data-bs-original-title="" title="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <button class="btn btn-danger squer-btn" data-bs-original-title="" title=""> <i class="fa fa-times"></i> Cancel</button>
                                            <button type="button" class="btn btn-primary squer-btn" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit"></i> Edit</button>
                                        </div>
                                    </form>
					            </div>
                            </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<!-- End User View Modal -->
<!--<div id="user_loder" style="display: none">
        @include('admin.loader.index')
    </div> -->
@section('javascript')
@include('admin.js.user')
@endsection
@endsection
