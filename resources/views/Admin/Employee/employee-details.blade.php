@extends('Admin.layout.main')
@section('content')

<div class="container-fluid my-3">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item  ">
    <a class="nav-link active " id="home-tab" data-toggle="tab" href="#any-available-licence" role="tab" aria-controls="home" aria-selected="true">Available Licence</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#certificate-attained" role="tab" aria-controls="profile" aria-selected="false">Certificate Attained</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#lavel-of-education" role="tab" aria-controls="contact" aria-selected="false">Lavel of Education</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#wsq-certificate" role="tab" aria-controls="contact" aria-selected="false">WSQ Certificate</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#vaccination-status" role="tab" aria-controls="contact" aria-selected="false">Vaccination status</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#referal-column" role="tab" aria-controls="contact" aria-selected="false">Referral column 
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#joining-bonus" role="tab" aria-controls="contact" aria-selected="false"> Joining bonus 
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="any-available-licence" role="tabpanel" aria-labelledby="home-tab">
  	@include('Admin.include.emp-details.any-available-licence')
  </div>
  <div class="tab-pane fade" id="certificate-attained" role="tabpanel" aria-labelledby="profile-tab">
  	@include('Admin.include.emp-details.certificate-attained')
  </div>
  <div class="tab-pane fade" id="lavel-of-education" role="tabpanel" aria-labelledby="contact-tab">
  	@include('Admin.include.emp-details.lavel-of-education') 
  </div>

  <div class="tab-pane fade" id="wsq-certificate" role="tabpanel" aria-labelledby="contact-tab">
    @include('Admin.include.emp-details.wsq-certificate') 
  </div>

  <div class="tab-pane fade" id="vaccination-status" role="tabpanel" aria-labelledby="contact-tab">
    @include('Admin.include.emp-details.vaccination-status') 
  </div>

  <div class="tab-pane fade" id="referal-column" role="tabpanel" aria-labelledby="contact-tab">
    @include('Admin.include.emp-details.referral-column') 
  </div>

  <div class="tab-pane fade" id="joining-bonus" role="tabpanel" aria-labelledby="contact-tab">
    @include('Admin.include.emp-details.joining') 
  </div>
  
</div>
</div>
@endsection
@section('javascript')
<script>

</script>
@endsection