@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About Us</h2>
      </div>

      <div class="row">
        <div class="col-lg">
          <img src="{{ asset('applicant/img/cdo.jpg') }}" alt="CDO" class="img-fluid banner pb-5">
        </div>
      </div>
      <div class="row  p-3 content ">
        
      

        <div class="col-lg  pt-lg-0 ">
          <p>
            The Recruitment, Selection, and Placement Unit maintain and provide a system of hiring procedures in order to attract, select,
             and place qualified applicants on jobs which can make the fullest possible use of
            their talent and skill by finding the right people at the right time for the right job.
          </p>

            <p>
             This website is made by a team of students from the Information Technology department of Univeristy
             and Science of Technology of Southern Philippines for their capstone project of the senior year. 
             This Web application system specifically aims to:
            </p>
            <ul class="pl-5">
           
            <li><i class="ion-android-checkmark-circle"></i>Offer a system that aids the Recruitment, Selection, and Placement Unit of HRMO-USTP in their virtual 
                hiring procedures.</li>
            <li><i class="ion-android-checkmark-circle"></i>Deliver a fast and convenient way in virtually applying for 
            the job applicants of USTP.</li>
                </ul>
          </div>
      </div>

      <!-- Developer's Profile
        
        <div class="pt-5 section-title">
        <h2>The Team</h2>
      </div>
      
      <div class="row justify-content-center">
          <div class="col-lg-3">
            <div class="ppl">
                <img src="img/trisha.jpg" alt="Art Christian C. Awitin" class="person img-fluid">
                <h4>Trisha Quinto</h4>
                <p>Leader</p>
            </div>
          </div>
         <div class="col-lg-3">
            <div class="ppl">
                <img src="img/roy.jpg" alt="Roy Johairi Lucman" class="person img-fluid">
                <h4>Roy Johairi Lucman</h4>
                <p>Developer</p>
            </div>
         </div>
        <div class="col-lg-3">
            <div class="ppl">
                <img src="img/juni.jpg" alt="Junihench D. Actub" class="person img-fluid">
                <h4>Junihench D. Actub</h4>
                <p>Documentation</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ppl">
                <img src="img/artchan.jpg" alt="Art Christian C. Awitin" class="person img-fluid">
                <h4>Art Christian C. Awitin</h4>
                <p>Researcher</p>
            </div>
        </div>
      </div> -->

      
    </div>
  </section><!-- End About Us Section -->

  @endsection