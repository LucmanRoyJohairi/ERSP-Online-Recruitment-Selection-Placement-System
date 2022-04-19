<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Material Dash</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/material-design-icons/iconfont/material-icons.css') }} ">

  <!--Fontawesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/css/progress.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/css/cssmodal.css') }} ">

  <!-- Favicons -->
  <link href="{{ asset('admin/images/favicon/android-chrome-192x192.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/android-chrome-512x512.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/apple-touch-icon.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-16x16.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-32x32.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon.ico') }} " rel="icon">
  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <!-- <script src="{{ asset('') }} admin/js/preloader.js"></script> -->
<div class="body-wrapper">
  <!-- partial:partials/_sidebar.html -->
  @include('layouts.admin.sidebar')
  <!-- partial -->
  <div class="main-wrapper mdc-drawer-app-content">
  @include('layouts.admin.header')
        <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
            <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                    <div class="mdc-card">
                      <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="card px-0  pb-0  mb-3 inner">
                                    <div id="msform">
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                        @if($apply->application_status == 'pending' or $apply->application_status == 'shortlist') 
                                          
                                        @include('admin.applications.steps.shortlist')

                                        @endif
                                        @if($apply->application_status == 'screening')
                                          @include('admin.applications.steps.screening')

                                        @endif
                                        @if($apply->application_status == 'rating')
                                          @include('admin.applications.steps.rate')

                                        @endif
                                        @if($apply->application_status == 'joboffer')
                                          @include('admin.applications.steps.joboffer')

                                        @endif
                                        @if($apply->application_status == 'onboarding')
                                          @include('admin.applications.steps.onboarding')

                                        @endif
                                        @if($apply->application_status == 'hired')
                                          @include('admin.applications.steps.hired')

                                        @endif
                                        </ul>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> <br> <!-- fieldsets -->

                                        @if($apply->application_status == 'pending'  or $apply->application_status == 'shortlist')
                                        <!-- Step 1 -->
                                          @include('admin.applications.process.shortlist')
                                        @endif
                                        

                                        @if($apply->application_status == 'screening')

                                          <!-- STEP2 -->
                                          @include('admin.applications.process.screening')
                                        @endif

                                        @if($apply->application_status == 'rating')

                                          <!-- STEP3 -->
                                          @include('admin.applications.process.rating')
                                        @endif
                                      
                                        @if($apply->application_status == 'joboffer')
                                          <!-- STEP4 -->
                                          @include('admin.applications.process.joboffer')
                                        @endif

                                        @if($apply->application_status == 'onboarding')

                                          <!-- STEP5-->
                                          @include('admin.applications.process.onboarding')
                                        @endif
                                        
                                        <!-- STEP6-->
                                        @if($apply->application_status == 'hired')
                                        
                                          @include('admin.applications.process.hired')
                                        @endif

                                       
                                        
                                      

                                      


                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>            
        </main>
        <!-- partial -->
      </div>   
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Job Offer Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mdc-card">
                <div class="d-flex justify-content-center">
                  <img src="{{ asset('admin/images/header.png') }} " class="img-fluid" alt="">
                </div id="preview-modal">
              
                  <h5>Date Today</h5><br>
                  <h5>Applicant Name</h5>
                  <h5>Address</h5>
                  <h5>Contact Information</h5>
                  <h5>Email Address</h5><br>
                  <h5>Dear Applicant Name,</h5><br>
                  <h5 >We are pleased to offer you the position of Guidance Counselor II under the Guidance Office which you will be reporting directly to the Vice Chancellor for Student Affairs Services. We believe your expertise and experience will be an asset to our university.</h5>
                  <h5>Please see attached document for the list of pre-employment requirements to be complied on or before <u>May 14, 2021</u>. In the meantime, if you have any queries regarding this job offer, please feel free to contact us anytime at <u>recruitment.hrmo@ustp.edu.ph</u>.</h5>
                  <h5>We look forward to having you on our team, trailblazer!</h5><br>
                  <h5>Best regards,</h5>
                  <h5>MARIA CECILIA L. PANGAN, PhD</h5>
                  <h5>Director, Human Resource Management Office</h5>
                  <h5>USTP CDO</h5><br>
                  <h6 style="font-style: italic;">cc: Office of the Vice Chancellor for Student Affairs Services Guidance Office</h6>
               
                <div class="d-flex justify-content-center" style="margin-top:50px;">
                  <!-- Dapat mo back siya didto sa Step4 once mag edit -->
              </div>
        </div>
       
        </div>
    </div>
    </div>

