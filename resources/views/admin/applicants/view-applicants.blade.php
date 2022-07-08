@extends('layouts.admin.app')

@section('content')
<main class="content-wrapper">
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-desktop stretch-card">
              <div class="mdc-card bg-primary">
                <div class="d-flex justtify-content-between align-items-center">
                  <!-- <a href="{{ route('admin-dashboard') }}"><button class="btn btn-light" style="padding:10px 15px 10px 15px;">Back</button></a> -->
                  <!-- Dapat ang back button is mag back siya sa last niya na gi open -->
                </div>
                <!-- <h6 class="card-title text-white text-center">{{ $applicant->firstname}} {{ $applicant->middlename}} {{ $applicant->lastname}}</h6> -->
              </div>
            </div>
            <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-desktop stretch-card">
              <!-- <div class="mdc-card">
                <div class="container">                      
                  <div class="row text-center justify-content-center mb-5">
                      <div class="col-xl-6 col-lg-8">
                          <h2 class="font-weight-bold">Application Timeline</h2>
                      </div>
                  </div>
              
                  <div class="row">
                      <div class="col">
                          <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                              <div class="timeline-step">
                                  <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                      <div class="inner-circle"></div>
                                      <p class="h6 mt-3 mb-1">09/10/2021</p>
                                      <p class="h6 text-muted mb-0 mb-lg-0">Shortlist</p>
                                  </div>
                              </div>
                              <div class="timeline-step">
                                  <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                      <div class="inner-circle"></div>
                                      <p class="h6 mt-3 mb-1">09/20/2021</p>
                                      <p class="h6 text-muted mb-0 mb-lg-0">Interview</p>
                                  </div>
                              </div>
                              <div class="timeline-step">
                                  <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                                      <div class="inner-circle"></div>
                                      <p class="h6 mt-3 mb-1">10/13/2021</p>
                                      <p class="h6 text-muted mb-0 mb-lg-0">Rating</p>
                                  </div>
                              </div>
                              <div class="timeline-step">
                                  <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                                      <div class="inner-circle"></div>
                                      <p class="h6 mt-3 mb-1">10/14/2021</p>
                                      <p class="h6 text-muted mb-0 mb-lg-0">Ranking</p>
                                  </div>
                              </div>
                              <div class="timeline-step mb-0">
                                  <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                                      <div class="inner-circle"></div>
                                      <p class="h6 mt-3 mb-1">11/1/2021</p>
                                      <p class="h6 text-muted mb-0 mb-lg-0">Onboarding</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div> -->
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0 text-primary">Personal Information</h6>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Full Name</td>
                        <td>{{ $applicant->firstname}} {{ $applicant->middlename}} {{ $applicant->lastname}}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Email Address</td>
                        <td>{{ $applicant->email }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Phone Number</td>
                        <td>{{ $applicant->contact }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Birthday</td>
                        <td>{{ $applicant->dateOfBirth}}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Home Address</td>
                        <td>{{ $address->house_number }} {{ $address->barangay }} {{ $address->city }} {{ $address->province }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0 text-primary">Educational Background</h6>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Eligibility</td>
                        <td>@foreach($eligibility as $eli)
                                {{ $eli->eligibility_name }}

                              @endforeach</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">School</td>
                        <td>{{ $education->school }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Course</td>
                        <td>{{ $course->course_name }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Highest Educational Attainment</td>
                        <td>{{ $quali->qualification_name}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0 text-primary">Work Experience</h6>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Recent Job Title</td>
                        <td>{{ $experience->job_title }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Recent Company / Job Agency</td>
                        <td>{{ $experience->company }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Inclusive Dates of Recent Work Experience: (FROM)</td>
                        <td>{{ $experience->date_started }}</td>
                      </tr>
                      <tr>
                        <td class="text-left" style="font-weight: 700;">Inclusive Dates of Recent Work Experience: (TO)</td>
                        <td>{{ $experience->date_ended }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Attachment -->
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0 text-primary">Attachments</h6>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-left text-primary">Documentary Requirements</th>
                        <th class="text-center text-primary">File</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-left">Letter of Intent</td>
                        @if($req[0])
                        <td><a href="{{ $req[0]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-left">CSC Form 212, Revised 2017 (Personal Data Sheet) with ID picture taken within the last 6 months,<br>
                           3.5cm x 4.5cm (passport size) and with full and handwritten name tag and signature overprinted name</td>
                           @if($req[1])
                        <td><a href="{{ $req[1]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-left">Curriculum Vitae</td>
                        @if($req[2])
                        <td><a href="{{ $req[2]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-left">Photocopy of Transcript of Records</td>
                        @if($req[3])
                        <td><a href="{{ $req[3]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left">Photocopy of Diploma</td>
                        @if($req[4])
                        <td><a href="{{ $req[4]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left text-primary" style="font-weight: 500;">Certificate for the appropriate/required eligibility/licenses</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td class="text-left" style="padding-left: 50px;">Photocopy of Professional Regulation Commission (PRC) professional ID card/certificate of <br> 
                          registration/license and other eligibilities, if available</td>
                          @if($req[5])
                        <td><a href="{{ $req[5]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left" style="padding-left: 50px;">Photocopy of ratings obtained in the Licensure Examination for teachers (LET) <br>
                          /Professional Board Examination for Teachers (PBET), if available.</td>
                          @if($req[6])
                        <td><a href="{{ $req[6]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left">Photocopy from the authenticated copy of Diploma and TOR (authenticated by the school registrar)</td>
                        @if($req[7])
                        <td><a href="{{ $req[7]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left">Photocopy from the authenticated copy of unexpired PRC License / Board Rating / CS Eligibility</td>
                        @if($req[8])
                        <td><a href="{{ $req[8]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                      <tr>
                        <td class="text-left">Photocopy of Certificate of relevant trainings / seminars attended (if applicable)</td>
                        @if($req[9])
                        <td><a href="{{ $req[9]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-left">Photocopy of Certificate of Employment (if applicable)</td>
                        @if($req[10])
                        <td><a href="{{ $req[10]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-left">Individual Performance Commitment and Review (IPCR) / Performance Rating in the last 2 rating periods, if applicable</td>
                        @if($req[11])
                        <td><a href="{{ $req[11]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif

                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- attachment -->


            <!-- pre-emp -->
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-card p-0">
                    <h6 class="card-title card-padding pb-0 text-primary">Pre-Employment Documents</h6>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-left text-primary">Pre-Employment Documents</th>
                            <th class="text-center text-primary">File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-left" style="font-weight: 700;">A. Personal Documents</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="text-left">Personal Data Sheet 3 Original (Notarized) - Long Bond Paper</td>
                             @if($preEmpDocs[0] && $preEmpDocs[0]->file_path != 'to follow up')
                             <p> {{ $preEmpDocs[0]->file_path}}</p>
                             <td><a href="{{ $preEmpDocs[0]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Clearance from Previous employer - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[1] && $preEmpDocs[1]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[1]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Original NSO Birth Certificate - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[2] && $preEmpDocs[2]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[2]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Marriage Certificate (if married) - 2 Photocopy</td>
                             @if($preEmpDocs[3] && $preEmpDocs[3]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[3]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Virth Certificate of children - 2 Photocopy</td>
                             @if($preEmpDocs[4] && $preEmpDocs[4]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[4]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left" style="font-weight: 700;">B. Educational Documents</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="text-left">2 Authenticated Copies of Transcript of Records</td>
                             @if($preEmpDocs[5] && $preEmpDocs[5]->file_path != 'to follow up')
                            <td><a href="{{ $preEmpDocs[5]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                            @else
                            <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                            @endif
                          </tr>
                          <tr>
                            <td class="text-left">2 Authenticated Copies of Diploma (College, Graduate School, Post-graduate)</td>
                             @if($preEmpDocs[6] && $preEmpDocs[6]->file_path != 'to follow up')
                            <td><a href="{{ $preEmpDocs[6]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                            @else
                            <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                            @endif
                          </tr>
                          <tr>
                            <td class="text-left">2 Authenticated Copies of Certificate of Eligibility (if applicable)</td>
                             @if($preEmpDocs[7] && $preEmpDocs[7]->file_path != 'to follow up')
                        <td><a href="{{ $preEmpDocs[7]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                        @else
                        <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                        @endif
                          </tr>
                          <tr>
                            <td class="text-left">2 Authenticated Copies of PRC ID (if applicable)</td>
                             @if($preEmpDocs[8] && $preEmpDocs[8]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[8]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left" style="font-weight: 700;">C. Government Documents</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="text-left">Medical Certificate for pre-employment as per CSC form NO. 211 with documentary stamp and the following Medical Test results - 2 Original:</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="text-left">a. Blood Test - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[9] && $preEmpDocs[9]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[9]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">b. Urinalysis - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[10] && $preEmpDocs[10]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[10]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">c. Chest X-ray - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[11] && $preEmpDocs[11]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[11]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">d. Drug Test - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[12] && $preEmpDocs[12]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[12]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">e. Neuropsychiatric Examination w/ Pyschological Test 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[13] && $preEmpDocs[13]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[13]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">NBI Clearance - 1 Original & 1 Photocopy</td>
                             @if($preEmpDocs[14] && $preEmpDocs[14]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[14]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Statement of Assets, Liabilities and Net Worth (SALN) - 3 Original (Notarized)</td>
                             @if($preEmpDocs[15] && $preEmpDocs[15]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[15]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">BIR Form 1902 (Application for Refistration) and Form 2305 - 2 Original (Downloadable)</td>
                             @if($preEmpDocs[16] && $preEmpDocs[16]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[16]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Pag Ibig Fund member’s Data Form (MDF) with Registration Tracking Number (RTN) - 1 Original & 1 photocopy</td>
                             @if($preEmpDocs[17] && $preEmpDocs[17]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[17]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Philhealth Number and Philhealth Membership Form with Philhealth Number - 2 Original</td>
                             @if($preEmpDocs[18] && $preEmpDocs[18]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[18]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left" style="font-weight: 700;">D. Additional Requirements fro transferees (from one government office to another)</td>
                            <td></td>
                          </tr>
                          <tr>
                            <td class="text-left">Clearance from money, property and legal accountabilities from the previous office.</td>
                             @if($preEmpDocs[19] && $preEmpDocs[19]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[19]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Certified true copy of pre-audited disbursement voucher of last salary from previous agancy and/or <br>
                              Certification by the Chief Accountant of last salary received from previous office duty verified by the assigned auditor thereat.</td>
                             @if($preEmpDocs[20] && $preEmpDocs[20]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[20]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Certified of Available Leave Credits</td>
                             @if($preEmpDocs[21] && $preEmpDocs[21]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[21]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                          <tr>
                            <td class="text-left">Service Record</td>
                             @if($preEmpDocs[22] && $preEmpDocs[22]->file_path != 'to follow up')
                             <td><a href="{{ $preEmpDocs[22]->file_path }}" class="mdc-button mdc-button--raised">Download</a></td>
                             @else
                             <td><button class="mdc-button mdc-button--raised" disabled>Download</button></td>
                             @endif
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div><!-- attachment -->

          </div>
        </div>
      </main>
@endsection