@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')
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


@endsection