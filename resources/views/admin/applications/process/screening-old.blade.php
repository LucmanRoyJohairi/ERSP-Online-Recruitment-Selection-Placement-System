 <!-- STEP2 -->
 <fieldset>
<div class="form-card">
    <div class="justify-content-end">
        <h2 class="steps">Step 2 - 6</h2>
    </div>
    <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card">
            <h5 class="text-primary" style="font-size: 25px;">Screening - IT Technical Support</h5>
            <div class="d-flex justify-content-between align-items-center">
                
                </div> 
                    <div class="alert alert-primary mt-5" role="alert">
                        Notice: make sure to choose an applicant from the table to send and email to.
                    </div>
                
                    <div class="card" style="margin-top: 30px;">

                    
                    
                    
                        <div class="card-body">
                        
                        <h5 class="card-title text-primary text-center" style="font-weight: 700; font-size: 20px;">SEND SCREENING DETAILS</h5> 

                        <div id="buttons" class="pt-3 float-right">  
                            <a class="Smallbutton" id="interview-btn" data-target=".interview">INTERVIEW</a>
                            <a class="Smallbutton" id="teaching-btn" data-target=".teaching">TEACHING DEMO</a>
                        </div> 
                        
                        <div class="interview target content-here mb-4"  style="display:none;" id="interview-form">
                        
                        <h5 class="card-title text-primary" style="font-weight: 700; font-size: 20px;">Interview Details</h5>  
                        
                        <div class="content-in">

                            <!-- <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Date</label>
                            <input type="date" class="form-control mb-3" id="date" placeholder="">  -->

                            <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Message</label>
                            <textarea class="form-control mb-3" id="interview-message" rows="5"></textarea>
                            
                            <button class="mdc-button mdc-button--raised" style="padding: 20px 20px;" id="interview-send">SEND</button>

                        </div>
                        
                        </div>

                    <div class="teaching target content-here" style="display:none;" id="teaching-demo-form" >

                        <h5 class="card-title text-primary" style="font-weight: 700; font-size: 20px;">Teaching Demo Details</h5>  
                        
                        <div class="content-in">

                        <!-- <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Date</label>
                        <input type="date" class="form-control mb-3" id="date" placeholder="">  -->

                        <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Message</label>
                        <textarea class="form-control mb-3" id="teaching-demo-message" rows="5"></textarea>
                        
                        <button class="mdc-button mdc-button--raised" style="padding: 20px 20px;" id="teaching-demo-send">SEND</button>

                        </div>
                    
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

                        
                    </div>   
                    <div class="alert alert-danger mt-5" role="alert">
                        Notice: Please double check if the applicants have finished their screening process before proceeding to the next step. The screening process 
                        consists of: Interview, Teaching Demo and Reference Background Check. 
                    </div>
                    <div class="card" style="margin-top:10px;">
                        <div class="card-body">
                            <div class="credentials mt-4 " style="margin-left:10px;">
                                <h5 class="card-title text-primary " style="font-weight: 700; font-size: 20px;">SCREENING PROGRESS</h5> 
                                <div id="checkBoxList">
                                <input type="checkbox" class="checklists" name="checkme"/> Interview<br>
                                <input type="checkbox"  class="checklists" name="checkme"/> Teaching Demo<br>
                                <input type="checkbox"  class="checklists" name="checkme"/> Reference Background Check<br>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                        
                    
        </div>
    </div>
    </div>
    </div>
</div> 
<button name="sendNewSms" class="inputButton  next action-button btn btn-primary" disabled="disabled" id="sendNewSms" value="RATE APPLICANTS ">Rate applicants</button>

<!-- <input type="button" name="sendNewSms" class="inputButton  next action-button btn btn-primary" disabled="disabled" id="sendNewSms" value="RATE APPLICANTS " /> -->



</fieldset>
<!-- ENDSTEP2 -->

