<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eRSP</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<!-- Favicons -->
<link href="{{ asset('applicant/img/favicon/android-chrome-192x192.png') }} " rel="icon">
<link href="{{ asset('applicant/img/favicon/android-chrome-512x512.png') }} " rel="icon">
<link href="{{ asset('applicant/img/favicon/apple-touch-icon.png') }} " rel="icon">
<link href="{{ asset('applicant/img/favicon/favicon-16x16.png') }} " rel="icon">
<link href="{{ asset('applicant/img/favicon/favicon-32x32.png') }} " rel="icon">
<link href="{{ asset('applicant/img/favicon/favicon.ico') }} " rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link href="/css/app.css" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <!-- <link href="{{ asset('applicant/lib/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet"> -->
  <!-- <link href="{{ asset('bootstrap/css/bootstrap.min.css') }} " rel="stylesheet"> -->
  
  <!-- Libraries CSS Files -->
  <link href="{{ asset('applicant/lib/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
  <link href="{{ asset('applicant/lib/animate/animate.min.css') }} " rel="stylesheet">
  <link href="{{ asset('applicant/lib/ionicons/css/ionicons.min.css') }} " rel="stylesheet">
  <link href="{{ asset('applicant/lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
  <link href="{{ asset('applicant/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('applicant/lib/ionicons/css/ionicons.min.css') }} " rel="stylesheet">
  <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
  <!-- Main Stylesheet File -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script> -->

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/theme-default.min.css"> -->
  
@yield('style')
</head>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="{{ route('applicant-dashboard') }}" class="scrollto">e<span>RSP</span></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu justify-content-end">
          <li><a href="{{ route('applicant-dashboard') }}">Home</a></li>
          <li><a href="{{ route('about-us') }}">About</a></li>
          <li ><a href="{{ route('careers') }}">Careers</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          <li ><a href="{{ route('job-offer') }}">Job Offers</a>
          <li ><a href="{{ route('applied-jobs') }}">Applications</a>
          <div class="buttons">
          </div>
        </ul>
      </nav><!-- #nav-menu-container -->

      @guest
      <div class="buttons justify-content-end">
        <a href="{{ route('login') }}" class="login-btn">Login</a>
        <a href="{{ route('register') }}" class="register-btn">Register</a>
       
      </div>
      @else
      <div class="dropdown buttons">

        <div class="btn-group">
          <button class=" btn boton " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(count($notif) > 0)
            <span class="badge badge-danger ml-2">{{ count($notif) }}</span> <i class="fa fa-bell" aria-hidden="true"></i>
            @endif
            @if(count($notif) == 0)
            <span class="badge badge-danger ml-2"></span> <i class="fa fa-bell" aria-hidden="true"></i>
            @endif
          </button>
          <div class="dropdown-menu dropdown-menu-right notifs" aria-labelledby="dropdownMenuButton">
            <div class="dropdown-item col-lg-12 col-sm-12 col-12 text-center  heads">
             Notifications ({{ count($allNotif) }})
             
              </div>
            
            @foreach($allNotif as $n)
            <a class="dropdown-item" href="{{ route('view-notif',[$n->notifiable_id, $n->id]) }}">{{$n->data['Title']}}
              <br><small class="text-muted">
              {{ $n->created_at->format('M d, Y')}}
              </small>
            </a>
            <div class="dropdown-divider"></div>
            @endforeach

            <div class="dropdown-item  col-lg-12 col-sm-12 col-12 text-center bot">
             <a href="notifications.html"><small style="color: black;">View All</small></a>
             
            </div>
          </div>
        </div>


        <div class="btn-group2">
          <button class="register-btn btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hello, {{ Auth()->user()->firstname}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('profile', Auth()->user()->id) }}">View Profile</a>
            <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
          
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                

                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
          
          </div>
        </div>

      </div>
    </div>
      @endguest

     
      
    </div>
  </header><!-- #header -->
 
    <!-- #section -->
    @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>eRSP</h3>
            <p>
              <strong>Claro M. Recto Avenue, Lapasan 9000 Cagayan de Oro City, Philippines</strong> <br><br>
              The recruitment, selection and placement unit of USTP Human Resource <br> Management Division is part of USTP’s overall resourcing strategies which <br> identify and secure people needed for the university. <br><br>
              <strong>Cellphone:</strong> 09273633763<br>
              <strong>Phone:</strong> 887-998-888<br>
              <strong>Email:</strong> ustphrmo@ustp.edu.ph<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Navigate</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('applicant-dashboard') }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about-us') }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="careers.html">Careers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Contact us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-toggle="modal" data-target="#Terms">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-toggle="modal" data-target="#Privacy">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Get in Touch</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/ustphrmo.rsp/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.jobstreet.com.ph/en/companies/156315524714175-university-of-science-and-technology-of-southern-philippines-government?fbclid=IwAR075yR-UziKebA-OgPp1QzmLCF2Uo6ybbVPnvkteetKhgrTds6PEEyLnGg" class="jobstreet"><i class="fa fa-globe"></i></a>
              <a href="mailto:ustphrmo@ustp.edu.ph" class="email"><i class="fa fa-envelope"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

