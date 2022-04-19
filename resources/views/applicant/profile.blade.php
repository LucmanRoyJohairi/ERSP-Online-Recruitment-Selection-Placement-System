@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/profile.css') }}" rel="stylesheet">
@endsection

@section('content')

<!--profile-->
<section id="profile-page">
     
    <div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
      <div class="container">

      <div class="container">
      <div class="col">
        <div class="card">
          <div class="container">                      
         
          <div class="row">
            <div class="col-12" >
                  
              <div id="diva" class="targetDiv2">
                <div class="container" id="myGroup">
                  @if($apply)
                  <h4 class="head-timeline"><span>{{ $user->applications->job->name }}</span><br> APPLICATION TIMELINE</h4>
                  
                  @else
                  <h4 class="head-timeline"><span>No active applications</span><br> APPLICATION TIMELINE</h4>

                  @endif
                  <div id="timeline-wrap">
                    <div id="timeline-up"></div>
                    <!-- process -->
                    @if(!$apply)
                    <div class="marker mfirst timeline-icon">
                        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" ><i class="fa fa-envelope" ></i></a>
                    </div>

                    <div class="marker m2 timeline-icon two">
                        <a data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"><i class="fa fa-th-list" ></i></a>
                    </div>

                    <div class="marker m3 timeline-icon three">
                        <a data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3"><i class="fa fa-commenting"></i></a>
                    </div>

                    <div class="marker m4 timeline-icon four">
                        <a data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4"><i class="fa fa-star"></i></a>
                    </div>

                    <div class="marker m5 timeline-icon four">
                        <a data-toggle="collapse" data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5"><i class="fa fa-handshake-o"></i></a>
                    </div>
                    <div class="marker m6 timeline-icon four">
                        <a data-toggle="collapse" data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6"><i class="fa fa-briefcase" ></i></a>
                    </div>
                    <div class="marker mlast timeline-icon four">
                        <a data-toggle="collapse" data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6"><i class="fa fa-user-circle" ></i></a>
                    </div>


                    @else
                      @if($apply->application_status == 'pending') 
                      
                        @include('applicant.steps.pending')

                      @endif

                      @if($apply->application_status == 'shortlist') 
                      
                        @include('applicant.steps.shortlist')

                      @endif

                      @if($apply->application_status == 'screening') 
                      
                        @include('applicant.steps.screening')

                      @endif

                      @if($apply->application_status == 'rating') 
                      
                        @include('applicant.steps.rating')

                      @endif
                      @if($apply->application_status == 'joboffer') 
                      
                        @include('applicant.steps.joboffer')

                      @endif
                      @if($apply->application_status == 'onboarding') 
                      
                        @include('applicant.steps.onboarding')

                      @endif
                      @if($apply->application_status == 'hired') 
                      
                      @include('applicant.steps.hired')

                    @endif
                    @endif
                    
                    
                  
  
                    <p></p>
                    <p></p>
                  </div>
                  @if($apply)

                    @if($apply->application_status == 'pending') 

                      <div class="timeline-content">
                        <p><span class="head-txt">Application Received</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif
                    @if($apply->application_status == 'shortlist') 

                      <div class="timeline-content">
                        <div class="timeline-content">
                          <p><span class="head-txt">Application Shortlisted</span>
                            <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                          </p>
                      </div>
                      </div>
                    @endif
                    @if($apply->application_status == 'screening') 

                      <div class="timeline-content">
                        <p><span class="head-txt">Screening Process</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif
                    @if($apply->application_status == 'rating') 
                    
                      <div class="timeline-content">
                        <p><span class="head-txt">You are Ranked!</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif
                    @if($apply->application_status == 'joboffer') 

                      <div class="timeline-content">
                        <p><span class="head-txt">Job Offer & Pre-Employment Requirements</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif
                    @if($apply->application_status == 'onboarding') 

                      <div class="timeline-content">
                        <p><span class="head-txt">Onboarding Process</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif         
                    
                    @if($apply->application_status == 'hired') 

                      <div class="timeline-content">
                        <p><span class="head-txt">You are hired!</span>
                          <br><span class="text-muted">{{ $apply->updated_at->format('M d, Y') }}</span>
                        </p>
                      </div>
                    @endif         
                  @endif         
                  
              </div>

              </div>

              
  
  
              </div><!-- Col-->
            

          </div>
        </div>  
      </div>
    </div>
      <div class="main-body wow fadeIn">
      
            <div class="row gutters-sm">

            <div class="col-md-4 mb-3">

