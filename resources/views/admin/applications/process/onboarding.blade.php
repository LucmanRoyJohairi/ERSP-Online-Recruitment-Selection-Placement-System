<!-- STEP5 -->
<fieldset>
    <div class="form-card">
        <div class="justify-content-end">
            <h2 class="steps">Step 5 - 6</h2>
        </div>
        <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card">
                <h5 class="text-primary" style="font-size: 25px;">Onboarding - IT Technical Support</h5>
                <div class="d-flex justify-content-between align-items-center">
                    
                    </div> 

                    <div class="alert alert-danger" role="alert">
                    Notice: Please double check if the applicants have finished their onboarding process before proceeding to the next step. The onboarding process 
                        consists of: Oath taking and orientation. 
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
                            <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($onboard as $o)
                            <tr>
                            <!-- <td class="text-left"> <input class="form-check-input" name="user-chk" type="checkbox" value="{{ $o->user->id }}" id="flexCheckDefault" style="margin-right: 20px;">1</td> -->
                            <td class="text-center">{{ $o->user->id }}</td>
                            <td class="text-center">{{ $o->user->firstname }}</td>
                            <td class="text-center">{{ $o->user->lastname }}</td>
                            <td class="text-center">{{ $o->user->contact }}</td>
                            <td class="text-center">{{ $o->user->email }}</td>
                            
                            <td><a href="{{ route('view-applicants', $o->user->id) }}"><button class="mdc-button mdc-button--raised">View</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                        <div class="card" style="margin-top: 30px;">
                        
                            <div class="card-body">
                            <div class="credentials" style="margin-left:10px;">
                                <input class="checkboxhere" type="checkbox" id="f_agree" value="1" />Oath Taking <br>
                                <input class="checkboxhere" type="checkbox" id="f_agree2" value="1" />Orientation
                            
                            </div>
                        
                            
                        </div>
                        </div>   
                        
            </div>
        </div>
        </div>
        </div>
    </div> 
    <!-- <input type="button" name="sendNewSms2" class="inputButton  next action-button btn btn-primary" id="acceptbtn" value="Submit" /> -->
<button name="sendNewSms2" class="inputButton  next action-button btn btn-primary" id="acceptbtn" value="Submit">submit</button>
    
    
    
    <!-- <input type="button" name="previous" class="previous action-button-previous" value="PREVIOUS" /> -->
</fieldset>
<!-- ENDSTEP5 -->