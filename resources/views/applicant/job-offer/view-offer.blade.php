@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/job offer.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row breads bg-white">
      <div class="col-lg-12" style="margin-left: 130px;">  
        <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('job-offer') }}">Job Offer</a></li>
          <li class="breadcrumb-item active" aria-current="page">Job Offer Details</li>
        </ol>
        </nav>
      </div>
    </div>
<!--sign up form-->
    <section id="apply">
      <div class="section-title">
        <h2>Job Offer</h2>
        <h4>{{ $offer->job->name}}</h4>
      </div>
      <div class="col-12 col-lg-3 ml-auto mr-auto mb-4">  
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active"></div>
            <div class="progress-step" ></div>
            <div class="progress-step" ></div>
          </div>
  
    </div>
  
        <!-- Steps -->
        
        <div class="form ">
          <div class="form-step form-step-active">
            <p class="subt text-center text-muted">Job Offer Letter</p>
            
              
              <div class="inner-form bg-white">
                  @php
                    $time = strtotime('{{ $offer->date }}');

                    $newformat = date('M d Y',$time);
                  @endphp
                  <img src="{{ asset('applicant/img/header.png') }}" class="img-fluid">
                  <p>{{ $newformat }}</p>
                    
                  <p>{{ $offer->user->firstname}} {{ $offer->user->middlename[0]}} {{ $offer->user->lastname}}<br>
                  {{ $offer->user->address->house_number}} {{ $offer->user->address->barangay}} {{ $offer->user->address->city}} <br>
                  {{ $offer->user->contact}}<br>
                  {{ $offer->user->email}}<br></p>
                  <p>Dear {{ $offer->user->firstname}},</p>
                  <p>
                  {{ $offer->message }}
  
                  </p>
                  
                  
  
                  <p>Best regards,</p>
                  <p>
                    <b>MARIA CECILIA L. PANGAN, PhD</b><br>
                    Director, Human Resource Management Office <br>
                    USTP CDO
  
                  </p>
                 
                  <p><i>cc: Office of the Vice Chancellor for Student Affairs Services
                   Guidance Office
                  </i></p>
  
               
  
                
              </div>
              <div class="btns-group">
                <a href="" id="declineOffer" class="btn btn-danger btn-decline">Decline</a>
                <a href="#" class="btn btn-next btn-accept">Accept</a>
            </div>       
          </div>
  
              
  
            <!--File table-->
            <div class="form-step">
              <p class="subt text-center text-muted">Pre-Emploment Documents Form</p>
              
              <div class="inner-form">
              <form action="{{ route('save-pre-emp', $user->id) }}" method="POST" enctype='multipart/form-data'>
                  @csrf
                  <p>To facilitate your employment with University of Science and Technology of Southern Philippines,
                    you are required to to submit the following documents/requirement on or before <b><u>May 14, 2021</u></b>
                  </p>

                  <div class="row mb-3 ">
                  <div class="col">
                    <div class="headings">DOCUMENTS</div>
                  </div>
                  <div class="col">
                    <div class="headings">FILE</div>
                  </div>
                  <div class="col">
                    <div class="headings">ACTION</div>
                  </div>
                </div>

                <hr>

                <div class="row file-row mb-5">
    <div class="col">
    Personal Data Sheet 3 Original (Notarized) - Long Bond Paper
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp1" type="file" name="pre-emp1" class="custom-file-input">
            @if($preEmpDocs[0])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[0]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck1" type="checkbox" name="skip[]" value="1" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck1">To follow</label>
        </div>

    </div>
</div>

<div class="row file-row mb-5">
    <div class="col">
        Clearance from Previous employer - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp2" type="file" name="pre-emp2" class="custom-file-input">
            @if($preEmpDocs[1])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[1]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck2" type="checkbox" name="skip[]" value="2" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck2">To follow</label>
        </div>

    </div>
</div>
<!-- 3 -->
<div class="row file-row mb-5">
    <div class="col">
        Original NSO Birth Certificate - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp3" type="file" name="pre-emp3" class="custom-file-input">
            @if($preEmpDocs[2])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[2]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck3" type="checkbox" name="skip[]" value="3" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck3">To follow</label>
        </div>

    </div>
</div>

<!-- 4 -->
<div class="row file-row mb-5">
    <div class="col">
        Marriage Certificate (if married) - 2 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp4" type="file" name="pre-emp4" class="custom-file-input">
            @if($preEmpDocs[3])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[3]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck4" type="checkbox" name="skip[]" value="4" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck4">To follow</label>
        </div>

    </div>
