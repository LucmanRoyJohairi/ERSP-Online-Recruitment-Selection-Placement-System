@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/job-description.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">

    <div class="row breads">
      <div class="col-lg-12 ">  
        <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Careers</a></li>
         
          <li class="breadcrumb-item active" aria-current="page">Job Details</li>
        </ol>
        </nav>
      </div>
    </div>
    @if(count($docs) != 12)
    <div class="alert alert-warning mt-5" role="alert">
      Your need to upload all of your required documents before you can apply to any job.
    </div>
    @endif
    @if($application)
        @if($application->job_id == $job->id)

        <div class="alert alert-success mt-5" role="alert">
        You have already applied for this job. You will receive a notification about you application progress.
        </div>

        @else
        <div class="alert alert-primary mt-5" role="alert">
        You currently have an active application. You are currently not allowed to apply to any more jobs!
        </div>
        @endif
    @endif
    <div class="row justify-content-center text-center p-2">
        <div class="mt-4 col-12 p-4 job-title bg-white">
            <h3>{{ strtoupper($job->name)}}</h5>
            <!-- <h6>Faculty - College of Engineering and Architecture</h6> -->
            <span class="text-muted">Posted on {{ $job->created_at->format('M d, Y')}}</span>
            <div class="d-flex desc justify-content-center">    
            
            @if(count($docs) != 12)
            <button type="button" class="btn btn-secondary mt-3">Apply Now</button>

            @elseif(!$application)
            <a href="{{ route('apply-career', $job->id) }} "><button type="button" class="btn  d-block mt-3 btns btn-sm">Apply Now</button></a>
           
            @else
            <button type="button" class="btn btn-secondary mt-3">Apply Now</button>

            @endif
            </div>
          
        </div>
    </div>
    
    <div class="row justify-content-center text-center p-2">
        <div class="mt-2 col-12 shadow p-4 job-item bg-white text-left">
          
           

           <div class="job-section">
            <div class="title">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>Educational Qualifications
            </div>
            <div class="jdesc">
                {{ $req->education_qual }}
                   
            </div>
           </div>

           <div class="job-section">
            <div class="title">
                <i class="fa  fa-plus-circle
                " aria-hidden="true"></i>Additional Qualifications
            </div>
            <div class="jdesc">
            {{ $req->additional_qual }}
                  
            </div>
           </div>

           <div class="job-section">
            <div class="title">
                <i class="fa fa-briefcase" aria-hidden="true"></i>Experience Requirement
            </div>
            <div class="jdesc">
            {{ $req->experience_req }}
                
                   
            </div>
           </div>

           <div class="job-section">
            <div class="title">
                <i class="fa fa-file-text" aria-hidden="true"></i>Documentary Requirements
            </div>
            
            <div class="jdesc">
                
                   <ol>
                    <li>Letter of Intent
                    </li>
                    <li>CSC Form 212, Revised 2017 (Personal Data Sheet) with ID picture taken within the last 6 months, 3.5cm x 4.5cm (passport size) and with full and handwritten name tag and signature overprinted name</li>
                    <li>Curriculum Vitae</li>
                    <li>Photocopy of Transcript of Records </li>
                    <li>Photocopy of Diploma</li>
                   
                      <li>
                        Photocopy from the authenticated copy of Diploma and TOR (authenticated by the school registrar)
                      </li>
                      <li>
                        Photocopy from the authenticated copy of unexpired PRC License / Board Rating / CS Eligibility
                      </li>
                      <li>
                        Photocopy of Certificate of relevant trainings / seminars attended (if applicable)
                      </li>
                      <li>
                        Photocopy of Certificate of Employment (if applicable)
                      </li>
                      <li>
                        Individual Performance Commitment and Review (IPCR) / Performance Rating in the last 2 rating periods, if applicables
                      </li>
                      </ol>
                      <h6 style="font-weight: 600;">Certificate for the approriate/required eligibility/licenses</h6>
                      <ol>
                        <li>Photocopy of Professional Regulation Commission (PRC) professional ID card/certificate of registration/license and other eligibilities, if available</li>
                         <li> Photocopy of ratings obtained in the Licensure Examination for teachers (LET)/Professional Board Examination for Teachers (PBET), if available.
                         </li>
                       </ol>
            
            
                  </div>
           </div>

        </div>

        
    </div>

    
</div>
@endsection
