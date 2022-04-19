@extends('layouts.register')
@section('style')

<link href="{{ asset('applicant/css/register.css') }}" rel="stylesheet">
@endsection

@section('content')

<!--sign up form-->
<section id="register">
    <div class="section-title">
      <h2>Create Account</h2>
    </div>
    <div class="col-12 col-lg-3 ml-auto mr-auto mb-4">  
      <div class="progressbar">
          <div class="progress" id="progress"></div>
          <div class="progress-step progress-step-active"></div>
          <div class="progress-step" ></div>
          <div class="progress-step" ></div>
          <div class="progress-step" ></div>
          <div class="progress-step" ></div>
        </div>

  </div>

      <!-- Steps -->
      <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}" class="form" id="register-form"> 
        @csrf
        <!--Data Privacy-->
        <div class="form-step form-step-active">
            <h3 class="text-center">Data Privacy Notice</h3>
            <p>The University of Science and Technology of Southern Philippines - Human Resource Management Office (Recruitment, Selection, and Placement Unit) collects necessary information from job applicants' personal information from the data entered in this online form, CSC Form No. 212 Personal Data Sheet, and resume.

USTP HRMO is mandated to comply with the Civil Service Commission (CSC) regulations on recruitment, selection, appointment and other human resource actions in the civil service. The collected information are required by the CSC Personal Data Sheet (PDS) and other applicable civil service regulations.

The sole purpose of this online application form is to standardize our database system of job applicants. The collected personal information will be utilized to evaluate the qualifications of the applicants.

Under the Data Privacy Act of 2012, job applicants are considered as data subject which refers to an individual whose personal information is collected and processed. USTP HRMO is duly bound to observe and respect your privacy rights, including your right to information, right to remove, right to damages, and right to data portability.

