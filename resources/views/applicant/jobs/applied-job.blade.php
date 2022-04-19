@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/applied-jobs.css') }}" rel="stylesheet">
@endsection

@section('content')




  <!--careers section-->
  <section class="section-header">
  <div class="container">
    <div class="section-title">
      <h2>Recent Applications</h2>
     
    </div>

    <div class="job">
      <div class="row">
        @foreach($applications as $a)

        <div class="col-lg-12 mt-4">
          <!-- <div class="alert alert-primary" role="alert">
            Recent Applied Job
          </div> -->
          <div class="job-post d-flex align-items-start border border-primary" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{ asset('applicant/img/job.png') }}" class="img-fluid" alt=""></div>
            <div class="job-post-info">
              <h4>{{ $a->job->name }}</h4>
              @if($a->job->jobtype_id == 1)
              <span class="work-type">Teaching </span>
              @else
              <span class="work-type">Non Teaching</span>
              @endif
<br><br>

              <p>Description: {{ $a->job->description}}</p>

              <span class="work-type">Date applied: <span class="text-danger" >{{ $a->created_at->format('M d, Y')  }}</span></span><br><br>
              @if($a->application_status == 'released')

              <span class="work-type">Status: <span class="text-danger" >Inactive</span></span><br><br>
              @else
              <span class="work-type">Status: <span class="text-danger" >Active</span> </span><br><br>

              @endif
              <!-- <p>{{ $a->job->description}}</p> -->

              <!-- <a href="user-job-description.html" class="apply">View</a> -->
            </div>
          </div>
        </div>
        @endforeach
        
      </div> <!-- row -->
    </div>
  
        
        
  </div>
  
  <nav aria-label="...">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <span class="page-link">Previous</span>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item">
        <span class="page-link">
          2
          <span class="sr-only">(current)</span>
        </span>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
  
    
  </section>
@endsection