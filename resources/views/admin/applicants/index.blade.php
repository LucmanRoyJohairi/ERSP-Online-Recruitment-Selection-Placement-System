
@extends('layouts.admin.app')

@section('content')
<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-desktop stretch-card">
                <div class="mdc-cardss col-12 bg-none">


                  <h2 class="mb-3 text-center">POOL OF APPLICANTS</h2>

                  
                        <!-- nav options -->
                      <div class="card-body bg-white text-primary  mailbox-widget pb-0">

                        <nav >
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ACTIVE</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">INACTIVE ( Hired )</a>
                          </div>
                        </nav>
                      <div>
                        <!-- content -->
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <div class="table-responsive mt-3">
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
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="table-responsive mt-3">
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
                          
                        </div>
                            
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection

