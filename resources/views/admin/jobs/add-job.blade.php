@extends('layouts.admin.app')
@section('content')

<main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-desktop stretch-card">
                <div class="mdc-card">
                  <!-- Dapat ang back button is mag back siya sa last niya gi adtoan -->
                  <!-- @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                  @endif -->
                  <a href="{{ route('admin-dashboard') }}"><button class="mdc-button mdc-button--raised filled-button--light text-primary"><i class="fa fa-backward"></i>Back</button></a>
                  <h5 class="card-title text-primary text-center" style="font-weight: 700; font-size: 25px;">What's the job you're hiring for?</h5>
                  
                  <form action="{{ route('save-job') }}" method="POST">
                    @csrf
                  <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Enter a new Job Title</label>
                    <input name="jobTitle" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter a new Job Title">
                  </div>

                  <div class="mb-3">
                    <div class="row">
                      <div class="col">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Select Job Type</label>
                        <div class="input-group mb-3">
                          <select name="jobType" class="form-select" id="inputGroupSelect02">
                            <option selected>Select Job Type</option>
                            <option value="1">Teaching Personnel</option>
                            <option value="2">Non Teaching Personnel</option>
                          </select>
                        </div>                        
                      </div>
                      
                      <div class="col">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Salary Grade</label>
                        <div class="input-group mb-3">
                          <select name="salaryGrade" class="form-select" id="inputGroupSelect02">
                            <option selected>Select Grade</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                          </select>
                        </div>                        
                      </div>
                    
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Job Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Educational Qualifications</label>
                    <textarea name="education_qual" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Additional Qualifications</label>
                    <textarea name="additional_qual" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Experience Requirements</label>
                    <textarea name="experience_req" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div>
                  <!-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Documentary Requirements</label>
                    <textarea name="documentary_req" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                  </div> -->
                  <button type="submit" class="mdc-button mdc-button--raised" style="padding: 30px; font-size: 15px;  margin-top: 20px;">POST</button>
                  </form>
                </div>
              </div>
            </div>
            </div>    
        </main>
@endsection