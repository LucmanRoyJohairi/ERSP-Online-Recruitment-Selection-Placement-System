<!-- STEP4 -->
<fieldset>
    <div class="form-card">
        <div class="justify-content-end">
        <h2 class="steps">Step 4 - 6</h2>
        </div>
        <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-4-desktop stretch-card">
            <div class="mdc-card">
                <h5 class="card-title text-primary" style="font-weight: 700; font-size: 25px;">Ranked Applicants</h5> 
                <h6>Select Applicants you want to send Job Offer:</h6> 
                    @php
                    $i = 0;
                    $idList = [];

                    @endphp
                    @foreach($toRank as $s)
                    <div class="form-check">
                        @php
                            
                            array_push($idList, $s->user->id);
                        
                        @endphp
                        <input class="form-check-input" type="checkbox" value="{{ $s->user->id }}" name="applicant-{{ $s->user->id }}" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header text-white bg-primary" style="font-weight: 700;">Rank {{ $s->rating->rank}}</div>
                            <div class="card-body text-primary">
                                <h5 class="card-title">{{ $s->user->firstname}} {{ $s->user->middlename[0] }} {{ $s->user->lastname }}</h5>
                                <div class="d-flex justify-content-start">
                                <!-- <i class="fas fa-briefcase"></i> -->
                                <p class="card-text" style="margin-left: 5px;">Score: {{ $s->rating->score}}</p>
                                </div>
                                <!-- <div class="d-flex justify-content-start">
                                <i class="fas fa-briefcase"></i>
                                <p class="card-text" style="margin-left: 5px;">IT Technical Support <span>(2015-2017)</span></p>
                                </div>
                                <div class="d-flex justify-content-start">
                                <i class="fas fa-graduation-cap"></i>
                                <p class="card-text" style="margin-left: 5px;">Bachelor's Degree of Information Technology(2014)</p> -->
                                <!-- </div>  -->
                            </div>
                            </div>
                        </label>
                    </div> <!-- form check -->
                    @endforeach
                    <input type="hidden" class="userID" value="{{ json_encode($idList) }}">

                </div>
            </div>
            <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-desktop stretch-card">
                <div class="mdc-card">
                    <h5 class="card-title text-primary" style="font-weight: 700; font-size: 25px;">Send Job Offer</h5>  

                    <!-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Salutation</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div> -->

                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Letter Body</label>
                    <textarea class="form-control" id="messageBody" rows="10"></textarea>
                    </div>
                    
                    <!-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Closing</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div> -->

                    <!-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Signature</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div> -->
                    <div class="d-flex justify-content-center">
                    <!-- <button class="mdc-button mdc-button--raised" style="padding: 10px 20px 10px 20px; font-size: 15px;  
                    margin-top: 20px; margin-right:20px; background-color: #F7B41E;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">PREVIEW</button> -->

                    <button id="joboffer-click" class="mdc-button mdc-button--raised" style="padding: 10px 20px 10px 20px; font-size: 15px;  
                    margin-top: 20px; margin-right:20px; background-color: #F7B41E;" >SEND JOB OFFER</button>

                    </div>
                    <!-- <button id="joboffer-click">click</button> -->
                    
                </div>
            
            </div>
            <!-- job offer table -->
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <h5 class="card-title text-primary" style="font-weight: 700; font-size: 25px;">Offers Sent</h5>  
                    
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="">
                        <tr>
                            <th class="text-left">ID</th>
                            <th class="text-center">FIRST NAME</th>
                            <th class="text-center">LAST NAME</th>
                            <th class="text-center">CONTACT</th>
                            <th class="text-center">EMAIL</th>
                            <th class="text-center"> STATUS</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $o)
                        <tr>
                            <td class="text-left">1</td>
                            <td class="text-center">{{ $o->user->firstname }}
                            <td class="text-center">{{ $o->user->lastname }}</td>
                            <td class="text-center">{{ $o->user->contact }}</td>
                            <td class="text-center">{{ $o->user->email }}</td>
                            <td class="text-center">{{ $o->status }}</td>
                            <td class="text-center"><a href="{{ route('view-applicants', $o->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </div>    
        
        <!-- </div> <input type="button" name="next" class="next action-button" value="ONBOARDING" /> -->

        <button type="button" name="next" class="next action-button" >onboarding</button>

</fieldset>
<!-- ENDSTEP4 -->