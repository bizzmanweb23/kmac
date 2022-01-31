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
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box">                                 
										  <div class="media">
											<img src="{{ asset('asset/image/user3.jpg')}}" alt="">
											<div class="media-body ms-3">
											  <div class="product-name">
												<h6><a href="#" title="">Nicole James</a></h6>
											  </div>
											  <div class="price"> 
                                                <div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
                                              </div>
                                              <div class="avaiabilty">
                                                <div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
                                                <a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
                                              </div>
											</div>
										  </div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box">                                 
											<div class="media">
												<img src="{{ asset('asset/image/user4.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">Mike Wood</a></h6>
												  </div>
												  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box">                                  
											<div class="media">
												<img src="{{ asset('asset/image/user3.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">Mark Doe</a></h6>
												  </div>
												  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box">                                  
											<div class="media">
												<img src="{{ asset('asset/image/user4.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">John Tock</a></h6>
												  </div>
                                                  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box ad-details-box2">
										  <div class="media">
											<img src="{{ asset('asset/image/user3.jpg')}}" alt="">
											<div class="media-body ms-3">
											  <div class="product-name">
												<h6><a href="javascript:;" title="">Nicole James</a></h6>
											  </div>
                                              <div class="price"> 
                                                <div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
                                              </div>
                                              <div class="avaiabilty">
                                                <div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
                                                <a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
                                              </div>
											</div>
										  </div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box ad-details-box2">
											<div class="media">
												<img src="{{ asset('asset/image/user4.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">Mike Wood</a></h6>
												  </div>
                                                  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box ad-details-box2">
											<div class="media">
												<img src="{{ asset('asset/image/user3.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">Mark Doe</a></h6>
												  </div>
												  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="profile-edit.html" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-md-6">
										<div class="prooduct-details-box ad-details-box2">
											<div class="media">
												<img src="{{ asset('asset/image/user4.jpg')}}" alt="">
												<div class="media-body ms-3">
												  <div class="product-name">
													<h6><a href="javascript:;" title="">John Tock</a></h6>
												  </div>
                                                  <div class="price"> 
													<div class="text-muted me-2"><i class="fa fa-phone-alt"> </i> 1800-419-4244</div>
												  </div>
												  <div class="avaiabilty">
													<div class="text-success"><i class="fa fa-envelope"></i> dummyuser@mail.com</div>
													<a href="{{ route('admin.edit_user_details') }}" class="text-primary"> View Profile <i class="fas fa-angle-right"></i></a>
												  </div>
												</div>
											</div>
										</div>
									</div>
									
									
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
            <form method="post" id="user_form">
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
                        <div class="col-md-3">
						    <img src="{{ asset('asset/image/imageicon.png') }}" alt="User Image" class="rounded-circle">
                                    <label for="emp_image" class="edit">
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
                               <label class="col-form-label"> Confirm Password</label>
                               <input class="form-control" type="password" placeholder="123456" name="confirm_password" id="confirm_password">
							   <span id="confirm_password_error" style="color: red"></span>
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
<div id="user_loder" style="display: none">
        @include('admin.loader.index')
    </div>
@section('javascript')
@include('admin.js.user')
@endsection
@endsection
