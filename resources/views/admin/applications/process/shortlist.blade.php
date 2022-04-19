<!-- STEP1 -->
<fieldset>
    <div class="form-card">
        <div class="justify-content-end">
        <h2 class="steps">Step 1 - 6</h2>
        </div>
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                <div class="mdc-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-2 mb-sm-0">Filter Applicants</h4>
                        </div> 
                    <div class="container">
                        <h5 class="text-primary" style="margin-top: 20px;">ELIGIBILITY</h5>
                        <h6>You may check more than one <span style="color: red;">*</span></h6>
                        <div class="form-check">
                            <input name="eligibility" value="None" class="form-check-input" type="checkbox"  id="None">
                            <label class="form-check-label" for="None" style="font-size: 15px;">
                                None
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="eligibility" value="Civil Service Sub-Professional" class="form-check-input" type="checkbox"  id="Civil Service Sub-Professional">
                            <label class="form-check-label" for="Civil Service Sub-Professional" style="font-size: 15px;">
                                Civil Service Sub-Professional
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="eligibility" value="Civil Service Professional" class="form-check-input" type="checkbox" id="Civil Service Professional">
                            <label class="form-check-label" for="Civil Service Professional" style="font-size: 15px;">
                                Civil Service Professional
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="eligibility" value="Other Eligibilities Granted under Speacial Laws" class="form-check-input" type="checkbox" id="Other Eligibilities Granted under Speacial Laws">
                            <label class="form-check-label" for="Other Eligibilities Granted under Speacial Laws" style="font-size: 15px;">
                                Other Eligibilities Granted under Speacial Laws
                            </label>
                        </div>
                       
                    </div>
                    <!-- <div class="container">
                        <h5 class="text-primary" style="margin-top: 30px;">COURSE</h5>
                       
                        <h6 style="margin-top: 20px;">Choose College Course <span style="color: red;">*</span></h6>
                        <select name="course" class="form-select form-select-sm" aria-label=".form-select-sm example" style="width: auto;">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                    <div class="container">
                        <h5 class="text-primary" style="margin-top: 30px;">EDUCATIONAL ATTAINMENT</h5>
                        <h6>Select Highest Educational Attainment <span style="color: red;">*</span></h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="Post Graduate Studies" value="Post Graduate Studies">
                            <label class="form-check-label" for="Post Graduate Studies" style="font-size: 15px;">
                                Post Graduate Studies
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="Bachelor’s Degree" value="Bachelor’s Degree">
                            <label class="form-check-label" for="Bachelor’s Degree" style="font-size: 15px;">
                                Bachelor’s Degree
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="education" id="High School" value="High School">
                            <label class="form-check-label" for="High School" style="font-size: 15px;">
                                High School
                            </label>
                        </div>  
                    </div>
                    <div class="container">
                        <h5 class="text-primary" style="margin-top: 30px;">WORK EXPERIENCE</h5>
                        <h6>Choose Minimum Years of Experience<span style="color: red;">*</span></h6>
                        <select class="form-select form-select-sm pops" aria-label=".form-select-sm example" id="years">
                            <option value="5">5 years or more relevant experience</option>
                            <option value="4">4 to 5 years relevant experience</option>
                            <option value="3">3 to 4 years relevant experience</option>
                            <option value="2">2 to 3 years relevant experience</option>
                            <option value="1">1 to 2 years relevant experience</option>
                        </select>
                    </div>
                    <!-- <div class="container">
                        <h5 class="text-primary" style="margin-top: 30px;">NO. OF APPLICANTS</h5>
                        <h6>Input the Number of Applicants you want to Shortlist<span style="color: red;">*</span></h6>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: auto;">
                    </div> -->
                    <div class="container" style="margin: 30px 0px 30px 0px;">
                        <button class="mdc-button mdc-button--primary" style="padding: 20px 20px;" id="sd">
                            SHORTLIST APPLICANTS
                        </button>
                    </div>
                </div>
            </div>

            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
                <div class="mdc-card">
                    <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-2 mb-sm-0">{{ $job->name}}</h4>
                    </div>
                    <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span id="total_app">0</span></p><br>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                    <thead class="">
                        <tr>
                        <th class="text-left">ID</th>
                            <th class="text-center ">NAME</th>
                            <th class="text-center">DOB</th>
                            <th class="text-center">CONTACT</th>
                            <th class="text-center">EMAIL</th>
                            <!-- <th class="text-white">JOB APPLIED</th> -->
                        
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                       
                    </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="mdc-button mdc-button--raised" id="add-shortlist" style= "background-color: #F7B41E; margin-top: 20px;">ADD TO SHORTLIST</button>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-2 mb-sm-0" style="margin-top:60px;">Shortlisted Applicants</h4>
                </div>
                <p class="d-none d-sm-block text-primary tx-12 mb-0 mr-2" style="font-weight: 700;">Total Applicants: <span id="shortlisted_count">0</span></p><br>
                <div class="table-responsive">
                    <table class="table" id="shortlistTable">
                    <thead class="">
                        <tr>
                        <th class="text-left">ID</th>
                            <th class="text-center ">NAME</th>
                            <th class="text-center ">DOB</th>
                            <th class="text-center ">CONTACT</th>
                            <th class="text-center ">EMAIL</th>
                            <!-- <th class="text-white">JOB APPLIED</th> -->
                        
                            <th class="text-center">ACTION</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div> 
    <button name="next" class="next action-button" id="cool" value="SCREEN APPLICANTS">screening</button>
    <!-- <input type="button" name="next" class="next action-button" id="cool" value="SCREEN APPLICANTS" /> -->
    
</fieldset>
<!-- ENDSTEP1 -->