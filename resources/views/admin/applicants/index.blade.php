
@extends('layouts.admin.app')

@section('content')
<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-desktop stretch-card">
                <div class="mdc-cardss col-12 bg-none">


                  <h2 class="mb-3 text-center">POOL OF APPLICANTS</h2>

                  
                        <!-- nav options -->
                        <ul class="nav nav-pills nav-fill shadow-sm mb-3 " id="pills-tab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ACTIVE</a> </li>
                            <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">HIRED</a> </li>
                            
                        </ul> 
                        <!-- content -->
      
                            <div class="tab-content " id="pills-tabContent">
                                  <!-- 1st card -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                  <div class="table-responsive">
                                    <table class="table table-applicants">
                                      <thead class="bg-primary">
                                        <tr>
                                          <th class="text-left text-white">ID</th>
                                          <th class="text-white">FIRST NAME</th>
                                          <th class="text-white">LAST NAME</th>
                                          <th class="text-white">DATE OF BIRTH</th>
                                          <th class="text-white">CONTACT</th>
                                          <th class="text-white">EMAIL</th>
                                          <th class="text-white">JOB APPLIED</th>
                                          <th class="text-white">DATE OF APPLICATION</th>
                                          <th class="text-white"> STATUS</th>
                                          <th class="text-white">ACTION</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($applicants as $a)
                                      @if($a->applications)
                                        @if($a->applications->application_status != 'hired')

                                        <tr>
                                          <td class="text-left">{{$a->id}}</td>
                                          <td class="text-center">{{$a->firstname}} </td>
                                          <td class="text-center">{{$a->lastname}}</td>
                                          <td class="text-center">{{$a->dateOfBirth}}</td>
                                          <td class="text-center">{{$a->contact}}</td>
                                          <td class="text-center">{{$a->email}}</td>
                                          @if($a->applications)
                                          <td class="text-center">{{ $a->applications->job->name}}</td>
                                          <td class="text-center">{{ $a->applications->date_applied }}</td>
                                          @else
                                          <td class="text-center">N/A</td>
                                          <td class="text-center">N/A</td>
                                          @endif
                                          <!-- Change the class into form-control if you want the dropdown to be clean but no dropdown icon-->
                                          <td>Available</td>
                                          <td><a href="{{ route('view-applicants', $a->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                                        </tr>
                                        @endif

                                      @else

                                      <tr>
                                          <td class="text-left">{{$a->id}}</td>
                                          <td class="text-center">{{$a->firstname}} </td>
                                          <td class="text-center">{{$a->lastname}}</td>
                                          <td class="text-center">{{$a->dateOfBirth}}</td>
                                          <td class="text-center">{{$a->contact}}</td>
                                          <td class="text-center">{{$a->email}}</td>
                                          @if($a->applications)
                                          <td class="text-center">{{ $a->applications->job->name}}</td>
                                          <td class="text-center">{{ $a->applications->date_applied }}</td>
                                          @else
                                          <td class="text-center">N/A</td>
                                          <td class="text-center">N/A</td>
                                          @endif
                                          <!-- Change the class into form-control if you want the dropdown to be clean but no dropdown icon-->
                                          <td>Available</td>
                                          <td><a href="{{ route('view-applicants', $a->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                                        </tr>
                                      
                                      @endif
                                      @endforeach
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              
                              <!-- 2nd card -->

                                  <div class="tab-pane  fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="table-responsive">
                                      <table class="table ">
                                        <thead class="bg-primary">
                                          <tr>
                                            <th class="text-left text-white">ID</th>
                                            <th class="text-white">FIRST NAME</th>
                                            <th class="text-white">LAST NAME</th>
                                            <th class="text-white">DATE OF BIRTH</th>
                                            <th class="text-white">CONTACT</th>
                                            <th class="text-white">EMAIL</th>
                                            <th class="text-white">JOB APPLIED</th>
                                            <th class="text-white">DATE OF APPLICATION</th>
                                            <th class="text-white"> STATUS</th>
                                            <th class="text-white">ACTION</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applicants as $a)
                                      @if($a->applications)

                                        @if($a->applications->application_status == 'hired')
                                        <tr>
                                          <td class="text-left">{{$a->id}}</td>
                                          <td class="text-center">{{$a->firstname}} </td>
                                          <td class="text-center">{{$a->lastname}}</td>
                                          <td class="text-center">{{$a->dateOfBirth}}</td>
                                          <td class="text-center">{{$a->contact}}</td>
                                          <td class="text-center">{{$a->email}}</td>
                                          @if($a->applications)
                                          <td class="text-center">{{ $a->applications->job->name}}</td>
                                          <td class="text-center">{{ $a->applications->date_applied }}</td>
                                          @else
                                          <td class="text-center">N/A</td>
                                          <td class="text-center">N/A</td>
                                          @endif
                                          <!-- Change the class into form-control if you want the dropdown to be clean but no dropdown icon-->
                                          <td>{{ $a->applications->application_status == 'hired'}}</td>
                                          <td><a href="{{ route('view-applicants', $a->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                                        </tr>
                                        @endif
                                        @endif
                                        @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div> 
                          </div> <!--end tab content-->
                  

                

              
              
              
             
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection

