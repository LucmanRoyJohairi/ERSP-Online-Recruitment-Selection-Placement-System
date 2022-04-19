<!-- STEP3 -->
<fieldset>
    <div class="form-card">
        <div class="justify-content-end">
            <h2 class="steps">Step 3 - 6</h2>
            </div>
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                <h5 class="text-primary" style="font-size: 25px;">IT Technical Support</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-2 mb-sm-0 pt-3">Rate Applicants</h4>
                        </div> 
                        <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2 pt-3" style="font-weight: 700;">Total Applicants: <span>{{ count($shortlist) }}</span></p>
                        @php
                        $i = 0;
                        $idList = [];

                        @endphp

                        
                        @foreach($toRank as $s)
                        @php
                            if(!$s->rating){
                                $hasRated = false;
                            }else{
                                $hasRated = true;

                            }
                        @endphp
                        <div class="card" style="margin-top: 30px;">
                            @php
                              
                              array_push($idList, $s->user->id);
                            
                            @endphp
                            <!-- this is {{ count($idList) }} -->
                            @if(!$s->rating) 
                            <h5 class="card-header text-secondary" style="font-weight: 700;">Rank <span>-</span></h5>
                            @else
                            <h5 class="card-header text-secondary" style="font-weight: 700;">Rank <span>{{ $s->rating->rank}}</span></h5>

                            @endif
                            
                            <div class="card-body">

                                <div class="d-flex" >
                                    <div class="p-2 flex-grow-1"><h5 class="card-title text-primary">{{ $s->user->firstname}} {{ $s->user->middlename[0] }} {{ $s->user->lastname }}</h5></div>
                                    @if($s->rating)
                                    <div class="p-2 text-primary" style="font-weight: 700;">Total Score: <span>{{ $s->rating->score}}</span></div>
                                    @else
                                    <div class="p-2 text-primary" style="font-weight: 700;">Total Score: <span>0</span></div>

                                    @endif
                                    
                                    <div class="p-2" id="btn-case"><a id="rate-btn-{{ $s->user->id }}"class="show4 rate-btn2 rate-btn">RATE</a></div>
                            
                                </div>

                                <!-- <div class="credentials" style="margin-left:10px;">
                                    <div class="d-flex justify-content-start">
                                    <i class="fas fa-briefcase"></i>
                                    <p class="card-text" style="margin-left: 5px;">{{ $s->user->email}}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                    <i class="fas fa-briefcase"></i>
                                    <p class="card-text" style="margin-left: 5px;">{{ $s->user->applications }}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p class="card-text" style="margin-left: 5px;">Bachelor's Degree of Information Technology(2014)</p>
                                    </div>           
                                </div> -->

                            <!--form-->
                        
                                <div id="id-{{ $s->user->id }}" class="form form4 myformsz">
                                
                                <main class="content-wrapper">
                                <div class="mdc-layout-grid">
                                    <div class="mdc-layout-grid__inner">
                                
                                        <!-- education -->
                                    
                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-2 mb-sm-0  rate-title p-3 ">Education</h4>
                                                </div> 
                                                <p class="d-none d-sm-block text-primary text-center tx-12 mb-0 mr-2" style="font-weight: 700;">Total: <span>25%</span></p><br>
                                                <form action="" class="p-3 pd-5">
                                                    
                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="educationRadio-{{ $s->user->id }}" type="radio" value="25" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Full-fledge relevant Doctoral degree</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold">25</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="educationRadio-{{ $s->user->id }}" type="radio" value="20" id="educationRadio-{{ $s->user->id }}2">
                                                        <label class="form-check-label" for="educationRadio-{{ $s->user->id }}2">Appropriate  Master’s degree required (min.)</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold">20</p>
                                                    </div>
                                                </div>  
                                                    <h6 style="margin-top: 20px; padding-left:10px;">w/ Doctoral degree units:</h6>
                                                
                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input educheck" name="educationRadio2-{{ $s->user->id }}" type="radio" value="4" id="educationRadio2-{{ $s->user->id }}1">
                                                        <label class="form-check-label" for="educationRadio2-{{ $s->user->id }}1">w/ CAR</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold text-left">4</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input educheck" type="radio" name="educationRadio2-{{ $s->user->id }}" value="3" id="educationRadio2-{{ $s->user->id }}2">
                                                        <label class="form-check-label" for="educationRadio2-{{ $s->user->id }}2">w/ 20 units</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold text-left">3</p>
                                                    </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input educheck" type="radio" name="educationRadio2-{{ $s->user->id }}" value="2" id="educationRadio2-{{ $s->user->id }}3">
                                                        <label class="form-check-label" for="educationRadio2-{{ $s->user->id }}3">w/ 11-19 units</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold text-left">2</p>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input educheck" name="educationRadio2-{{ $s->user->id }}" type="radio" value="1" id="educationRadio2-{{ $s->user->id }}4">
                                                        <label class="form-check-label" for="educationRadio2-{{ $s->user->id }}4">w/ 6-10 units</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold text-left">1</p>
                                                    </div>
                                                </div>

                                                

                                                <div class="row">
                                                    <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="educationRadio-{{ $s->user->id }}" type="radio" value="15" id="educationRadio-{{ $s->user->id }}3">
                                                        <label class="form-check-label" for="educationRadio-{{ $s->user->id }}3">Bachelor’s Degree</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-3">
                                                    <p class="font-weight-bold">15</p>
                                                    </div>
                                                </div> 

                                                </form>
                                            </div>
                                        </div>
                            

                                        <!--education-->

                                        <!--experience-->

                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-2 mb-sm-0  rate-title p-3">Experience</h4>
                                                </div> 
                                                <p class="d-none d-sm-block text-primary text-center tx-12 mb-0 mr-2" style="font-weight: 700;">Total: <span>15%</span></p><br>
                                                <form action="" class="p-3 pd-5">
                                                <div class="row">
                                                                                        <div class="col">
                                                                                          <div class="form-check">
                                                        <input class="form-check-input" value="15" type="radio" name="experienceRadio-{{ $s->user->id }}" id="experienceRadio-{{ $s->user->id }}1">

                                                                                            <label class="form-check-label" for="experienceRadio-{{ $s->user->id }}1">5 years or more relevant experience</label>
                                                                                          </div>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                          <p class="font-weight-bold">15</p>
                                                                                        </div>
                                                                                      </div>
                                                                                      
                                                                                    <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="14" type="radio" name="experienceRadio-{{ $s->user->id }}" id="experienceRadio-{{ $s->user->id }}2">

                                                                                          <label class="form-check-label" for="experienceRadio-{{ $s->user->id }}2">4.1 to 5 years relevant experience</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">14</p>
                                                                                      </div>
                                                                                    </div>
                                                                                      
                                                                                    <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="13" type="radio" name="experienceRadio-{{ $s->user->id }}" id="experienceRadio-{{ $s->user->id }}3">

                                                                                          <label class="form-check-label" for="experienceRadio-{{ $s->user->id }}3">3.1 to 4 years relevant experience</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">13</p>
                                                                                      </div>
                                                                                    </div>
                                                                                      
                                                                                      <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="12" type="radio" name="experienceRadio-{{ $s->user->id }}" id="experienceRadio-{{ $s->user->id }}4">

                                                                                          <label class="form-check-label" for="experienceRadio-{{ $s->user->id }}4">2.1 to 3 years relevant experience</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">12</p>
                                                                                      </div>
                                                                                    </div>
                                                                                      
                                                                                      
                                                                                      <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="11" type="radio" name="experienceRadio-{{ $s->user->id }}" id="experienceRadio-{{ $s->user->id }}5">

                                                                                          <label class="form-check-label" for="experienceRadio-{{ $s->user->id }}5">1 to 2 years relevant experience</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">11</p>
                                                                                      </div>
                                                                                    </div>


                                                   

                                                </form>
                                            </div>
                                        </div>

                                        <!--experience-->
                                            
                                        <!--training-->

                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-2 mb-sm-0  rate-title p-3">Training/ Seminars/ Workshop</h4>
                                                </div> 
                                                <p class="d-none d-sm-block text-primary text-center tx-12 mb-0 mr-2" style="font-weight: 700;">Total: <span>15%</span></p><br>
                                                
                                                <form action="" class="p-3 pd-5">


                                                <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="15" type="radio" name="tswradio-{{ $s->user->id }}" id="tswradio-{{ $s->user->id }}1">

                                                                                          <label class="form-check-label" for="tswradio-{{ $s->user->id }}1">24 hours or more</label>
                                                                                        </div>  
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">15</p>
                                                                                      </div>
                                                                                    </div>
                                                                                    
                                                                                    <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="14" type="radio" name="tswradio-{{ $s->user->id }}" id="tswradio-{{ $s->user->id }}2">

                                                                                          <label class="form-check-label" for="tswradio-{{ $s->user->id }}2">16.1 to 24 hours</label>
                                                                                        </div> 
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">14</p>
                                                                                      </div>
                                                                                    </div>

                                                                                    <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="13" type="radio" name="tswradio-{{ $s->user->id }}" id="tswradio-{{ $s->user->id }}3">

                                                                                          <label class="form-check-label" for="tswradio-{{ $s->user->id }}3">12.1 to 16 hours</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">13</p>
                                                                                      </div>
                                                                                    </div>


                                                                                    <br>

                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="12" type="radio" name="tswradio-{{ $s->user->id }}" id="tswradio-{{ $s->user->id }}4">

                                                                                          <label class="form-check-label" for="tswradio-{{ $s->user->id }}4">8.1 to 12 hours</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">12</p>
                                                                                      </div>
                                                                                    </div>

                                                                                    <br>


                                                                                    <div class="row">
                                                                                      <div class="col">
                                                                                        <div class="form-check">
                                                        <input class="form-check-input" value="11" type="radio" name="tswradio-{{ $s->user->id }}" id="tswradio-{{ $s->user->id }}5">

                                                                                          <label class="form-check-label" for="tswradio-{{ $s->user->id }}5">8.1 to 12 hours</label>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-3">
                                                                                        <p class="font-weight-bold">11</p>
                                                                                      </div>
                                                                                    </div>
                                                    
                                                </form>
                                                    
                                            
                                            </div>
                                        </div>

                                        <!--training-->
                                        
                                        <!--interview-->

                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-2 mb-sm-0  rate-title p-3">Interview</h4>
                                                </div> 
                                                <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2 text-center" style="font-weight: 700;">Total: <span>30%</span></p><br>
                                                <div class="mb-3 px-4">
                                                    <label for="formGroupExampleInput" class="form-label">Based on the Interview:</label>
                                                    <input type="number" class="form-control" name="interviewScore-{{ $s->user->id }}" id="formGroupExampleInput" placeholder="Input Interview Score" min=1 max=30>
                                                    <!-- <span class="text-danger float-end">+30 pts</span> -->
                                                    
                                                </div>
                                                <div class="d-flex justify-content-center" style="margin-top:10px;">
                                                    <a class="hide4 save-rate-btn" id="interview-submit-{{ $s->user->id }}" >Submit</a>
                                                </div>

                                            </div>

                                        </div>


                                        <!--interview-->
                                        
                                        <!-- teahcing demo -->

                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title mb-2  rate-title mb-sm-0 p-3">Teaching Demo</h4>
                                                </div> 
                                                <p class="d-none d-sm-block text-primary tx-12 text-center mb-0 mr-2" style="font-weight: 700;">Total: <span>10%</span></p><br>
                                                <div class="mb-3 px-4">
                                                    <label for="formGroupExampleInput" class="form-label">Teaching Demo:</label>
                                                    <input type="number" name="teachingDemoScore-{{ $s->user->id }}" class="form-control" id="formGroupExampleInput" placeholder="Input Teaching Demo Score">
                                                    <!-- <span class="text-danger float-end">+10 pts</span> -->
                                                </div>
                                                <div class="d-flex justify-content-center" style="margin-top:10px;">
                                                    <a class="hide4 save-rate-btn"  id="teaching-demo-submit-{{ $s->user->id }}" >Submit</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!--teaching demo-->

                                        <!--potential card-->

                                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                            <div class="mdc-card mdc-cards">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h4 class="card-title   rate-title  mb-2 mb-sm-0 p-3">Potential</h4>
                                                    </div> 
                                                <p class="d-none d-sm-block text-primary text-center tx-12 mb-0 mr-2" style="font-weight: 700;">Total: <span>5%</span></p><br>
                                                    <form action="" class="p-3 pd-5">

                                                    <div class="row">
                                                                                    <div class="col">
                                                                                      <div class="form-check">
                                                        <input class="form-check-input" value="5" type="radio" name="potentialRadio-{{ $s->user->id }}" id="potentialRadio-{{ $s->user->id }}1">

                                                                                        <label class="form-check-label" for="potentialRadio-{{ $s->user->id }}1">Exeptional, exceeds and fully meets all requirements</label>
                                                                                      </div><br>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                      <p class="font-weight-bold">5</p>
                                                                                    </div>
                                                                                  </div>

                                                                                  <div class="row">
                                                                                    <div class="col">
                                                                                      <div class="form-check">
                                                        <input class="form-check-input" value="4" type="radio" name="potentialRadio-{{ $s->user->id }}" id="potentialRadio-{{ $s->user->id }}2">

                                                                                        <label class="form-check-label" for="potentialRadio-{{ $s->user->id }}2">Advantageous, exceeds some requirements</label>
                                                                                      </div><br>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                      <p class="font-weight-bold">4</p>
                                                                                    </div>
                                                                                  </div>
        
                                                                                  <div class="row">
                                                                                    <div class="col">
                                                                                      <div class="form-check">
                                                        <input class="form-check-input" value="3" type="radio" name="potentialRadio-{{ $s->user->id }}" id="potentialRadio-{{ $s->user->id }}3">

                                                                                        <label class="form-check-label" for="potentialRadio-{{ $s->user->id }}3">Meets minimal requirements</label>
                                                                                      </div><br>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                      <p class="font-weight-bold">3</p>
                                                                                    </div>
                                                                                  </div>

                                                                                  <div class="row">
                                                                                    <div class="col">
                                                                                      <div class="form-check">
                                                        <input class="form-check-input" value="3" type="radio" name="potentialRadio-{{ $s->user->id }}" id="potentialRadio-{{ $s->user->id }}4">

                                                                                        <label class="form-check-label" for="potentialRadio-{{ $s->user->id }}4">Addresses most of the minimal requirements</label>
                                                                                      </div><br>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                      <p class="font-weight-bold">3</p>
                                                                                    </div>
                                                                                  </div>


                                                                                  <div class="row">
                                                                                    <div class="col">
                                                                                      <div class="form-check">
                                                        <input class="form-check-input" value="3" type="radio" name="potentialRadio-{{ $s->user->id }}" id="potentialRadio-{{ $s->user->id }}5">

                                                                                        <label class="form-check-label" for="potentialRadio-{{ $s->user->id }}5">Addresses part of the minimal requirements</label>
                                                                                      </div>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                      <p class="font-weight-bold">3</p>
                                                                                    </div>
                                                                                  </div>
                                                    

                                                    </form>
                                                    
                                            </div>
                                        </div>

                                        <!--potential card-->

                                        <!--footer card-->
                                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                <div class="mdc-card">
                                                    <div class="d-flex justify-content-center">
                                                        <h3 class="text-primary" style="font-weight: 700; margin-right: 60px;">Total Score: <span id="t-score-{{ $s->user->id }}">0</span></h3>
                                                        <h3 class="text-primary" style="font-weight: 700;">Partial Rank: <span><u>1</u></span></h3>
                                                    </div>
                                                    <!-- this will hold the id for the user -->
                                                    <input type="hidden" id="shortlistId-{{ $s->user->id }}" value="{{ $s->id }}">
                                                    <!-- this will hold the id for the user -->


                                                    <div class="d-flex justify-content-center" style="margin-top:10px;">
                                                        <a class="hide4 save-rate-btn" id="calculate-score-{{ $s->user->id }}" >Calculate</a>
                                                        <a class=" save-rate-btn" id="post-score-{{ $s->user->id }}" >Save score</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--footer card-->
                                    
                            
                                        
                                        </div>

                                    </div>
                                
                                </main>
                                    
                                
                                
                                </div> <!-- myforms -->

                            <!--form-->
                            </div> <!--card body -->
                        </div>  <!--card -->
                        @php 
                        $i += 1;

                        @endphp
                        @endforeach

                        <input type="hidden" class="userID" value="{{ json_encode($idList) }}">
                    
                        

                    <!--next card-->
                    
                </div>
            </div>
            </div>
        </div>
    @if($hasRated == true)

    <!-- </div> <input type="button" name="next" class="next action-button" value="JOB OFFER" />  -->
    <button name="next" class="next action-button" value="JOB OFFER">Job Offer</button>
   
    @else
    </div> <input type="button" name="next" class="next action-button-previous" value="JOB OFFER" disabled/> 
   
    @endif
</fieldset>
<!-- ENDSTEP3 -->