</div>

<!-- 5 -->
<div class="row file-row mb-5">
    <div class="col">
        Birth Certificate of children - 2 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp5" type="file" name="pre-emp5" class="custom-file-input">
            @if($preEmpDocs[4])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[4]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck5" type="checkbox" name="skip[]" value="5" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck5">To follow</label>
        </div>

    </div>
</div>

<!-- 6 -->
<div class="row file-row mb-5">
    <div class="col">
        2 Authenticated Copies of Transcript of Records
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp6" type="file" name="pre-emp6" class="custom-file-input">
            @if($preEmpDocs[5])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[5]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck6" type="checkbox" name="skip[]" value="6" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck6">To follow</label>
        </div>

    </div>
</div>

<!-- 7 -->
<div class="row file-row mb-5">
    <div class="col">
        2 Authenticated Copies of Diploma (College, Graduate School, Post-graduate)
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp7" type="file" name="pre-emp7" class="custom-file-input">
            @if($preEmpDocs[6])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[6]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck7" type="checkbox" name="skip[]" value="7" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck7">To follow</label>
        </div>

    </div>
</div>

<!-- 8 -->
<div class="row file-row mb-5">
    <div class="col">
        2 Authenticated Copies of Certificate of Eligibility (if applicable)
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp8" type="file" name="pre-emp8" class="custom-file-input">
            @if($preEmpDocs[7])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[7]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck8" type="checkbox" name="skip[]" value="8" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck8">To follow</label>
        </div>

    </div>
</div>

<!-- 9 -->
<div class="row file-row mb-5">
    <div class="col">
        2 Authenticated Copies of PRC ID (if applicable)
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp9" type="file" name="pre-emp9" class="custom-file-input">
            @if($preEmpDocs[8])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[8]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck9" type="checkbox" name="skip[]" value="9" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck9">To follow</label>
        </div>

    </div>
</div>

<!-- 10 -->
<div class="row file-row mb-5">
    <div class="col">
        Blood Test - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp10" type="file" name="pre-emp10" class="custom-file-input">
            @if($preEmpDocs[9])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[9]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck10" type="checkbox" name="skip[]" value="10" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck10">To follow</label>
        </div>

    </div>
</div>

<!-- 11 -->
<div class="row file-row mb-5">
    <div class="col">
        Urinalysis - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp11" type="file" name="pre-emp11" class="custom-file-input">
            @if($preEmpDocs[10])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[10]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck11" type="checkbox" name="skip[]" value="11" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck11">To follow</label>
        </div>

    </div>
</div>

<!-- 12 -->
<div class="row file-row mb-5">
    <div class="col">
        Chest X-ray - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp12" type="file" name="pre-emp12" class="custom-file-input">
            @if($preEmpDocs[11])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[11]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck12" type="checkbox" name="skip[]" value="12" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck12">To follow</label>
        </div>

    </div>
</div>

<!-- 13 -->
<div class="row file-row mb-5">
    <div class="col">
        Drug Test - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp13" type="file" name="pre-emp13" class="custom-file-input">
            @if($preEmpDocs[12])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[12]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck13" type="checkbox" name="skip[]" value="13" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck13">To follow</label>
        </div>

    </div>
</div>

<!-- 14 -->
<div class="row file-row mb-5">
    <div class="col">
        Neuropsychiatric Examination w/ Psychological Test 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp14" type="file" name="pre-emp14" class="custom-file-input">
            @if($preEmpDocs[13])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[13]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck14" type="checkbox" name="skip[]" value="14" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck14">To follow</label>
        </div>

    </div>
</div>

<!-- 15 -->
<div class="row file-row mb-5">
    <div class="col">
        NBI Clearance - 1 Original & 1 Photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp15" type="file" name="pre-emp15" class="custom-file-input">
            @if($preEmpDocs[14])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[14]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck15" type="checkbox" name="skip[]" value="15" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck15">To follow</label>
        </div>

    </div>
</div>

<!-- 16 -->
<div class="row file-row mb-5">
    <div class="col">
        Statement of Assets, Liabilities and Net Worth (SALN) - 3 Original (Notarized)
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp16" type="file" name="pre-emp16" class="custom-file-input">
            @if($preEmpDocs[15])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[15]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck16" type="checkbox" name="skip[]" value="16" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck16">To follow</label>
        </div>

    </div>
</div>