<div class="card">

  <div class="card-body">
    
    <div class="d-flex flex-column align-items-center text-center pt-3">
      
      <div class="container-art">
        <img src="{{ asset('applicant/img/user.png') }}" alt="Admin" class=" image rounded-circle">
      </div>
                  
      <div class="mt-3">

        <h3><b>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname}}</b></h3>

            <div class=" contacts pl-2">
                
            <div class="in-contacts ">
                <i class="fa fa-envelope" aria-hidden="true"></i>Email<p class="details">{{ $user->email }}</p>
            </div>
            <div class="in-contacts">
            <i class="fa fa-phone" aria-hidden="true"></i>Contact Number<p  class="details">{{ $user->contact }}</p>
            </div>
        
            </div>

            <div class="applied-jobs">
                <h4>Applied Jobs</h4>

            
                <div class="buttonss px-5 pt-1 pb-2">
                  @if($apply)
                  <div class="col ">
                    <a  class="showSingle2" data-target="a">{{ $user->applications->job->name}}</a> 
                  </div>
                  @else
                  <div class="col ">
                    <a  class="showSingle2" data-target="a">N/A</a> 
                  </div>
                  @endif
                </div>

            </div>

      </div>


    </div>

  </div>
</div>
</div>

            

              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm">
                          <ul class="nav nav-tabs justify-content-center"  id="myTab" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="attachments-tab" data-toggle="tab" href="#attachments" role="tab" aria-controls="attachments" aria-selected="false">Attachments</a>
                            </li>
                           
                            <li class="nav-item">
                              <a class="nav-link" id="pre-employment-tab" data-toggle="tab" href="#pre-employment" role="tab" aria-controls="pre-employment" aria-selected="false" >Pre-Employment Documents</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="issuance-tab" data-toggle="tab" href="#issuance" role="tab" aria-controls="issuance" aria-selected="false">Issuance</a>
                            </li>

                           
                          </ul>
                      
                    </div>
                  </div>
                    
                    <!--profile page-->
                    <div class="tab-content profile-tab " id="myTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container mt-3">
                          <div class="sections">
                            <h5>PERSONAL INFORMATION</h5>
                            <ul>
                              <li><b>Name:</b> {{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname}}</li>
                              <li><b>Phone Number: </b> {{ $user->contact }}</li>
                              <li><b>Email: </b> {{ $user->email }}</li>
                              <li><b>Birthday: </b> {{ $user->dateOfBirth }}</li>
                              <li><b>Address: </b>{{ $address->house_number }} {{ $address->barangay }} {{ $address->city }} {{ $address->province }}</li>
                            </ul>
                          </div>
                          <div class="sections">
                            <h5>EDUCATION</h5>
                            <ul>
                              <li><b>Eligibility:</b> 
                              @foreach($eligibility as $eli)
                                {{ $eli->eligibility_name }}

                              @endforeach
                            </li>
                              <li><b>School: </b>{{ $education->school }}</li>
                              <li><b>Course:</b> {{ $course->course_name }}</li>
                              <li><b>Highest Educational Attainment:</b> {{ $quali->qualification_name}}</li>
                            </ul>
                          </div>
                          <div class="sections">
                            <h5>WORK EXPERIENCE</h5>
                            <ul>
                              <li><b>Recent Job Title: </b>{{ $experience->job_title }} </li>
                              <li><b>Recent Company / Job Agency:</b> {{ $experience->company }}</li>
                              <li><b>Inclusive Dates of Recent Work Experience (FROM):</b> {{ $experience->date_started }}</li>
                              <li><b>Inclusive Dates of Recent Work Experience (TO):</b> {{ $experience->date_ended }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                     <!--attachments -->
                      
                      <div class="tab-pane p-4 fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
                        
                        <h6 ><small style="font-weight: 700; color: red;">Make sure to correctly name the file before uploading (example: letter_of_intent)</small></h6>
                        <hr>
                        <div class="row mb-3 ">
                          <div class="col-6">
                            <div class="headings">DOCUMENTS</div>
                          </div>
                          <div class="col-6">
                            <div class="headings">FILE</div>
                          </div>
                        </div>

                        <form action="{{ route('save-docs', $user->id) }}" method="POST" enctype='multipart/form-data'>
                          @csrf
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            Letter of Intent
                          </div>
                          <div class="col-6"> 
                          
                            <div class="custom-file">
                              <input id="logo" type="file" name="req1" class="custom-file-input">
                              @if($requirements[0])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[0]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
          
                          </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            CSC Form 212, Revised 2017 (Personal Data Sheet) with ID picture taken within the last 6 months, 3.5cm x 4.5cm (passport size) and with full and handwritten name tag and signature overprinted name
                          </div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req2" class="custom-file-input">

                              @if($requirements[1])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[1]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            Curriculum Vitae  </div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req3" class="custom-file-input">

                              @if($requirements[2])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[2]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                              @endif

                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6 ">
                            Photocopy of Transcript of Records  </div>
                          <div class="col-6 "> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req4" class="custom-file-input">

                            @if($requirements[3])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[3]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                         </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6 ">
                            Photocopy of Diploma  </div>
                          <div class="col-6 "> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req5" class="custom-file-input">

                              @if($requirements[4])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[4]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            Photocopy from the authenticated copy of Diploma and TOR (authenticated by the school registrar)</div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req6" class="custom-file-input">

                              @if($requirements[5])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[5]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
          
                        <hr>
                         <div class="row file-row">
                          <div class="col-6">
                            Photocopy from the authenticated copy of unexpired PRC License / Board Rating / CS Eligibility</div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req7" class="custom-file-input">

                            @if($requirements[6])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[6]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
          
                        <hr>
                         <div class="row file-row">
                          <div class="col-6">
                            Photocopy of Certificate of relevant trainings / seminars attended (if applicable)</div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req8" class="custom-file-input">

                            @if($requirements[7])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[7]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
          
                        <hr>
                         <div class="row file-row">
                          <div class="col-6">
                            Photocopy of Certificate of Employment (if applicable)</div>
                          <div class="col-6 "> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req9" class="custom-file-input">

                            @if($requirements[8])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[8]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
          
                        <hr>
                         <div class="row file-row">
                          <div class="col-6">
                            Individual Performance Commitment and Review (IPCR) / Performance Rating in the last 2 rating periods, if applicable</div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req10" class="custom-file-input">

                              @if($requirements[9])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[9]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
                        
                        
                        <hr>
                        <div class="row file-row breaker">
                          <div class="col">
                            Certificate for the appropriate/required eligibility/licenses  </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            Photocopy of Professional Regulation Commission (PRC) professional ID card/certificate of registration/license and other eligibilities, if available  </div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req11" class="custom-file-input">

                            @if($requirements[10])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[10]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row file-row">
                          <div class="col-6">
                            Photocopy of ratings obtained in the Licensure Examination for teachers (LET)/Professional Board Examination for Teachers (PBET), if available.  </div>
                          <div class="col-6"> 
                            <div class="custom-file">
                            <input id="logo" type="file" name="req12" class="custom-file-input">

                            @if($requirements[11])
                              <label for="logo" class="custom-file-label text-truncate">{{ $requirements[11]->file_path}}</label>
                              @else
                              <label for="logo" class="custom-file-label text-truncate">Choose file...</label>

                              @endif
                           </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block save-it">Save</button>
                        </form>

                      </div>


                    <!-- Pre-emp -->
                    <div class="tab-pane attach fade" id="pre-employment" role="tabpanel" aria-labelledby="pre-employment-tab">
                        
                        <div class="pre">
                          <div class="row file-row">
                            <div class="col-6 headings">Pre-Employment Documents</div>
                            <div class="col-6 headings">Files</div>
                          </div>
                          <hr>

                          <form action="{{ route('save-pre-emp', $user->id) }}" method="POST" enctype='multipart/form-data'>
                          @csrf
                          <div class="row file-row">
                            <div class="col-12 breaker2">A. Personal Documents </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Personal Data Sheet 3 Original (Notarized) - Long Bond Paper
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                                <input id="logo" type="file" name="pre-emp1" class="custom-file-input">
                                @if($preEmpDocs[0])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[0]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Clearance from Previous employer - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                                <input id="logo" type="file" name="pre-emp2" class="custom-file-input">
                                @if($preEmpDocs[1])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[1]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Original NSO Birth Certificate - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp3" class="custom-file-input">
                                @if($preEmpDocs[2])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[2]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Marriage Certificate (if married) - 2 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp4" class="custom-file-input">
                                @if($preEmpDocs[3])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[3]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Birth Certificate of children - 2 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp5" class="custom-file-input">
                                @if($preEmpDocs[4])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[4]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-12 breaker2">B. Educational Documents</div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              2 Authenticated Copies of Transcript of Records
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp6" class="custom-file-input">
                                @if($preEmpDocs[5])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[5]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              2 Authenticated Copies of Diploma (College, Graduate School, Post-graduate)
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp7" class="custom-file-input">
                                @if($preEmpDocs[6])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[6]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              2 Authenticated Copies of Certificate of Eligibility (if applicable)
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp8" class="custom-file-input">
                                @if($preEmpDocs[7])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[7]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              2 Authenticated Copies of PRC ID (if applicable)
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp9" class="custom-file-input">
                                @if($preEmpDocs[8])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[8]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-12 breaker2">
                              C. Government Documents
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-12">
                              Medical Certificate for pre-employment as per CSC form NO. 211 with documentary stamp and the following Medical Test results - 2 Original:
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              a. Blood Test - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp10" class="custom-file-input">
                                @if($preEmpDocs[9])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[9]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              b. Urinalysis - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp11" class="custom-file-input">
                                @if($preEmpDocs[10])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[10]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              c. Chest X-ray - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp12" class="custom-file-input">
                                @if($preEmpDocs[11])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[11]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              d. Drug Test - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp13" class="custom-file-input">
                                @if($preEmpDocs[12])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[12]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              e. Neuropsychiatric Examination w/ Pyschological Test 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp14" class="custom-file-input">
                                @if($preEmpDocs[13])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[13]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              NBI Clearance - 1 Original & 1 Photocopy
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp15" class="custom-file-input">
                                @if($preEmpDocs[14])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[14]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Statement of Assets, Liabilities and Net Worth (SALN) - 3 Original (Notarized)
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp16" class="custom-file-input">
                                @if($preEmpDocs[15])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[15]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              BIR Form 1902 (Application for Refistration) and Form 2305 - 2 Original (Downloadable)  </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp17" class="custom-file-input">
                                @if($preEmpDocs[16])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[16]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Pag Ibig Fund member’s Data Form (MDF) with Registration Tracking Number (RTN) - 1 Original & 1 photocopy </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp18" class="custom-file-input">
                                @if($preEmpDocs[17])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[17]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Philhealth Number and Philhealth Membership Form with Philhealth Number - 2 Original </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp19" class="custom-file-input">
                                @if($preEmpDocs[18])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[18]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-12 breaker2">D. Additional Requirements fro transferees (from one government office to another)	 </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Clearance from money, property and legal accountabilities from the previous office.
                            </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp20" class="custom-file-input">
                                @if($preEmpDocs[19])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[19]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Certified true copy of pre-audited disbursement voucher of last salary from previous agancy and/or
                              Certification by the Chief Accountant of last salary received from previous office duty verified by the assigned auditor thereat. </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp21" class="custom-file-input">
                                @if($preEmpDocs[20])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[20]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Certified of Available Leave Credits  </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp22" class="custom-file-input">
                                @if($preEmpDocs[21])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[21]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row file-row">
                            <div class="col-6">
                              Service Record  </div>
                            <div class="col-6">
                              <div class="custom-file">
                              <input id="logo" type="file" name="pre-emp23" class="custom-file-input">
                                @if($preEmpDocs[22])
                                <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[22]->file_path}}</label>
                                @else
                                <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
                                @endif
                             </div>
                            </div>
                          </div>

                          
                          <button type="submit" class="btn btn-primary btn-block save-it">Save</button>
                      </form>

                        </div>
                      </div>
                      <!-- PRE-EMPLOYMENT -->
                      <div class="tab-pane fade" id="issuance" role="tabpanel" aria-labelledby="issuance-tab">
                        <div class="card border" style="margin:30px;">
                          <div class="card-header text-white" style="background-color: #08376B;">
                            Issuance of Appointment
                          </div>
                          <div class="card-body">
                            <blockquote class="blockquote mb-0 p-5 text-10">
                              @if($issuance)
                              <a href="{{ $issuance->link}}" class="">{{ $issuance->link}}</a>
                              @else
                              <p>Issuance of appointment file is currently not available, You will be notified when file is available for download.</p>
                              

                              @endif

                            </blockquote>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        @if($issuance)

                          <a href="{{ $issuance->link}}" class="text-white" style="background-color: #08376B; margin: 5px 0 20px 0; padding: 10px;">Download File</a>
                       @endif
                        </div>
                      </div>

                   
                      
                  </div>
                </div>
              </div>
           
  
          </div>
      </div>
  </section>
@endsection