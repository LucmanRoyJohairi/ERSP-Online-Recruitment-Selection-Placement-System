@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/user-apply.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row breads bg-light">
    <div class="col-lg-12 ">  
      <nav aria-label="breadcrumb ">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="careers.html">Careers</a></li>
        <li class="breadcrumb-item"><a href="job-description.html">Job Details</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fill In Application</li>
      </ol>
      </nav>
    </div>
  </div>
  <!--sign up form-->
  <section id="apply">
    <div class="section-title">
      <h2>{{ $job->name}}</h2>
    </div>
    <div class="col-12 col-lg-3 ml-auto mr-auto mb-4">  
      <div class="progressbar">
          <div class="progress" id="progress"></div>
          <div class="progress-step progress-step-active"></div>
          <div class="progress-step" ></div>
          <div class="progress-step" ></div>
        </div>

  </div>

      <!-- Steps -->
      <form action="#" class="form ">
        <div class="form-step form-step-active">
          <p class="subt text-center text-muted">Fill In Application</p>
          
            <!--Personal Information-->
            <h3>Personal Information</h3>
            <div class="inner-form bg-white">
              <div class="form-row">            
                <div class="form-group col-md-4">
                    <label for="fname">First Name</label>
                    <input type="text" required class="form-control" id="fname" placeholder="" value="{{ $user->firstname }}" readonly required>
                </div>
                <div class="form-group col-md-4">
                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control" id="mname" value="{{ $user->middlename }}"placeholder="" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" id="lname" value="{{ $user->lastname }}" placeholder="" readonly>
                </div>
              </div>
              <div class="form-row">                 
                <div class="form-group col-md-4">
                  <label for="phonenum">Phone Number</label>
                  <input type="number" class="form-control" id="phonenum" value="{{ $user->contact }}"placeholder="" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input type="email"  class="form-control" value="{{ $user->email }}"id="email" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label for="bday">Birthday</label>
                  <input type="date" class="form-control" id="bday" value="{{ $user->dateOfBirth }}" placeholder="" readonly>   
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputAddress2">Address<br> <small class="text-muted">House Number</small></label>
                  <input type="text" class="form-control" value="{{ $address->house_number }}" id="inputAddress2" placeholder="" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress2"><br> <small class="text-muted">Barangay</small></label>
                  <input type="text" class="form-control" value="{{ $address->barangay }}" id="inputAddress2" placeholder="" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress2"><br> <small class="text-muted">City</small></label>
                  <input type="text" class="form-control" value="{{ $address->city }}" id="inputAddress2" placeholder="" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputAddress2"><br> <small class="text-muted">Province</small></label>
                  <input type="text" class="form-control" value="{{ $address->province }}" id="inputAddress2" placeholder="" readonly> 
                </div>
              </div>
            </div>

            <!--Educational Background-->
            <h3>Educational Background</h3>
            <div class="inner-form bg-white">
              <div class="form-row">
              <div class="form-group ">
                  <label for="inputAddress2 ">Eligibility<br><small>(You may check more than one)</small></label>
                <div class=" mt-3 pl-4">
                  <div class="custom-control custom-checkbox mb-3">
                  @if(in_array('None',$eliName))

                  <input type="checkbox" class="custom-control-input" id="eligibility1" checked disabled>
                  @else
                  <input type="checkbox" class="custom-control-input" id="eligibility1" disabled >

                  @endif
                    
                    <label class="custom-control-label" for="eligibility1">None</label>
                  </div>       
                  <div class="custom-control custom-checkbox mb-3">
                    @if(in_array('Civil Service Sub-Professional',$eliName))

                    <input type="checkbox" class="custom-control-input" id="eligibility2" checked disabled>
                    @else
                    <input type="checkbox" class="custom-control-input" id="eligibility2" disabled >

                    @endif
                    <label class="custom-control-label" for="eligibility2">Civil Service Sub-Professional</label>
                  </div>  
                  <div class="custom-control custom-checkbox mb-3">
                    @if(in_array('Civil Service Professional',$eliName))

                    <input type="checkbox" class="custom-control-input" id="eligibility3" checked disabled>
                    @else
                    <input type="checkbox" class="custom-control-input" id="eligibility3" disabled >

                    @endif
                    <label class="custom-control-label" for="eligibility3">Civil Service Professional</label>
                  </div>    
                  <div class="custom-control custom-checkbox mb-3">
                    @if(in_array('RA 1080 (Bar/Board)',$eliName))

                    <input type="checkbox" class="custom-control-input" id="eligibility4" checked disabled>
                    @else
                    <input type="checkbox" class="custom-control-input" id="eligibility4" disabled >

                    @endif
                    <label class="custom-control-label" for="eligibility4">RA 1080 (Bar/Board)</label>
                  </div>         
                  <div class="custom-control custom-checkbox mb-3">
                    @if(in_array('Other Eligibilities Granted under Special Laws',$eliName))

                    <input type="checkbox" class="custom-control-input" id="eligibility4" checked disabled>
                    @else
                    <input type="checkbox" class="custom-control-input" id="eligibility4" disabled >

                    @endif
                    <label class="custom-control-label" for="eligibility5">Other Eligibilities Granted under Special Laws</label>
                  </div> 
                </div> 
                </div>
                
                    <div class="form-group col-md-6">
                      <label for="bday">School</label>
                      <input type="text" class="form-control" value="{{ $education->school }}" id="bday" placeholder="" readonly>    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bday">Course</label>
                    <input type="text" class="form-control" value="{{ $course->course_name }}" id="bday" placeholder="" readonly>   
                </div>
              </div>
           
              <div class="form-group ">
              <label for="inputAddress2 ">Highest Educational Attainment </label>
              <div class=" mt-3 pl-4">
                <div class="custom-control custom-radio mb-3">
                    @if($quali->qualification_name == 'Post Graduate Studies')
                  <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
                    @else
                  <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" disabled>
                    @endif
                  <label class="custom-control-label" for="defaultGroupExample1">Post Graduate Studies</label>
                </div>         
                <!-- Group of default radios - option 2 -->
                <div class="custom-control custom-radio mb-3">
                @if($quali->qualification_name == "Bachelor’s Degree")

                  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                  @else
                  <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" disabled>
                  @endif
                  <label class="custom-control-label" for="defaultGroupExample2">Bachelor’s Degree</label>
                </div>         
                <!-- Group of default radios - option 3 -->
                <div class="custom-control custom-radio mb-3">
                @if($quali->qualification_name == "High School")
                
                  <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios" checked>
                @else
                <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios" disabled>

                @endif
                  <label class="custom-control-label" for="defaultGroupExample3">High School</label>
                </div>
                <div class="form-inline mt-4 "><label for="bday">Others: </label>
                  <input type="text" class="form-control ml-3 w-75" id="bday" placeholder="" readonly>   </div>     
                </div> 
              </div><!-- form -->
            </div>

            <!--Work Experience-->
            <h3>Work Experience</h3>
            <div class="inner-form bg-white">
            <div class="form-row">            
                <div class="form-group col-md-6">
                    <label for="phonenum">Recent Job Title <br><small>(Enter N/A if not applicable)</small></label>
                    <input type="text" class="form-control" value="{{ $experience->job_title }}" id="phonenum" placeholder="" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="bday">Recent Company / Job Agency <br><small>(Enter N/A if not applicable)</small></label>
                    <input type="text" class="form-control" value="{{ $experience->company }}"  id="bday" placeholder="" readonly>   
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phonenum">Inclusive Dates of Recent Work Experience: (FROM)</label>
                    <input type="date" class="form-control" value="{{ $experience->date_started }}"  id="bday" placeholder="" readonly>   
                </div>
                <div class="form-group col-md-6">
                    <label for="bday">Inclusive Dates of Recent Work Experience: (TO)</label>
                    <input type="date" class="form-control" id="bday" value="{{ $experience->date_ended }}" placeholder="" readonly>   
                </div>
              </div>
            </div>
            <div>
              
              <a href="#" class="btnss btn-next btn-block ml-auto">Next</a>
          </div>
          </div>


          <!--File table-->
          <div class="form-step">
            <p class="subt text-center text-muted">Job Application Files</p>
            <div class="table-responsive">
              <table class="table ">
                <thead class="bg-white" >
                  <tr>
                    <th class="heading" scope="col">Documentary Requirements</th>
                    <th class="heading" scope="col">File</th>
                    
                  </tr>
                </thead>
                <tbody class="bg-white">
                  <tr>
                    <th scope="row">Letter of Intent</th>
                    @if($requirements[0])

                    <td class="w-25"><a href="{{ $requirements[0]->file_path}}">{{ $requirements[0]->filename}}</a></td>
                    @endif
                  </tr>
                  <tr>
                    <th scope="row">CSC Form 212, Revised 2017 (Personal Data Sheet) with ID picture taken within the last 6 months, 3.5cm x 4.5cm (passport size) and with full and handwritten name tag and signature overprinted name</th>
                    @if($requirements[1])

                    <td><a href="{{ $requirements[1]->file_path}}">   {{ $requirements[1]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Curriculum Vitae</th>
                    @if($requirements[2])

                    <td><a href="{{ $requirements[2]->file_path}}">{{ $requirements[2]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Photocopy of Transcript of Records</th>
                    @if($requirements[3])

                    <td><a href="{{ $requirements[3]->file_path}}">{{ $requirements[3]->filename}}</a></td>
                    @endif
                  
                  </tr>
                  <tr>
                    <th scope="row">Photocopy of Diploma</th>
                    @if($requirements[4])

                    <td><a href="{{ $requirements[4]->file_path}}">{{ $requirements[4]->filename}}</a></td>
                    @endif
                   
                  </tr>
                  <tr>
                    <th class="pop" scope="row">Certificate for the appropriate/required eligibility/licenses</th>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th class="pl-5" scope="row">Photocopy of Professional Regulation Commission (PRC) professional ID card/certificate of registration/license and other eligibilities, if available</th>
                    @if($requirements[5])

                    <td><a href="{{ $requirements[5]->file_path}}">{{ $requirements[5]->filename}}</a></td>
                    @endif
                  
                  </tr>
                  <tr>
                    <th class="pl-5">Photocopy of ratings obtained in the Licensure Examination for teachers (LET)/Professional Board Examination for Teachers (PBET), if available.</th>
                    @if($requirements[6])

                    <td><a href="{{ $requirements[6]->file_path}}">{{ $requirements[6]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Photocopy from the authenticated copy of Diploma and TOR (authenticated by the school registrar)                                </th>
                    @if($requirements[7])

                    <td><a href="{{ $requirements[7]->file_path}}">{{ $requirements[7]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Photocopy from the authenticated copy of unexpired PRC License / Board Rating / CS Eligibility                                </th>
                    @if($requirements[8])

                    <td><a href="{{ $requirements[8]->file_path}}">{{ $requirements[8]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Photocopy of Certificate of relevant trainings / seminars attended (if applicable)                                </th>
                    @if($requirements[9])

                    <td><a href="{{ $requirements[9]->file_path}}">{{ $requirements[9]->filename}}</a></td>
                    @endif
                   
                  </tr>
                  <tr>
                    <th scope="row">Photocopy of Certificate of Employment (if applicable)                                </th>
                    @if($requirements[10])

                    <td><a href="{{ $requirements[10]->file_path}}">{{ $requirements[10]->filename}}</a></td>
                    @endif
                    
                  </tr>
                  <tr>
                    <th scope="row">Individual Performance Commitment and Review (IPCR) / Performance Rating in the last 2 rating periods, if applicable</th>
                    @if($requirements[11])

                    <td><a href="{{ $requirements[11]->file_path}}">{{ $requirements[11]->filename}}</a></td>
                    @endif
                    
                  </tr>
                </tbody>
              </table>
            </div>
             <div class="btns-group">
              <a href="#" class="btnss btn-prev">Previous</a>
              <a href="#" class="btnss btn-next">Next</a>
          </div>          
          </div>                      


                  <!--Data Privacy-->
        <div class="form-step ">
          <h3 class="text-center">Acknowledgement of Job Application</h3>
          <div class="inner-form bg-white">
            <p>Thank you for your interest in applying for a position at University of Science and Technology of Southern Philippines. We will review shortly your application based on the qualification standards for this position. We will contact you soon should you be part of our shortlisted applicants.

              Please be informed that if you will not receive a notice from the recruitment staff within sixty (60) days from the receipt of this email, it is understood that your application for a specific position has not been successful. However, we will keep your necessary contact details for our applicant database should there be a future job vacancy suitable for your credentials. Thank you.</p>
          </div>
          <div class="btns-group">
          <a href="#" class="btnss btn-prev">Previous</a>
          <a href="{{ route('submit-application', $job->id) }}" class="btnss btn-next">Accept</a>
        </div>
        </div>

      </form>
   </section>

@endsection