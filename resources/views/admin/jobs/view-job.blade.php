@extends('layouts.admin.app')
@section('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection
@section('content')
<main class="content-wrapper">
            <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                    <div class="mdc-card">
                        <h6 class="card-title text-center text-primary" style="font-weight: 700;">{{ $job->name}}</h6>
                        <h6 class="text-center" style="margin-top: 10px;">Faculty - College of Engineering and Architecture</h6>
                        <h6 class="text-center" style="margin-top: 10px; font-weight: 400;">{{ $job->created_at->format('M d, Y')}}</h6>
                        <div class="d-flex justify-content-center">
                          <a href="../Admin-master/job-details.html"><button class="mdc-button mdc-button--raised" style="width: 100px; height: 100px; padding: 10px 16px; border-radius: 50px; font-size: 12px;text-align: center;">15 Applicants</button></a>
                        </div>
                    </div>
                  </div>
                  <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-desktop stretch-card">
                    <div class="mdc-card">
                        <div class="d-flex justify-content-end">
                        <a href="{{ route('edit-job', $job->id) }}" class="mdc-button mdc-button--raised filled-button--light text-primary float-right"><i class="fa fa-edit"></i>Edit</button></a>
                        </div>
                        <h6 class="card-title" style="font-weight: 700;">Job Description</h6>
                        <h6 style="margin-top: 10px;">{{ $job->description }}</h6>
                    </div>
                  </div>
                  <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-4-desktop stretch-card">
                    <div class="mdc-card">
                        <h6 class="card-title" style="font-weight: 700;">Additional Qualifications</h6>
                        <div class="d-flex justify-content-between">
                          <i class="fas fa-check-double" style="margin-top: 10px; margin-right: 10px; color: royalblue;"></i>
                          <h6 style="margin-top: 13px;">{{ $req->additional_qual}}</h6>
                        </div>
                    </div>
                  </div>
                  <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-desktop stretch-card">
                    <div class="mdc-card">
                        <h6 class="card-title" style="font-weight: 700;">Educational Qualifications</h6>
                        <div class="d-flex justify-content-start">
                          <i class="fas fa-check-double" style="margin-top: 10px; margin-right: 10px; color: royalblue;"></i>
                          <h6 style="margin-top: 13px;">{{ $req->education_qual}}</h6>
                        </div>
                        
                    </div>
                  </div>
                  <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-4-desktop stretch-card">
                    <div class="mdc-card">
                        <h6 class="card-title" style="font-weight: 700;">Experience Requirements</h6>
                        <div class="d-flex justify-content-start">
                          <i class="fas fa-check-double" style="margin-top: 10px; margin-right: 10px; color: royalblue;"></i>
                          <h6 style="margin-top: 13px;">{{ $req->experience_req}}</h6>
                        </div>
                        
                    </div>
                  </div>
                  <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-desktop stretch-card">
                    <div class="mdc-card">
                        <h6 class="card-title" style="font-weight: 700;">Documentary Requirements</h6>
                        <h6 style="margin-top: 10px;">1. Letter of Intent<br><br>
                        2. CSC Form 212, Revised 2017 (Personal Data Sheet) with ID picture taken within the last 6 months, 3.5cm x 4.5cm (passport size) and with full and handwritten name tag and signature overprinted name <br><br>
                        3. Curriculum Vitae <br><br>
                        4. Photosopy of Transcript of Records <br><br>
                        5. Photocopy of Diploma <br><br>
                        6. Certificatie fo the appropriate/required eligibility/licenses.<br><br>  
                        <div class="indent" style="margin-left: 20px;">
                            a. Photocopy of Professional Regulation Commission (PRC) professional ID card/certificate of registration/license and other eligibilities, if available <br><br>
                            b. Photocopy of ratings obtained in the Licensure Examination for teachers (LET)/Professional Board Examination for Teachers (PBET), if <available class="br"><br></available>
                        </div><br>
                        7. Photocopy from the authenticated copy of Diploma and TOR (authenticated by the school registrar)<br><br> 
                        8. Photocopy from the authenticated copy of unexpired PRC License / Board Rating / CS Eligibility <br><br>
                        9. Photocopy of Certificate of relevant trainings / seminars attended (if applicable) <br><br>
                        10. Photocopy of Certificate of Employment (if applicable) <br><br>
                        11. Individual Performance Commitment and Review (IPCR) / Performance Rating in the last 2 rating periods, if applicable <br>    
                        </h6>
                    </div>
                  </div>
                </div>
            </div>            
        </main>
@endsection