@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/careers.css') }}" rel="stylesheet">
@endsection

@section('content')

 <!--careers section-->
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

    @if($application and $application->application_status != 'released' and $application->application_status != 'hired')
    <div class="alert alert-primary mb-5" role="alert">
      You currently have an active application. You are currently not allowed to apply to any more jobs!
    </div>
    @endif

    @if($application and $application->application_status == 'hired')
    <div class="alert alert-success mb-5" role="alert">
      You are already hired for a job. You can't apply to any more jobs.
    </div>
    @endif

    @if(count($docs) != 12)
    <div class="alert alert-warning mb-5" role="alert">
      Your need to upload all of your required documents before you can apply to any job.
    </div>
    @endif


    <div class="section-title">
      <h2>Latest Job Post</h2>
     
    </div>
    
    <div class="search-sec">
      <div class="container">
          <form action="#" method="post" novalidate="novalidate">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                          <select class="form-control search-slt" id="exampleFormControlSelect1">
                              <option>Teaching</option>
                              <option>Non-Teaching</option>     
                          </select>
                      </div>
                      <form action="{{ route('search-job') }}" method="post"></form>
                      @csrf
                          <div class="col-lg-7 col-md-3 col-sm-12 p-0">
                              <input id="job-search" name="job_search" type="text" class="form-control search-slt" placeholder="Enter Job Keyword/Title">
                          </div>
                          <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                              <button type="submit" class="btn wrn-btn">Search</button>
                          </div>
                      </form>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </div>

    <div class="job">
      <div class="row">
      @foreach($jobs as $j)
      <!-- $application->job_id == $j->id -->
      @if($application)
          @if($application->job_id == $j->id and $application->application_status != 'released')
          <div class="col-lg-12 mb-5">
            <div class="job-post d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{ asset('applicant/img/job.png') }}" class="img-fluid" alt=""></div>
              <div class="job-post-info">
                <h4>{{ $j->name }}</h4>
                @if($j->id == 1)
                <span class="work-type">Teaching</span>
                @endif
                @if($j->id == 2)
                <span class="work-type">Non Teaching</span>
                @endif
                <span class="status">{{ $j->created_at->diffForHumans() }}</span>
                <p class="job-desc">{{ $j->description}}</p> 
                @if(!$application)
                <a href="{{ route('view-career', $j->id) }}" class="apply">View Job</a>
                @elseif($application->job_id == $j->id)
                <a href="{{ route('view-career', $j->id) }}" class="btn btn-success">APPLIED</a>
                @else
                <button class="btn btn-secondary"type="submit">Apply</button>

                @endif

              </div>
            </div>
          </div>
          @elseif($application->job_id != $j->id)
           <!-- here -->
          <div class="col-lg-6 mb-5">
            <div class="job-post d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{ asset('applicant/img/job.png') }}" class="img-fluid" alt=""></div>
              <div class="job-post-info">
                <h4>{{ $j->name }}</h4>
                @if($j->id == 1)
                <span class="work-type">Teaching</span>
                @endif
                @if($j->id == 2)
                <span class="work-type">Non Teaching</span>
                @endif
                <span class="status">{{ $j->created_at->diffForHumans() }}</span>
                <p class="job-desc">{{ $j->description}}</p> 
                <a href="{{ route('view-career', $j->id) }}" class="apply">View job</a>
                


              </div>
            </div>
          </div>
          @endif
        @else

        <div class="col-lg-6 mb-5">
          <div class="job-post d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="pic"><img src="{{ asset('applicant/img/job.png') }}" class="img-fluid" alt=""></div>
            <div class="job-post-info">
              <h4>{{ $j->name }}</h4>
              @if($j->id == 1)
              <span class="work-type">Teaching</span>
              @endif
              @if($j->id == 2)
              <span class="work-type">Non Teaching</span>
              @endif
              <span class="status">{{ $j->created_at->diffForHumans() }}</span>
              <p class="job-desc">{{ $j->description}}</p> 
              @if(!$application)
              <a href="{{ route('view-career', $j->id) }}" class="apply">View Job</a>
              @elseif($application->job_id == $j->id)
              <button class="btn btn-secondary"type="submit">Applied</button>
              @else
              <button class="btn btn-secondary"type="submit">Apply</button>

              @endif

            </div>
          </div>
        </div>
        @endif
        @endforeach

        
      </div>
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