<!-- 17 -->
<div class="row file-row mb-5">
    <div class="col">
        BIR Form 1902 (Application for Registration) and Form 2305 - 2 Original (Downloadable)
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp17" type="file" name="pre-emp17" class="custom-file-input">
            @if($preEmpDocs[16])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[16]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck17" type="checkbox" name="skip[]" value="17" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck17">To follow</label>
        </div>

    </div>
</div>

<!-- 18 -->
<div class="row file-row mb-5">
    <div class="col">
        Pag Ibig Fund member’s Data Form (MDF) with Registration Tracking Number (RTN) - 1 Original & 1 photocopy
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp18" type="file" name="pre-emp18" class="custom-file-input">
            @if($preEmpDocs[17])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[17]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck18" type="checkbox" name="skip[]" value="18" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck18">To follow</label>
        </div>

    </div>
</div>

<!-- 19 -->
<div class="row file-row mb-5">
    <div class="col">
        Philhealth Number and Philhealth Membership Form with Philhealth Number - 2 Original
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp19" type="file" name="pre-emp19" class="custom-file-input">
            @if($preEmpDocs[18])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[18]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck19" type="checkbox" name="skip[]" value="19" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck19">To follow</label>
        </div>

    </div>
</div>

<!-- 20 -->
<div class="row file-row mb-5">
    <div class="col">
        Clearance from money, property and legal accountabilities from the previous office.
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp20" type="file" name="pre-emp20" class="custom-file-input">
            @if($preEmpDocs[19])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[19]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck20" type="checkbox" name="skip[]" value="20" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck20">To follow</label>
        </div>

    </div>
</div>

<!-- 21 -->
<div class="row file-row mb-5">
    <div class="col">
        Certified true copy of pre-audited disbursement voucher of last salary from previous agancy and/or <br>
        Certification by the Chief Accountant of last salary received from previous office duty verified by the assigned auditor thereat.
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp21" type="file" name="pre-emp21" class="custom-file-input">
            @if($preEmpDocs[20])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[20]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck21" type="checkbox" name="skip[]" value="21" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck21">To follow</label>
        </div>

    </div>
</div>

<!-- 22 -->
<div class="row file-row mb-5">
    <div class="col">
        Certified of Available Leave Credits
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp22" type="file" name="pre-emp22" class="custom-file-input">
            @if($preEmpDocs[21])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[21]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck22" type="checkbox" name="skip[]" value="22" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck22">To follow</label>
        </div>

    </div>
</div>

<!-- 23 -->
<div class="row file-row mb-5">
    <div class="col">
        Service Record
    </div>

    <div class="col"> 

        <div class="custom-file">
            <input id="pre-emp23" type="file" name="pre-emp23" class="custom-file-input">
            @if($preEmpDocs[22])
            <label for="logo" class="custom-file-label text-truncate">{{ $preEmpDocs[22]->file_path}}</label>
            @else
            <label for="logo" class="custom-file-label text-truncate">Choose file...</label>
            @endif

            

        </div>
    </div>

    <div class="col">

        <div class="card" style="padding: 6px;">
            <input id="skipCheck23" type="checkbox" name="skip[]" value="23" class="form-check-input ml-3">
            <label class="form-check-label ml-5" for="skipCheck23">To follow</label>
        </div>

    </div>
</div>

                  <button type="submit"  class="btn btn-success btn-block mt-5">Save</button>
                  </form>

                  <p class="noticed pt-3">Bring both the ORIGINAL and a corresponding PHOTOCOPY of all the documents stated above</p>
                    </div>
               <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                @if(count(array_filter($preEmpDocs)) == 23)
                <!-- {{ count($preEmpDocs)}} -->
                <a href="#" class="btn btn-next">Next</a>
                @else
                <a href="#" class="btn btn-next disabled" >Next</a>

                @endif
            </div>          
            </div>                      
  
  
                    <!--Data Privacy-->
          <div class="form-step ">
              <p class="subt text-center text-muted">Acknowledgement</p>
              <div class="inner-form bg-white">
  
                <p>
                  I hereby accept the job offer of The University of Science and Technology of Southern Philippines for the position of Guidance Counselor II under the Guidance Office and I will comply my pre-employment requirements stated above herein on or before <b><u>May 14, 2021.</u></b>
  
                 </p>
                
              </div>
              <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" id="acceptOffer" class="btn btn-next">Submit</a>
              </div>      
          <div class="form-step">
            <h1>Loadin is here</h1>
          <div class="spinner-border" role="status"><span class="sr-only"></span></div>
          </div>

          
  
</div>
     </section>

@endsection