@extends('layouts.admin.app')
@section('styles')

<!--Bootstrap-->
<link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/material-design-icons/iconfont/material-icons.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }} ">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }} ">
  <link rel="stylesheet" href="{{ asset('admin/css/progress.css') }} ">
  <!-- Favicons -->
  <link href="{{ asset('admin/images/favicon/android-chrome-192x192.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/android-chrome-512x512.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/apple-touch-icon.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-16x16.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon-32x32.png') }} " rel="icon">
  <link href="{{ asset('admin/images/favicon/favicon.ico') }} " rel="icon">

@endsection

@section('content')

<main class="content-wrapper">
  
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <div class="mdc-card">
                    <div class="d-flex justify-content-between align-items-center">
                      <h4 class="card-title mb-2 mb-sm-0">Applicants Job Offer</h4>
                    <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span>{{ count($offers) }}</span></p>
                  </div>
                  </div>
                  <div class="table-responsive p-4">
                    <table class="table" id="job-offer-tbl">
                      <thead>
                        <tr>
                          <th class="text-left ">ID</th>
                          <th class="text-center">FULL NAME</th>
                          <th class="text-center">DOB</th>
                          <th class="text-center">CONTACT</th>
                          <th class="text-center">EMAIL</th>
                          <th class="text-center">JOB APPLIED</th>
                          <th class="text-center">DATE APPLIED</th>
                          <th class="text-center">RESPONSE</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($offers as $offer)
                        <tr>
                          <td class="text-left">{{ $offer->user->id}}</td>
                          <td class="text-center">{{ $offer->user->firstname }} {{ $offer->user->middlename[0] }} {{ $offer->user->lastname}}</td>
                          <td class="text-center">{{ $offer->user->dateOfBirth}}</td>
                          <td class="text-center">{{ $offer->user->contact}}</td>
                          <td class="text-center">{{ $offer->user->email}}</td>
                          <td class="text-center">{{ $offer->job->name}}</td>
                          <td class="text-center">{{ $offer->user->applications->created_at->format('M d, Y')}}</td>
                          <td class="text-center">{{ $offer->status}}</td>
                          <td class="text-center"><a href="{{ route('view-applicants', $offer->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>   
        </main>

@endsection