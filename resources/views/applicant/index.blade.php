@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex align-items-center">

<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>Be a part of the University now!</h1>
      <h2>eRSP simplifies the way applicants can apply for a job in the University of Science and Technology of Southern Philippines</h2>
      
    </div>
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
      <img src="{{ asset('applicant/img/hero-img.png') }} " class="img-fluid animated" alt="">
    </div>
  </div>
</div>

</section><!-- End Hero -->



<main id="main">

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About Us</h2>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          This website is made by a team of students from the Information Technology department of Univeristy and Science of Technology of Southern Philippines for their capstone project of the senior year. This Web application system specifically aims to:
        </p>
        <ul>
          <li><i class="ion-android-checkmark-circle"></i> Offer a system that aids the Recruitment, Selection, and Placement Unit of HRMO-USTP in their virtual hiring procedures.</li>
          <li><i class="ion-android-checkmark-circle"></i> Deliver a fast and convenient way in virtually applying for the job applicants of USTP.</li>
        </ul>
        
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          The Recruitment, Selection, and Placement Unit maintain and provide a system of hiring procedures in order to attract, select, and place qualified applicants on jobs which can make the fullest possible use of their talent and skill by finding the right people at the right time for the right job.
        </p>
        <a href="{{ route('about-us') }}" class="btn-learn-more">Learn More</a>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= how Section ======= -->
<section id="how" class="how section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>How ersp works</h2>
      </div>

    <div class="row pt-5">

      <div class="col-md-3">
        <div class="overlord">
          <div class="position-num">
            <div class="num ">
      
              <div class="num2">
               1
              </div>
             
           </div>
          </div>
          <div class="box">
            <img src="{{ asset('applicant/img/1.png') }} " class="img-fluid pt-4">
            <h4 class="text-center">Create Account</h4>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="overlord">
          <div class="position-num">
            <div class="num ">

              <div class="num2">
               2
              </div>
             
           </div>
          </div>
          <div class="box">
            <img src="{{ asset('applicant/img/2.png') }} " class="img-fluid pt-4">
            <h4 class="text-center">Apply for a Job</h4>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="overlord">
          <div class="position-num">
            <div class="num ">
      
              <div class="num2">
               3
              </div>
             
           </div>
          </div>
          <div class="box">
            <img src="{{ asset('applicant/img/3.png') }} " class="img-fluid pt-2">
            <h4 class="text-center">Wait for Updates</h4>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="overlord">
          <div class="position-num">
            <div class="num ">
      
              <div class="num2">
               4
              </div>
             
           </div>
          </div>
          <div class="box">
            <img src="{{ asset('applicant/img/4.png') }} " class="img-fluid pt-2">
            <h4 class="text-center">You're Hired!</h4>
          </div>
        </div>
      </div>

  </div>

  </div>
</section><!-- End how Section -->


<!-- ======= job Section ======= -->
<section id="job" class="job section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Latest Jobs</h2>
    </div>
    <div class="row">
      @php
        $i = 0;
      @endphp
      @foreach($jobs as $j)
      @if($i < 4)
      <div class="col-lg-6 mb-5">
        <div class="job-post d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
          <div class="pic"><img src="{{ asset('applicant/img/job.png') }} " class="img-fluid" alt=""></div>
          <div class="job-post-info">
            <h4>{{ $j->name }}</h4>
            @if($j->id == 1)
            <span class="work-type">Teaching</span>
            @endif
            @if($j->id == 2)
            <span class="work-type">Non Teaching</span>
            @endif
            <span class="status">{{ $j->created_at->diffForHumans() }}</span>
            <p class="job-desc">{{ $j->description}}</p> 
            <a href="{{ route('careers') }}" class="apply">Apply Now</a>
          </div>
        </div>
      </div>
      @endif
      @php
        $i += 1;
      @endphp
      @endforeach
      
    </div>
    <div class="text-center">
      <a href="{{ route('careers') }}" class="btn-view-more">View All Jobs</a>
    </div>

  </div>
</section><!-- End job Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
<div class="container" data-aos="fade-up">

  <div class="section-title">
    <h2>Contact us</h2>
  </div>

  <div class="row">

    <div class="col-lg-5 d-flex align-items-stretch">
      <div class="info">
        <div class="address">
          <i class="fa fa-map-marker"></i>
          <h4>Location:</h4>
          <p>Claro M. Recto Avenue, Lapasan 9000 Cagayan de Oro City, Philippines</p>
        </div>

        <div class="email">
          <i class="fa fa-envelope"></i>
          <h4>Email:</h4>
          <p><a href="mailto:ustphrmo@ustp.edu.ph">ustphrmo@ustp.edu.ph</a></p>
        </div>

        <div class="phone">
          <i class="fa fa-phone"></i>
          <h4>Call:</h4>
          <p><a href="tel:+09273633763">09273633763</a>| <a href="tel:+887998888">887-998-888</a></p>
        </div>

        <iframe src="https://maps.google.com/maps?q=university%20of%20science%20and%20technology%20of%20southern%20philippines&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
      </div>

    </div>

    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
   
      <div class="form">
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
        <div id="sendmessage">Your message has been sent. Thank you!</div>
        <div id="errormessage"></div>
        <form action="{{ route('send-mail') }}" method="post" >
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="{{ $user->firstname}} {{ $user->middlename}} {{ $user->lastname}}"/>
              <div class="validation"></div>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="{{ $user->email}}"/>
              <div class="validation"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validation"></div>
          </div>
          <div class="form-group">
            <label for="name">Message</label>
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validation"></div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
          
        </form>
      </div>
    </div>

  </div>

</div>
</section><!-- End Contact Section -->

</main>

@endsection