<!-- Terms of Service Modal -->
  <div class="modal fade" id="Terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Terms of Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <h5>1. Terms</h5>
            <p>
                By accessing this Website, accessible from Website.com, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.
            </p>

            <h5>
                2. Use License
            </h5>
            <p>
                Permission is granted to temporarily download one copy of the materials on Company Name's Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
            modify or copy the materials;
            use the materials for any commercial purpose or for any public display;
            attempt to reverse engineer any software contained on Company Name's Website;
            remove any copyright or other proprietary notations from the materials; or
            transferring the materials to another person or "mirror" the materials on any other server.
            This will let Company Name to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format.
            </p>

            <h5>
                3. Disclaimer
            </h5>
            <p>
                All the materials on Company Name's Website are provided “as is”. Company Name makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, Company Name does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.
            </p>

           <h5>
            4. Limitations
           </h5>
            <p>
                Company Name or its suppliers will not be hold accountable for any damages that will arise with the use or inability to use the materials on Company Name's Website, even if Company Name or an authorize representative of this Website has been notified, orally or written, of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for incidental damages, these limitations may not apply to you.
            </p>

           <h5>
            5. Revisions and Errata
           </h5>
            <p>
                The materials appearing on Company Name's Website may include technical, typographical, or photographic errors. Company Name will not promise that any of the materials in this Website are accurate, complete, or current. Company Name may change the materials contained on its Website at any time without notice. Company Name does not make any commitment to update the materials.
            </p>

            <h5>
                6. Links
            </h5>
           <p>
            Company Name has not reviewed all of the sites linked to its Website and is not responsible for the contents of any such linked site. The presence of any link does not imply endorsement by Company Name of the site. The use of any linked website is at the user's own risk.
           </p>

           <h5>
            7. Site Terms of Use Modifications
           </h5>
           <p>
            Company Name may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.
           </p>

            <h5>
                8. Governing Law
            </h5>
            <p>
                Any claim related to Company Name's Website shall be governed by the laws of Country without regards to its conflict of law provisions.
        
            </p>
            </div>
        
      </div>
    </div>
  </div>

<!-- Privacy Policy -->
<div class="modal fade" id="Privacy" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Privacy Policy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <h5>1. Terms</h5>
          <p>
              By accessing this Website, accessible from Website.com, you are agreeing to be bound by these Website Terms and Conditions of Use and agree that you are responsible for the agreement with any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this site. The materials contained in this Website are protected by copyright and trade mark law.
          </p>

          <h5>
              2. Use License
          </h5>
          <p>
              Permission is granted to temporarily download one copy of the materials on Company Name's Website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
          modify or copy the materials;
          use the materials for any commercial purpose or for any public display;
          attempt to reverse engineer any software contained on Company Name's Website;
          remove any copyright or other proprietary notations from the materials; or
          transferring the materials to another person or "mirror" the materials on any other server.
          This will let Company Name to terminate upon violations of any of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy any downloaded materials in your possession whether it is printed or electronic format.
          </p>

          <h5>
              3. Disclaimer
          </h5>
          <p>
              All the materials on Company Name's Website are provided “as is”. Company Name makes no warranties, may it be expressed or implied, therefore negates all other warranties. Furthermore, Company Name does not make any representations concerning the accuracy or reliability of the use of the materials on its Website or otherwise relating to such materials or any sites linked to this Website.
          </p>

         <h5>
          4. Limitations
         </h5>
          <p>
              Company Name or its suppliers will not be hold accountable for any damages that will arise with the use or inability to use the materials on Company Name's Website, even if Company Name or an authorize representative of this Website has been notified, orally or written, of the possibility of such damage. Some jurisdiction does not allow limitations on implied warranties or limitations of liability for incidental damages, these limitations may not apply to you.
          </p>

         <h5>
          5. Revisions and Errata
         </h5>
          <p>
              The materials appearing on Company Name's Website may include technical, typographical, or photographic errors. Company Name will not promise that any of the materials in this Website are accurate, complete, or current. Company Name may change the materials contained on its Website at any time without notice. Company Name does not make any commitment to update the materials.
          </p>

          <h5>
              6. Links
          </h5>
         <p>
          Company Name has not reviewed all of the sites linked to its Website and is not responsible for the contents of any such linked site. The presence of any link does not imply endorsement by Company Name of the site. The use of any linked website is at the user's own risk.
         </p>

         <h5>
          7. Site Terms of Use Modifications
         </h5>
         <p>
          Company Name may revise these Terms of Use for its Website at any time without prior notice. By using this Website, you are agreeing to be bound by the current version of these Terms and Conditions of Use.
         </p>

          <h5>
              8. Governing Law
          </h5>
          <p>
              Any claim related to Company Name's Website shall be governed by the laws of Country without regards to its conflict of law provisions.
      
          </p>
          </div>
      
    </div>
  </div>
</div>
 
  
  @yield('script')

  <!-- JavaScript Libraries -->
  

  <script src="/js/app.js"></script>
  <script src="{{ asset('applicant/js/login.js') }} "></script>

  <!-- <script src="{{ asset('applicant/lib/jquery/jquery.min.js') }} "></script> -->
  <!-- <script src="{{ asset('applicant/lib/jquery/jquery-migrate.min.js') }} "></script> -->
  <!-- <script src="{{ asset('applicant/lib/bootstrap/js/bootstrap.bundle.min.js') }} "></script> -->
  <script src="{{ asset('applicant/lib/easing/easing.min.js') }} "></script>
  <script src="{{ asset('applicant/lib/superfish/hoverIntent.js') }} "></script>
  <script src="{{ asset('applicant/lib/superfish/superfish.min.js') }} "></script>
  <script src="{{ asset('applicant/lib/wow/wow.min.js') }} "></script>
  <script src="{{ asset('applicant/lib/owlcarousel/owl.carousel.min.js') }} "></script>
  <script src="{{ asset('applicant/lib/magnific-popup/magnific-popup.min.js') }} "></script>
  <script src="{{ asset('applicant/lib/sticky/sticky.js') }} "></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('applicant/contactform/contactform.js') }} "></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('applicant/js/main2.js') }} "></script>


</body>
</html>
