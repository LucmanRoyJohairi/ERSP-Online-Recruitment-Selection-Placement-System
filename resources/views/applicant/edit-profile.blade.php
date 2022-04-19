@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/edit-profile.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="section-header">

<div class="container">
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
      @endif
      <div class="section-title">
        <h2>Edit Profile</h2>
      </div>

      <div class="container light-style flex-grow-1 container-p-y">  
          <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
              <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                  <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Education</a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Work Experience</a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                </div>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="account-general">
      
                    <div class="card-body  align-items-center">
                      
                      <div class="row mt-2 text-left d-flex justify-content-center">
                      
                          <div class="col-12">
                            <h2 style="font-weight: 700;color:#0070D0;" >{{ $user->firstname}} {{ $user->middlename[0]}} {{ $user->lastname}}</h2>
                          
                            <div class="text-muted"><small>Joined on {{ $user->created_at->format('M d, Y') }}</small></div>
                           
                          </div>
                         
                      
                      </div>
                      
                     
                    </div>
                    <hr class="border-light m-0">
                    <form action="{{ route('save-edit') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" name="fname" class="form-control" value="{{ $user->firstname}}">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" name="mname"  class="form-control" value="{{ $user->middlename}}">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lname"  class="form-control" value="{{ $user->lastname}}">
                      </div>
                      <div class="form-group ">
                        <label for="phonenum">Phone Number</label>
                        <input type="number" name="contact"  class="form-control" id="phonenum" value="{{ $user->contact }}">
                      </div>
                      <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <input type="text" name="email" class="form-control mb-1" value="{{ $user->email}}">
                        <!-- <div class="alert alert-warning mt-3">
                          Your email is not confirmed. Please check your inbox.<br>
                          <a href="javascript:void(0)">Resend confirmation</a>
                        </div> -->
                      </div>
                      <div class="form-group">
                        <label for="phonenum">Birthday</label>
                        <input type="date" class="form-control" name="dateOfBirth"  id="bday" value="{{ $user->dateOfBirth}}" placeholder="">   
                    
                    </div>
                    <div class="form-group ">
  
                        <label for="inputAddress2">Address<br> <small class="text-muted">House Number</small></label>
                        <input type="text" class="form-control" name="house_number" id="inputAddress2" value="{{ $user->address->house_number}}" placeholder="">
                      
                        <label for="inputAddress2"> <small class="text-muted">Barangay</small></label>
                        <input type="text" class="form-control" name="barangay" id="inputAddress2" value="{{ $user->address->barangay }}" placeholder="">
                     
                      
                        <label for="inputAddress2"> <small class="text-muted">City</small></label>
                        <input type="text" class="form-control" name="city" id="inputAddress2"value="{{ $user->address->city}}" placeholder="">
                     
                     
                        <label for="inputAddress2"> <small class="text-muted">Province</small></label>
                        <input type="text" class="form-control" name="province" id="inputAddress2" value="{{ $user->address->province}}" placeholder="">
                      
                  </div>
                  </div>
      
                  </div>
                  <div class="tab-pane fade" id="account-change-password">
                    <div class="card-body pb-2">
      
                      <div class="form-group">
                        <label class="form-label">Current password</label>
                        <input type="password" class="form-control">
                      </div>
      
                      <div class="form-group">
                        <label class="form-label">New password</label>
                        <input type="password" class="form-control">
                      </div>
      
                      <div class="form-group">
                        <label class="form-label">Repeat new password</label>
                        <input type="password" class="form-control">
                      </div>
      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="account-info">
                    <div class="card-body pb-2">
      
                      <div class="form-group ">
                        <label for="inputAddress2 ">Eligibility<br><small>(You may check more than one)</small></label>
                      <div class=" mt-3 pl-4">
                        <div class="custom-control custom-checkbox mb-3">
                          @if(in_array('None',$eliName))
                          
                          <input type="checkbox" name="eligibility[]" value="None" class="custom-control-input" id="eligibility1" checked>
                          @else
                          <input type="checkbox" name="eligibility[]" value="None" class="custom-control-input" id="eligibility1">
                          @endif


                          <label class="custom-control-label" for="eligibility1">None</label>
                        </div>       
                        <div class="custom-control custom-checkbox mb-3">
                          @if(in_array('Civil Service Sub-Professional',$eliName))

                          <input type="checkbox" name="eligibility[]" value="Civil Service Sub-Professional" class="custom-control-input" id="eligibility2" checked>
                          @else
                          <input type="checkbox" name="eligibility[]" value="Civil Service Sub-Professional" class="custom-control-input" id="eligibility2">
                          @endif
                          

                          <label class="custom-control-label" for="eligibility2">Civil Service Sub-Professional</label>
                        </div>  
                        <div class="custom-control custom-checkbox mb-3">
                          @if(in_array('Civil Service Professional',$eliName))

                          <input type="checkbox" name="eligibility[]" value="Civil Service Professional" class="custom-control-input" id="eligibility3" checked>
                          @else
                          <input type="checkbox" name="eligibility[]" value="Civil Service Professional" class="custom-control-input" id="eligibility3">
                          @endif
                          <label class="custom-control-label" for="eligibility3">Civil Service Professional</label>
                        </div>    
                        <div class="custom-control custom-checkbox mb-3">
                          @if(in_array('RA 1080 (Bar/Board)',$eliName))

                          <input type="checkbox" name="eligibility[]" value="RA 1080 (Bar/Board)" class="custom-control-input" id="eligibility4" checked>
                          @else
                          <input type="checkbox" name="eligibility[]" value="RA 1080 (Bar/Board)" class="custom-control-input" id="eligibility4">
                          @endif
                          <label class="custom-control-label" for="eligibility4">RA 1080 (Bar/Board)</label>
                        </div>         
                        <div class="custom-control custom-checkbox mb-3">
                          @if(in_array('Other Eligibilities Granted under Special Laws',$eliName))

                          <input type="checkbox" name="eligibility[]" value="Other Eligibilities Granted under Speacial Laws" class="custom-control-input" id="eligibility5" checked>
                          @else
                          <input type="checkbox" name="eligibility[]" value="Other Eligibilities Granted under Speacial Laws" class="custom-control-input" id="eligibility5">
                          @endif
                          <label class="custom-control-label" for="eligibility5">Other Eligibilities Granted under Speacial Laws</label>
                        </div> 
                      </div> 
                      </div>
                        <div class="form-group ">
                          <label for="bday">School</label>
                          <input type="text" name="school" class="form-control" value="{{ $user->education->school}}" id="bday" placeholder="">   
                      </div>
                      <div class="form-group">
                        <label for="bday">Course</label>
                        <input type="text" name="course" class="form-control" value="{{ $user->education->course->course_name }}" id="bday" placeholder="">   
                    </div>
                    <label for="inputAddress2 ">Highest Educational Attainment </label>
                    <div class=" mt-3 pl-4">
                      <div class="custom-control custom-radio mb-3">
                        @if($user->education->qualification->qualification_name == 'Post Graduate Studies')

                        <input type="radio" class="custom-control-input" value="Post Graduate Studies" id="defaultGroupExample1" name="qualification" checked>
                        @else
                        <input type="radio" class="custom-control-input" value="Post Graduate Studies" id="defaultGroupExample1" name="qualification">
                        @endif
                        <label class="custom-control-label" for="defaultGroupExample1">Post Graduate Studies</label>
                      </div>         
                      <!-- Group of default radios - option 2 -->
                      <div class="custom-control custom-radio mb-3">
                      @if($user->education->qualification->qualification_name == 'Bachelor’s Degree')

                        <input type="radio" class="custom-control-input" value="Bachelor’s Degree" id="defaultGroupExample2" name="qualification" checked>
                      @else  
                        <input type="radio" class="custom-control-input" value="Bachelor’s Degree" id="defaultGroupExample2" name="qualification">
                      @endif
                        <label class="custom-control-label" for="defaultGroupExample2">Bachelor’s Degree</label>
                      </div>         
                      <!-- Group of default radios - option 3 -->
                      <div class="custom-control custom-radio mb-3">
                      @if($user->education->qualification->qualification_name == 'High School')

                        <input type="radio" class="custom-control-input" value="High School" id="defaultGroupExample3" name="qualification" checked>
                      @else
                        <input type="radio" class="custom-control-input" value="High School" id="defaultGroupExample3" name="qualification">
                      @endif
                        <label class="custom-control-label" for="defaultGroupExample3">High School</label>
                      </div>
                      <div class="form-inline mt-4 "><label for="bday">Others: </label>
                        <input type="text" class="form-control ml-3 w-75" id="bday" placeholder="" name="qualification_text">   
                      </div>           
                    </div> 
      
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body pb-2">
      
                  
                      <!-- <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" value="+0 (123) 456 7891">
                      </div> -->
                     
      
                    </div>
            
                  </div>
                  <div class="tab-pane fade" id="account-social-links">
                    <div class="card-body pb-2">
      
                      <div class="form-group">
                        <label class="form-label">Recent Job Title</label>
                        <input type="text" name="job_title" class="form-control" value="{{ $user->experience->job_title }}">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Recent Company / Job Agency</label>
                        <input type="text" name="company" class="form-control" value="{{ $user->experience->company }}">
                      </div>
                      <div class="form-group ">
                        <label for="phonenum">Total years worked</label>
                        <input type="number" name="total_years" class="form-control" id="bday" value="{{ $user->experience->total_years}}" placeholder="">   
                    </div>
                    <!-- <div class="form-group">
                        <label for="bday">Inclusive Dates of Recent Work Experience: (TO)</label>
                        <input type="date" class="form-control" id="bday" placeholder="">   
                    </div> -->
      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="account-connections">
                    <div class="card-body">
                      <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                      <h5 class="mb-2">
                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                        <i class="ion ion-logo-google text-google"></i>
                        You are connected to Google:
                      </h5>
                      nmaxwell@mail.com
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                      <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                      <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="account-notifications">
                    <div class="card-body pb-2">
      
                      <h6 class="mb-4">Activity</h6>
      
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input" checked="">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">Email me when someone comments on my article</span>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input" checked="">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">Email me when someone answers on my forum thread</span>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">Email me when someone follows me</span>
                        </label>
                      </div>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body pb-2">
      
                      <h6 class="mb-4">Application</h6>
      
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input" checked="">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">News and announcements</span>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">Weekly product updates</span>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="switcher">
                          <input type="checkbox" class="switcher-input" checked="">
                          <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                          </span>
                          <span class="switcher-label">Weekly blog digest</span>
                        </label>
                      </div>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
            </form>

            <a href="{{ route('applicant-dashboard') }}" class="btn btn-default">Cancel</a>
            <!-- <a type="button" class="btn btn-default"> -->
            <!-- <button type="button" class="btn btn-default">Cancel</button> -->
          </div>
      
        </div>
      </div>
@endsection