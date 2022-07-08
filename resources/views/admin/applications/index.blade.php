
@extends('layouts.admin.app')
@section('content')

<main class="content-wrapper">
    <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-desktop stretch-card">
        <div class="mdc-cardss bg-none">


            <h2 class="mb-3 text-center">JOB LISTS</h2>

            
                <!-- nav options -->
                <div class="card-body bg-white text-primary  mailbox-widget pb-0">

                    <nav class="card-body bg-white text-primary  mailbox-widget pb-0">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ACTIVE</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">INACTIVE</a>
                        </div>
                    </nav>
                </div>
                <!-- <ul class="nav nav-pills nav-fill shadow-sm mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ACTIVE JOBS</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">INACTIVE JOBS</a> </li>
                    
                </ul>  -->
                <!-- content -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                                <!-- foreach here -->
                                @foreach($jobs as $j)
                                @if($j->status == 'active')
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                                    <div class="card bg-white m-3">
                                        <div>
                                            <img src="{{ asset('admin/images/job_1.png') }}" class="herelng p-3 " style="width: 100%;max-height: 100%" />
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h3 class="font-weight-bold mt-2  pl-4 pt-3 pr-4">{{ $j->name }}</h3>
                                        </div>
                                        <!-- <div class="mdc-layout-grid__inner align-items-center pl-4 pb-4 "> -->
                                            <!-- <div class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone"> -->
                                                <div class="job-content pl-4 mb-5">
                                                    <p> <i class="fa fa-users mr-1" aria-hidden="true"></i> <b>Applicants: </b> {{ count($j->applications) }}</p>
                                                    @if($j->jobtype_id == 1)
                                                    <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Teaching</p>
                                                    @endif

                                                    @if($j->jobtype_id == 2)
                                                    <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Non-Teaching</p>
                                                    @endif
                                                    <p> <i class="fa fa-calendar mr-1"></i><b> Posted: </b>{{ $j->created_at->diffForHumans()}}</p>
                                                    
                                                    <p> <i class="fa fa-commenting mr-1"></i> <b>Status: </b> <span class="text-success font-weight-bold">{{ strtoupper($j->status)}}</span></p>
                                                    
                                                    
                                                    <a href="{{ route('view-job-applications', $j->id) }} "> <button class="btn btn-dark btn-block text-white mt-3 ">
                                                    Job Details
                                                    </button></a>
                                                </div>
                                                
                                            <!-- </div> -->
                                           
                                        <!-- </div> -->
                                    </div>
                                </div>
                                @else
                                <!-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> -->
                                <div class="mdc-layout-grid">
                                <div class="mdc-layout-grid__inner">
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-12-tablet">
                                        
                                        </div>
                                    
                                    </div>
                                </div>
                                <!-- </div>  -->
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="mdc-layout-grid">
                                      <div class="mdc-layout-grid__inner">
                                              <!-- foreach here -->
                                          @foreach($jobs as $j)
                                          @if($j->status == 'inactive')
                                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                                          <div class="card bg-white m-3">
                                        <div>
                                            <img src="{{ asset('admin/images/job_1.png') }}" class="herelng p-3 " style="width: 100%;max-height: 100%" />
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <h3 class="font-weight-bold mt-2  pl-4 pt-3 pr-4">{{ $j->name }}</h3>
                                        </div>
                                        <!-- <div class="mdc-layout-grid__inner align-items-center pl-4 pb-4 "> -->
                                            <!-- <div class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone"> -->
                                                <div class="job-content pl-4 mb-5">
                                                    <p> <i class="fa fa-users mr-1" aria-hidden="true"></i> <b>Applicants: </b> {{ count($j->applications) }}</p>
                                                    @if($j->jobtype_id == 1)
                                                    <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Teaching</p>
                                                    @endif

                                                    @if($j->jobtype_id == 2)
                                                    <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Non-Teaching</p>
                                                    @endif
                                                    <p> <i class="fa fa-calendar mr-1"></i><b> Posted: </b>{{ $j->created_at->diffForHumans()}}</p>
                                                    
                                                    <p> <i class="fa fa-commenting mr-1"></i> <b>Status: </b> <span class="text-danger font-weight-bold">{{ strtoupper($j->status)}}</span></p>
                                                    
                                                    
                                                    <a href="{{ route('view-job-applications', $j->id) }} "> <button class="btn btn-dark btn-block text-white mt-3 ">
                                                    Job Details
                                                    </button></a>
                                                </div>
                                                
                                            <!-- </div> -->
                                           
                                        <!-- </div> -->
                                    </div>
                                            </div>
                                            @else
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <div class="mdc-layout-grid">
                                                <div class="mdc-layout-grid__inner">
                                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mdc-layout-grid__cell--span-12-tablet">
                                                        
                                                        </div>
                                                    
                                                    </div>
                                            </div>
                                            </div> 

                                            @endif
                                            @endforeach
                                        </div>
                                  </div>
                    </div>
                    
                </div>

        </div>
        </div>
    </div>
    </div>
</main>

@endsection