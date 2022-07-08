@extends('layouts.admin.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-white text-primary  mailbox-widget pb-0">
                  
                        <nav class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Issuance</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sent</a>
                          </div>
                        </nav>
                        
                </div>

                <!--interview-->
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="mdc-card">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-2 mb-sm-0" >Recently Hired</h4>
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
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="mdc-card">
                      <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-2 mb-sm-0" >Sent Issuances</h4>
                      </div>
                      <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span>{{ count($hired) }}</span></p>
                    </div>
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