<!--modal-->

    <script>
   
    $('#interview-btn').click(function(){
      $('#teaching-btn').css('background-color','');

      $(this).css('background-color','white');
      $(this).css('color','#08376b');
      $('#teaching-btn').css('color','white');
     
      $('#teaching-demo-form').hide();

      $('#interview-form').toggle();

    });


    $('#teaching-btn').click(function(){

      $('#interview-btn').css('background-color','');
      $(this).css('background-color','white');
      $(this).css('color','#08376b');
      $('#interview-btn').css('color','white');


      $('#interview-form').hide();
      $('#teaching-demo-form').toggle();

    });
    $(window).load(function() {
      $('.material-icons').css('opacity','1');
      $('.sidebar-text').css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},1100);

    });



      
    console.log('value of: ' + $('.userID').val());

    $("#sd").click(function(){
      let eli = [];
      let edu = $("input[name=education]:checked").val();
      let years = parseInt($("#years").val());

      $("input:checkbox[name=eligibility]:checked").each(function(){
          eli.push($(this).val());
      });

        // console.log('years: ', years);
        $.ajax({
          url: 'process/next/shortlist',
          type: 'get',
          data: { 
            'eli' : eli, 
            'edu': edu,
            'years': years,
          },
          success: function(response){
            console.log(response);
            let data = JSON.parse(response);
            // let data = response;
            $('#total_app').text(data.length);

            var len = 0;
            $('#myTable tbody').empty(); // Empty <tbody>
            
            len = data.length;
            for(var i=0; i<len; i++){
              console.log(data[i].user_id);
              var appId = data[i].id;
              var firstname = data[i].firstname;
              var lastname = data[i].lastname;
              var dob = data[i].dateOfBirth;
              var email = data[i].email;
              var contact = data[i].contact;
              var tr_str = 
              "<tr>" +
              ' <td class="text-left"> <input class="form-check-input" name="user-chk" type="checkbox" value="'+ appId+'" id="flexCheckDefault" style="margin-right: 20px;">'+ appId +'</td>' +
                // "<td class='text-center'>" + appId + "</td>" +
                "<td class='text-center'>" + firstname + " " +lastname + "</td>" +
                "<td class='text-center'>" + dob + "</td>" +
                "<td class='text-center'>" + contact + "</td>" +
                "<td class='text-center'>" + email + "</td>" +
                "<td><a href=''><button class='mdc-button mdc-button--raised'>View</button></a></td>"

              "</tr>";
              $("#myTable tbody").append(tr_str);
            } //for
            
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
          
        }); //ajax
      }); //shortlist button
      
      $('#add-shortlist').click(function(){
  
        console.log('here');
        var tableData = [];
        $("#myTable tbody tr").each(function(){
          var currRow = $(this);
          var col1 = currRow.find("td:eq(0)").text();//id
          var col2 = currRow.find("td:eq(1)").html();
          var col3 = currRow.find("td:eq(2)").html();
          var col4 = currRow.find("td:eq(3)").html();
          var col5 = currRow.find("td:eq(4)").html();
          $('input:checkbox[name=user-chk]:checked').each(function(){
            if(col1 == parseInt($(this).val())){
              console.log('col1: ' + col1);
              var obj = {};
              obj.id = col1;
              obj.name = col2;
              obj.dob = col3;
              obj.contact = col4;
              obj.email = col5;

              tableData.push(obj);
              $('#shortlisted_count').text(tableData.length);
              
              // $('#myTable tbody').empty(); // Empty <tbody>
              $('#shortlistTable tbody').empty(); // Empty <tbody>
              var appIds = [];
              for(var i=0; i<tableData.length; i++){
                appIds.push(tableData[i].id);
                var appId = tableData[i].id;
                var name = tableData[i].name;
                var dob = tableData[i].dob;
                var email = tableData[i].email;
                var contact = tableData[i].contact;

                var tData = 
                "<tr>" +
                
                  "<td class='text-center'>" + appId + "</td>" +
                  "<td class='text-center'>" + name + "</td>" +
                  "<td class='text-center'>" + dob + "</td>" +
                  "<td class='text-center'>" + contact + "</td>" +
                  "<td class='text-center'>" + email + "</td>" +
                  "<td><a href=''><button class='mdc-button mdc-button--raised'>View</button></a></td>"

                "</tr>";
                $("#shortlistTable tbody").append(tData);

              }
            }
            
          });//check

         
         

        })
          

      });//button


    </script>
    
  <!-- plugins:js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <!--Boostrap js-->
  <script src="{{ asset('admin/js/sidebar.js') }} "></script>
  <script src="{{ asset('admin/js/rating.js') }} "></script>
  <script src="{{ asset('admin/js/joboffer.js') }} "></script>
  <script src="{{ asset('admin/js/screening.js') }} "></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{ asset('admin/js/progress.js') }} "></script>
  <script src="{{ asset('admin/js/material.js') }} "></script>
  <script src="{{ asset('admin/js/misc.js') }} "></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>