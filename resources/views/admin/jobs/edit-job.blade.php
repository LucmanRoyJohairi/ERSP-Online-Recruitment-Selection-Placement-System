@extends('layouts.admin.app')
@section('content')
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-desktop stretch-card">
                <div class="mdc-card">
                  <!-- Dapat ang back button is mag back siya sa last niya gi adtoan -->
                  <!-- <a href=""><button class="mdc-button mdc-button--raised filled-button--light text-primary"><i class="fa fa-backward"></i>Back</button></a> -->
                  <h5 class="card-title text-primary text-center" style="font-weight: 700; font-size: 25px;">Edit Job Post</h5>
                  

                  <form action="{{ route('update-job', $job->id) }}" method="post">
                  @csrf
                  <div class="col">
                    <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Enter a new Job Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $job->name }}" name="job_title" placeholder="Enter a new Job Title">
                  </div>

                  <div class="mb-3">
                    <div class="row">
                      <div class="col">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Select Job Type</label>
                        <div class="input-group mb-3">
                          <select class="form-select" id="inputGroupSelect02" name="jobtype">
                            
                            <option selected>Select Job Type</option>
                            @if($job->jobtype_id == 1)
                            <option value="1" selected>Teaching Personnel</option>
                            <option value="2">Non Teaching Personnel</option>

                            @endif
                            @if($job->jobtype_id == 2)
                            <option value="2" selected>Non Teaching Personnel</option>
                            <option value="1" >Teaching Personnel</option>

                            @endif
                          </select>
                        </div>                        
                      </div>
                      
                      <div class="col">
                        <label for="exampleFormControlInput1" class="form-label" style="font-weight: 700; font-size: 20px; margin-top: 20px;">Salary Grade</label>
                        <div class="input-group mb-3">
                          <select class="form-select" id="inputGroupSelect02" name="salary_grade">
                            <option selected>Select Grade</option>
                            @for($i = 1; $i <= 33; $i++)
                                @if($job->salary_level == $i )
                                <option value="{{ $i }}" selected>{{ $i }}</option>
                                @else
                                <option value="{{ $i }}">{{ $i }}</option>

                                @endif
                            @endfor
                            
                          </select>
                        </div>                        
                      </div>
                    
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Job Description</label>
                    <textarea class="form-control" name="description" value="{{ $job->description }}" id="exampleFormControlTextarea1" rows="5">{{ $job->description }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Educational Qualifications</label>
                    <textarea class="form-control" name="education_qual" value="{{ $job->requirements->education_qual }}" id="exampleFormControlTextarea1" rows="5">{{ $job->requirements->education_qual }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Additional Qualifications</label>
                    <textarea class="form-control" name="additional_qual" value="{{ $job->requirements->additional_qual }}" id="exampleFormControlTextarea1" rows="5">{{ $job->requirements->additional_qual }}</textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Experience Requirements</label>
                    <textarea class="form-control" name="experience_req" value="{{ $job->requirements->experience_req }}" id="exampleFormControlTextarea1" rows="5">{{ $job->requirements->experience_req }}</textarea>
                  </div>
                  <!-- <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: 700; font-size: 20px;">Documentary Requirements</label>
                    <textarea class="form-control" name="document_req" value="{{ $job->requirements->document_req }}" id="exampleFormControlTextarea1" rows="5">{{ $job->requirements->document_req }}</textarea>
                  </div> -->
                  <button type="submit" class="mdc-button mdc-button--raised" style="padding: 30px; font-size: 15px;  margin-top: 20px;">UPDATE</button>
                </div>
              </div>
            </div>
            </div>    
        </main>
        </form>
        <!-- partial -->

@endsection