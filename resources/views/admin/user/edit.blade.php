@extends('admin.layout.dashboard')

@section('content')	
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title">User Profile</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="{{ route('admin.dashboard.index')}}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">User Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Products view Start -->
				<div class="row">
                    <div class="col-sm-2"></div>
                <div class="col-xl-8">
                  <div class="card"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                    <div class="card-header">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="javascript:;" data-bs-toggle="card-collapse" data-bs-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="javascript:;" data-bs-toggle="card-remove" data-bs-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>
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
@endsection
    <!-- this is large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
  
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
                            <img src="assets/images/user3.jpg" alt="" class="rounded-circle ">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                               <label for="member-name" class="col-form-label">Your Name</label>
                               <input class="form-control" type="text" placeholder="Enter Your Name" id="member-name">
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="member-email" class="col-form-label">Your Email</label>
                               <input class="form-control" type="email" placeholder="Enter Your Email" id="member-email">
                           </div>
                        </div>
                       
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="another-number" class="col-form-label">Contact Number</label>
                               <input class="form-control" type="text" placeholder="Contact Number" id="another-number">
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label">Password</label>
                               <input class="form-control" type="password" placeholder="123456">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label class="col-form-label"> Confirm Password</label>
                               <input class="form-control" type="password" placeholder="123456">
                           </div>
                        </div>
                    </div>
                </div>
          

             <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab19" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Customers</a>
                  </li>
                
                </ul>
                <div class="tab-content ad-content2" id="myTabContent">
                 
                  <div class="tab-pane fade active show" id="profile" role="tabpanel">
                   <div class="row">
                       <div class="col-md-12">
                        <div class="form-group">
                            <label for="city" class="col-form-label">Website</label>
                            <select class="select2 form-control" id="Website">
                                  <option value="All">All</option>

                            </select>
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
                    <button class="btn btn-primary" type="button">Save</button>
                </div>
            </div>
          </div>
        </div>
      </div>
	
    <!-- Script Start -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/swiper.min.js"></script>
    <!-- Page Specific -->
    <script src="assets/js/nice-select.min.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/custom.js"></script>
</body>

</html>