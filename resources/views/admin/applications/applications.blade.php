@extends('layouts.admin.app')
<!-- @section('styles')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection -->
@section('content')


@if($jobs->status == 'inactive')
<div class="alert alert-success mx-5" role="alert">
  This job is already closed!
</div>
@endif

<main class="content-wrapper">
          
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <div class="mdc-card">
                    <div class="d-flex justify-content-between align-items-center">
                      <h4 class="card-title mb-2 mb-sm-0">{{ $jobs->name}}</h4>
                      @if(count($apply) > 0)
                      <!-- <h1>{{ $apply }}</h1> -->
                      <div class="d-flex justtify-content-between align-items-center">
                        <a href="{{ route('application-process', $jobs->id) }}"><button class="mdc-button mdc-button--raised text-white" style="background-color: #F7B41E;">PROCEED TO APPLICATION PROCESS</button></a>
                      </div>
                      
                      @endif
                    </div>
                  </div>
                  <div class="table-responsive p-4">
                    <table class="table" id="applications-tbl">
                      <thead class="">
                        <tr>
                          <th class="text-left">ID</th>
                          <th class="text-center">FULL NAME</th>
                          <th class="text-center">DATE OF BIRTH</th>
                          <th class="text-center">CONTACT</th>
                          <th class="text-center">EMAIL</th>
                          <th class="text-center">JOB APPLIED</th>
                          <th class="text-center">DATE OF APPLICATION</th>
                          <th class="text-center">STATUS</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($apply as $a)
                        <tr>
                          <td class="text-left">{{ $a->user->id}}</td>
                          <td class="text-center">{{ $a->user->firstname}} {{ $a->user->middlename[0] }} {{ $a->user->lastname}}</td>
                          <td class="text-center">{{ $a->user->dateOfBirth}}</td>
                          <td class="text-center">{{ $a->user->contact}}</td>
                          <td class="text-center">{{ $a->user->email}}</td>
                          <td class="text-center">{{ $a->job->name}}</td>
                          <td class="text-center">{{ $a->date_applied }}</td>
                          <td class="text-center">{{ $a->application_status}}</td>
                          <td class="text-center"><a href="{{ route('view-applicants', $a->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
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