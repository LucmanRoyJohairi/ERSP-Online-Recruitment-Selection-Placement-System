@extends('layouts.admin.app')
@section('content')
<main class="content-wrapper">
          

          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <div class="mdc-card">
                    <div class="d-flex justify-content-between align-items-center">
                      <h4 class="card-title mb-2 mb-sm-0">Active Jobs</h4>
                      <div class="d-flex justtify-content-between align-items-center">
                        <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span>25</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table" id="manage-table">
                      <thead class="">
                        <tr>
                          <th class="text-left">JOB TITLE</th>
                          <th class="text-center">NO. OF APPLICANTS</th>
                          <th class="text-center">JOB TYPE</th>
                          <th class="text-center">DATE POSTED</th>
                          <th class="text-center">STATUS</th>
                          <th class="text-center">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($jobs as $j)
                        <tr>
                          <td class="text-left">{{$j->name}}</td>
                          <td class="text-center">{{ count($j->applications) }}</td>
                          @if($j->jobtype_id == 1)
                          <td class="text-center">Teaching Personnel</td>
                          @endif
                          @if($j->jobtype_id == 2)
                          <td class="text-center">Non Teaching Personnel</td>
                          @endif
                          <td class="text-center">{{ $j->created_at->diffForHumans() }}</td>
                          <td class="text-center">{{ $j->status }}</td>
                          
                          <td><a href="{{ route('view-job', $j->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
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