Personal information collected through the submitted documents are stored in a secured data facility. The Recruitment, Selection, and Placement Unit has adequate security safeguards to protect information from loss, unauthorized access, use or disclosure. The electronic documents are retained for a period of one (1) year and after such retention period, paper documents shall be shredded and the electronic files shall be completely deleted in accordance with the applicable rules of the National Archives of the Philippines Act and Data Privacy Act.</p>
            <div>
                <a href="#" class="btn btn-next btn-block ml-auto">Accept and Proceed to Registration</a>
            </div>
          </div>
          <div class="form-step">
            <h3 class="text-center">Setup your Account</h3>          
                <div class="form-group col">
                    <label for="fname">Email Address</label>
                    <input type="email" required class="form-control"  name="email" placeholder="">
                </div>
                <div class="form-group col">
                  <label for="mname">Password</label>
                  <input type="password" class="form-control"  id="password" name="password" placeholder="">
                </div>
                <div class="form-group col">
                  <label for="lname">Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password"  placeholder="">
                </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
          </div>

          <div class="form-step">
            <h3 class="text-center">Personal Information</h3>
            <div class="form-row">            
                <div class="form-group col-md-4">
                    <label for="fname">First Name</label>
                    <input type="text" required class="form-control"  name="firstname" placeholder="">
                </div>
                <div class="form-group col-md-4">
                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control"  name="middlename" placeholder="">
                </div>
                <div class="form-group col-md-4">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control"  name="lastname" placeholder="">
                </div>
              </div>
              <div class="form-row">                 
                <!-- <div class="form-group col-md-6">
                  <label for="phonenum">Phone Number</label>
                  <input type="number" class="form-control"  name="contact"placeholder="">
                </div> -->
                <div class="form-group col-md-4">
                  <label for="phonenum">Phone Number</label>
                  <input id="txtnumber"  name="contact"  type="text" maxlength="13" placeholder="xxx-xxx-xxxx" /><br /><br />
                </div>

                <div class="form-group col-md-6">
                  <label for="bday">Birthday</label>
                  <input type="date" class="form-control"  name="dateOfBirth" placeholder="">   
                </div>
              </div>
              <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputAddress2">Address<br> <small class="text-muted">House Number</small></label>
                <input type="text" class="form-control" name="house_num"  placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2"><br> <small class="text-muted">Barangay</small></label>
                <input type="text" class="form-control" name="barangay"  placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2"><br> <small class="text-muted">City</small></label>
                <input type="text" class="form-control" name="city"  placeholder="">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress2"><br> <small class="text-muted">Province</small></label>
                <input type="text" class="form-control" name="province"  placeholder="">
              </div>
              </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
          </div>

          <!--Educational Background-->
          <div class="form-step">
            <h3 class="text-center">Educational Background</h3>
            <div class="form-group ">
              <label for="inputAddress2 ">Eligibility<br><small>(You may check more than one)</small></label>
            <div class=" mt-3 pl-4">
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="eligibility[]" value="None" id="eligibility1">
                <label class="custom-control-label" for="eligibility1">None</label>
              </div>       
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="eligibility[]" value="Civil Service Sub-Professional"id="eligibility2">
                <label class="custom-control-label" for="eligibility2">Civil Service Sub-Professional</label>
              </div>  
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="eligibility[]" value="Civil Service Professional" id="eligibility3">
                <label class="custom-control-label" for="eligibility3">Civil Service Professional</label>
              </div>    
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="eligibility[]" value="RA 1080 (Bar/Board)" id="eligibility4">
                <label class="custom-control-label" for="eligibility4">RA 1080 (Bar/Board)</label>
              </div>         
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" name="eligibility[]" value="Other Eligibilities Granted under Speacial Laws" id="eligibility5">
                <label class="custom-control-label" for="eligibility5">Other Eligibilities Granted under Speacial Laws</label>
              </div> 
            </div> 
            </div>
            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="bday">School</label>
                    <input type="text" class="form-control"  name="school" placeholder="">   
                </div>
                <div class="form-group col-md-6">
                  <label for="bday">Course</label>
                  <input type="text" class="form-control"  name="course" placeholder="">   
              </div>
            </div>
            <div class="form-group ">
                <label for="inputAddress2 ">Highest Educational Attainment </label>
              <div class=" mt-3 pl-4">
                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" name="qualification" value="Post Graduate Studies" id="defaultGroupExample1" >
                  <label class="custom-control-label" for="defaultGroupExample1">Post Graduate Studies</label>
                </div>         
                <!-- Group of default radios - option 2 -->
                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" name="qualification" value="Bachelor’s Degree" id="defaultGroupExample2" >
                  <label class="custom-control-label" for="defaultGroupExample2">Bachelor’s Degree</label>
                </div>         
                <!-- Group of default radios - option 3 -->
                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" name="qualification" value="High School" id="defaultGroupExample3" >
                  <label class="custom-control-label" for="defaultGroupExample3">High School</label>
                </div>
                <div class="form-inline mt-4 "><label for="bday">Others: </label>
                <input type="text" class="form-control ml-3 w-75"  name="qualification_text" placeholder="">  
                   </div>           
              </div> 
              </div>
            <div class="btns-group">
              <a href="#" class="btn btn-prev">Previous</a>
              <a href="#" class="btn btn-next">Next</a>
            </div>
          </div>

          <!--Work Experience-->
          <div class="form-step">
            <h3 class="text-center">Work Experience</h3>
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="phonenum">Recent Job Title <br><small>(Enter N/A if not applicable)</small></label>
                    <input type="text" class="form-control"  name="jobtitle" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="bday">Recent Company / Job Agency <br><small>(Enter N/A if not applicable)</small></label>
                    <input type="text" class="form-control"  name="company" placeholder="">   
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="phonenum">Number of Years of your Work Experience</label>
                    <input type="number" class="form-control" name="years" id="years" placeholder="">
                </div>
                <div class="form-group col-md-12">
                  <label for="bday">Reference Email</label>
                  <input type="email" class="form-control"  name="refEmail" placeholder="">   
                </div>
              </div>
              
            <div class="btns-group">
              <a href="#" class="btn btn-prev">Previous</a>
              <input type="submit" value="Submit" class="btn" />
              <!-- <a href="profile.html" class="btn">Submit</a> -->
            </div>
          </div>
      </form>
   </section>


  <!--sign up form-->
  @endsection