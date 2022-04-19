@extends('layouts.admin.app')

@section('content')

<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                  <div class="card-inner">
                    <h5 class="card-title">Jobs</h5>
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
                  <div class="mdc-card bg-primary text-white">
                    
                    <div class="d-flex justify-content-between">
                    <!-- @if($latest)
                      <h3 class="font-weight-normal">{{ strtoupper($latest->name) }}</h3>
                    @else
                    <h3 class="font-weight-normal">No job added</h3>
                    @endif -->

                    </div>
                    <div class="mdc-layout-grid__inner align-items-center">
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                        <div>
                          @if($latest)

                          <h5 class="font-weight-normal mt-2">{{ count($latest->applications) }} Applicants</h5>
                          <a href="pages/jobs/job-details.html"><button class="mdc-button mt-3 mdc-button--light">
                              View Job Details
                            </button>
                          </a>
                          
                          @else
                          <h5 class="font-weight-normal mt-2">Add a new job right now</h5>
                          <a href="pages/jobs/job-details.html"><button class="mdc-button mt-3 mdc-button--light">
                              Add new job
                            </button>
                          </a>
                          @endif
                        </div>
                      </div>
                    </div> <!--here -->

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
<!-- @section('script')


</script>
<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }} "></script>

  <script src="{{ asset('admin/vendors/chartjs/Chart.min.js') }} "></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap.min.js') }} "></script>
  <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }} "></script>

  <script src="{{ asset('admin/js/material.js') }} "></script>
  <script src="{{ asset('admin/js/misc.js') }} "></script>
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
@endsection
 -->
