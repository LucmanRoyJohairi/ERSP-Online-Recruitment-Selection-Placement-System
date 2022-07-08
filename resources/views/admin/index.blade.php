@extends('layouts.admin.app')

@section('content')
<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Jobs</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">{{ count($jobs) }}</h1>

                    <div class="card-icon-wrapper">
                      <i class="material-icons">work</i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                  <div class="card-inner">
                    <h5 class="card-title">Applicants</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">{{ count($applicants) }}</h1>

                    <div class="card-icon-wrapper">
                      <i class="material-icons">supervisor_account</i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                  <div class="card-inner">
                    <h5 class="card-title">Job Offers</h5>
                    <h1 class="font-weight-light pb-2 mb-1 border-bottom">{{ count($joboffers) }}</h1>
                    <div class="card-icon-wrapper">
                      <i class="material-icons">description</i>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Atelast 2 or 3 lang ang makita na recently Jobs dani para dili sigeg scroll down si hr sa joblist -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                <div class="mdc-card">
                  <h2 class="card-title" style="margin-bottom: 20px;">Latest Job</h4>
                  <div class="card bg-primary text-light p-5 pb-4">

                      @if($latest)
                      <!-- <p>{{ $latest}}</p> -->
                      <div class="d-flex justify-content-between">
                        <h3 class="font-weight-normal">{{ $latest->name }}</h3>
                      </div>
                      <div class="mt-3">
                        <p> <i class="fa fa-users mr-1" aria-hidden="true"></i> <b>Applicants: </b> {{ count($latest->applications) }}</p>
                        <p><i class="fa fa-calendar mr-1"></i><b> Posted: </b>{{ $latest->created_at->diffForHumans()}}</p>
                        @if($latest->jobtype_id == 1)
                        <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Teaching</p>
                        @endif

                        @if($latest->jobtype_id == 2)
                        <p> <i class="fa fa-briefcase mr-1"></i> <b>Job Type: </b> Non-Teaching</p>
                        @endif
                      </div>
                      <a href="{{route('view-job', $latest->id)}}" ><button class="btn btn-light float-end">
                          Job Details
                        </button>
                      </a>
                      
                      @else
                      <h5 class="font-weight-normal mt-2">Add a new job right now</h5>
                      <a href="{{ route('add-jobs') }}"><button class="btn btn-secondary">
                          Add new job
                        </button>
                      </a>
                      @endif


                  </div>
                </div>
              </div>

              
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                <div class="mdc-card">
                  <div class="summary">
                    <div class="d-flex justify-content-between">
                      <h3 class="font-weight-normal">Applicants Summary</h3>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hoverable">
                        <tbody>
                          <tr>
                            <td class="text-left">Hired Applicants</td>
                            <td class="label">{{ count($hired) }}</td>
                          </tr>
                          <tr>
                            <td class="text-left">Active Applications</td>
                            <td class="label">{{ count($applications) }}</td>
                          </tr>
                          <!-- <tr>
                            <td class="text-left">Waiting for my Action</td>
                            <td class="label">0</td>
                          </tr> -->
                        </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="summary summary-2">
                    <div class="d-flex justify-content-between">
                      <h3 class="font-weight-normal">Offer to Hire</h3>
                      <div class="d-flex justtify-content-between align-items-center">
                        <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2"></p>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hoverable">
                        <tbody>
                          <tr>
                            <td class="text-left">Offers Pending</td>
                            <td class="label">{{ count($pendingOffers) }}</td>
                          </tr>
                          <tr>
                            <td class="text-left">Offers Accepted</td>
                            <td class="label">{{ count($acceptedOffers) }}</td>
                          </tr>
                          <tr>
                            <td class="text-left">Offers Declined</td>
                            <td class="label">{{ count($declinedOffers) }}</td>
                          </tr>
                        </tbody>
                    </table>
                    </div>
                  </div> 
                </div>
              </div>
             
             
            </div>
          </div>
        </main>

@endsection
