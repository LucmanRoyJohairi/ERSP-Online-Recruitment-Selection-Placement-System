@extends('layouts.admin.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-white text-primary  mailbox-widget pb-0">
                    <!-- <h2 class="pb-3">Send Issuance Of Appointment</h2> -->
                    <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                                <span class="d-block d-md-none"><i class="ti-email"></i></span>
                                <span class="d-none d-md-block text-primary font-weight-bold ">ISSUANCE OF APPOINTMENT</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="spam-tab" data-toggle="tab" aria-controls="spam" href="#spam" role="tab" aria-selected="false">
                                <span class="d-block d-md-none"><i class="ti-panel"></i></span>
                                <span class="d-none d-md-block text-primary font-weight-bold ">SENT</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>

                <!--interview-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show " id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                      
                      
                                  <div class="mdc-card">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title mb-2 mb-sm-0" >Send Issuance of Appointment</h4>
                                    </div>
                                    <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span>{{ count($hired) }}</span></p>
                                  </div>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead class="">
                                        <tr>
                                          <th class="text-left">ID</th>
                                          <th class="text-center">FULL NAME</th>
                                          <th class="text-center">JOB APPLIED</th>
                                          <th class="text-center">DATE APPLIED</th>
                                          <th class="text-center">STATUS</th>
                                          <th class="text-center">ACTION</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($hired as $h)
                                      <tr>  
                                        <td class="text-left">{{ $h->user->id }}</td>
                                        <td class="text-center">{{ $h->user->firstname }} {{ $h->user->middlename[0] }} {{ $h->user->lastname }}</td>
                                        <td class="text-center">{{ $h->job->name }}</td>
                                        <td class="text-center">{{ $h->date_applied }}</td>
                                        <td class="text-center">{{ $h->application_status }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('send-issuance', $h->user->id) }}" method="post">
                                            @csrf
                                            @if($h->user->issuance)

                                              <input type="text" id="appt" name="drive_link" value="{{ $h->user->issuance->link }}" class="w-50">
                                            @else
                                              <input type="text" id="appt" name="drive_link" placeholder="Paste Drive Link here">
                                            @endif
                                            <button type="submit" class="mdc-button mdc-button--raised" style="padding: 13px;">SEND</button>
                                            </form>
                                      
                                          
                                        </td>
                                      </tr>
                                      @endforeach
                                        
                                      </tbody>
                                    </table>
                                  </div>
                        
                    </div>
                    <!--END  ISSUANCE OF APPOINTMENT-->

                    <!--ISSUANCE DETAILS SENT-->
                    <!--SENT-->
                    <div class="tab-pane fade" id="spam" aria-labelledby="spam-tab" role="tabpanel">
                      <div class="container mt-3">
                        <h5 class="text-left " >ISSUANCE DETAILS SENT</h5>
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="">
                            <tr>
                              <th class="text-left">ID</th>
                              <th class="text-center">FIRST NAME</th>
                              <th class="text-center">LAST NAME</th>
                              <th class="text-center">CONTACT</th>
                              <th class="text-center">EMAIL</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($issuanceSent as $s)
                          <tr>  
                            <td class="text-left">{{ $s->user->id }}</td>
                            <td class="text-center">{{ $s->user->firstname }} {{ $s->user->middlename[0] }} {{ $s->user->lastname }}</td>
                            <td class="text-center">{{ $s->user->lastname }}</td>
                            <td class="text-center">{{ $s->user->contact }}</td>
                            <td class="text-center">{{ $s->user->email }}</td>
                              
                          </tr>

                          @endforeach
                          
                          </tbody>
                        </table>
                      </div>
                      
                      
                      </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection

