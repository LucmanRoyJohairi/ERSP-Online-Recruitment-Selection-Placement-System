<!-- STEP2 -->
<fieldset>

<div class="container">

  <div class="row">
      <div class="col-md-12">
        <div class="alert alert-primary " role="alert">
          Notice: Please choose an applicant on who to send their respective interview & teaching demo details by clicking on the checkbox beside the applicant's id in the table. 
        </div>

          <div class="card">
              <div class="card-body bg-white text-primary  mailbox-widget pb-0">
                  <h2 class="pb-3">SCREENING DETAILS</h2>
                  <ul class="nav nav-tabs custom-tab border-bottom-0 mt-4" id="myTab" role="tablist">
                      <li class="nav-item ">
                          <a class="nav-link active" id="inbox-tab" data-toggle="tab" aria-controls="inbox" href="#inbox" role="tab" aria-selected="true">
                              <span class="d-block d-md-none"><i class="ti-email"></i></span>
                              <span class="d-none d-md-block text-primary font-weight-bold ">INTERVIEW DETAILS</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="sent-tab" data-toggle="tab" aria-controls="sent" href="#sent" role="tab" aria-selected="false">
                              <span class="d-block d-md-none"><i class="ti-export"></i></span>
                              @if($job->jobtype_id == 1)
                              <span class="d-none d-md-block text-primary font-weight-bold ">TEACHING DEMO DETAILS</span>
                              @else
                              <span class="d-none d-md-block text-primary font-weight-bold ">SKILL TEST DETAILS</span>
                              @endif
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
                  <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
      

                        <div class="content-in text-left">

                          <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Email</label>
                          <textarea id="interview-message"  class="form-control mb-3" id="exampleFormControlTextarea1" rows="5"></textarea>
                          
                          <button class="mdc-button mdc-button--raised" style="padding: 20px 20px;" id="interview-send">SEND</button>

                        </div>

                        <div class="table-responsive">
                          <table class="table">
                            <thead class="bg-primary">
                              <tr>
                                <th class="text-left text-white">ID</th>
                                <th class="text-white">FIRST NAME</th>
                                <th class="text-white">LAST NAME</th>
                                <th class="text-white">CONTACT</th>
                                <th class="text-white">EMAIL</th>
                                <th class="text-white">ACTION</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($shortlist as $s)
                            <tr>
                            <td class="text-left"> <input class="form-check-input" name="user-chk" type="checkbox" value="{{ $s->user->id }}" id="flexCheckDefault" style="margin-right: 20px;">{{ $s->user->id}}</td>
                            <td class="text-center">{{ $s->user->firstname }}
                            <td class="text-center">{{ $s->user->lastname }}</td>
                            <td class="text-center">{{ $s->user->contact }}</td>
                            <td class="text-center">{{ $s->user->email }}</td>
                            
                            <td><a href="{{ route('view-applicants', $s->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                          
                      
                  </div>
                  <!--teaching demo details// skill test-->
                  <div class="tab-pane fade" id="sent" aria-labelledby="sent-tab" role="tabpanel">
                    <div class="content-in text-left">

                      <label  for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Email</label>
                      @if($job->jobtype_id == 1)
                      <textarea id="teaching-demo-message" class="form-control mb-3" id="exampleFormControlTextarea1" rows="5"></textarea>
                      
                      <button class="mdc-button mdc-button--raised" style="padding: 20px 20px;" id="teaching-demo-send">SEND</button>
                      @else
                      <textarea id="skill-test-message" class="form-control mb-3" id="exampleFormControlTextarea1" rows="5"></textarea>

                      <button class="mdc-button mdc-button--raised" style="padding: 20px 20px;" id="skill-test-send">SEND</button>
                      

                      @endif
                    </div>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-primary">
                          <tr>
                            <th class="text-left text-white">ID</th>
                            <th class="text-white">FIRST NAME</th>
                            <th class="text-white">LAST NAME</th>
                            <th class="text-white">CONTACT</th>
                            <th class="text-white">EMAIL</th>
                            <th class="text-white">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($shortlist as $s)
                        <tr>
                        <td class="text-left"> <input class="form-check-input" name="user-chk" type="checkbox" value="{{ $s->user->id }}" id="flexCheckDefault" style="margin-right: 20px;">{{ $s->user->id}}</td>
                        <td class="text-center">{{ $s->user->firstname }}
                        <td class="text-center">{{ $s->user->lastname }}</td>
                        <td class="text-center">{{ $s->user->contact }}</td>
                        <td class="text-center">{{ $s->user->email }}</td>
                        
                        <td><a href="{{ route('view-applicants', $s->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!--sent-->
                  <div class="tab-pane fade" id="spam" aria-labelledby="spam-tab" role="tabpanel">
                    <div class="container mt-3">
                      <h5 class="text-left" >INTERVIEW DETAILS SENT</h5>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-primary">
                          <tr>
                            <th class="text-left text-white">ID</th>
                            <th class="text-white">FIRST NAME</th>
                            <th class="text-white">LAST NAME</th>
                            <th class="text-white">CONTACT</th>
                            <th class="text-white">EMAIL</th>
                            <th class="text-white">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($screening as $s)
                          @if($s->screening_type == 'interview')
                          <tr>
                          <td class="text-left">{{ $s->user_id }}</td>
                          <td class="text-center">{{ $s->user->firstname }}
                          <td class="text-center">{{ $s->user->lastname }}</td>
                          <td class="text-center">{{ $s->user->contact }}</td>
                          <td class="text-center">{{ $s->user->email }}</td>
                        <td><a href="{{ route('view-applicants', $s->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>

                            
                          </tr>

                          @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    @if($job->jobtype_id == 1)
                    <h5 class="text-left mt-4" >TEACHING DEMO DETAILS SENT</h5>
                    @else
                    <h5 class="text-left mt-4" >SKILL TEST DETAILS SENT</h5>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-primary">
                          <tr>
                            <th class="text-left text-white">ID</th>
                            <th class="text-white">FIRST NAME</th>
                            <th class="text-white">LAST NAME</th>
                            <th class="text-white">CONTACT</th>
                            <th class="text-white">EMAIL</th>
                            <th class="text-white">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($screening as $s)
                          @if($job->jobtype_id == 1)

                            @if($s->screening_type == 'teaching-demo')
                            <tr>
                            <td class="text-left">{{ $s->user_id }}</td>
                            <td class="text-center">{{ $s->user->firstname }}
                            <td class="text-center">{{ $s->user->lastname }}</td>
                            <td class="text-center">{{ $s->user->contact }}</td>
                            <td class="text-center">{{ $s->user->email }}</td>
                            <td><a href="{{ route('view-applicants', $s->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>

                              
                            </tr>

                            @endif
                          @else
                          @if($s->screening_type == 'skill-test')
                            <tr>
                            <td class="text-left">{{ $s->user_id }}</td>
                            <td class="text-center">{{ $s->user->firstname }}
                            <td class="text-center">{{ $s->user->lastname }}</td>
                            <td class="text-center">{{ $s->user->contact }}</td>
                            <td class="text-center">{{ $s->user->email }}</td>
                            <td><a href="{{ route('view-applicants', $s->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>

                              
                            </tr>

                            @endif

                          @endif
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

<div class="container mt-2">

<div class="alert alert-danger mt-4" role="alert">
  Notice: Please double check if the applicants have finished their screening process before proceeding to the next step. The screening process 
  consists of: interview, teaching demo & reference background check. 
</div>

<div class="card">
  <div class="credentials mt-4" style="margin-left:10px;">
    <h5 class="card-title text-primary" style="font-weight: 700; font-size: 20px;">SCREENING PROGRESS</h5> 
    <div id="checkBoxList" class="text-left pb-3">
      <input type="checkbox" class="checklists" name="checkme"/> Interview<br>
      <input type="checkbox"  class="checklists" name="checkme"/> Teaching Demo<br>
      <input type="checkbox"  class="checklists" name="checkme"/> Reference Background Check<br>
    </div>
  
  </div>
</div>



</div>



<!-- <input type="button" name="sendNewSms" class="inputButton  next action-button btn btn-primary" disabled="disabled" id="sendNewSms" value="RATE APPLICANTS " /> -->
<button name="sendNewSms" class="inputButton  next action-button btn btn-primary" disabled="disabled" id="sendNewSms" value="RATE APPLICANTS ">Rate applicants</button>
 
        
 </fieldset>
<!-- ENDSTEP2 -->