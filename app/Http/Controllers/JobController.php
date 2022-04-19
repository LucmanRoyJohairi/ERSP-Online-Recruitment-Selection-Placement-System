<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\Application;

class JobController extends Controller
{
    public function addJobsPage(){
        return view('admin.jobs.add-job');
    }

    public function manageJobsPage(){
        $jobs = Job::all();
        // $applications = Application::where('job_id')->get();

        return view('admin.jobs.manage-job', compact('jobs'));
    }

    public function saveJobInfo(Request $request){
        $job = Job::create([
            'name' => $request->jobTitle,
            'description' => $request->description,
            'salary_level' => $request->salaryGrade,
            'jobtype_id' => $request->jobType,
            'status' => 'active',
        ]);

        JobRequirement::create([
            'education_qual' => $request->education_qual,
            'additional_qual' => $request->additional_qual,
            'experience_req' => $request->experience_req,
            'document_req' => $request->documentary_req,
            'job_id' => $job->id,
        ]);

        return redirect()->back()->with('success', 'Job Added');
    }

    public function viewJobInfo($id){
        $job = Job::find($id);
        $req = JobRequirement::where('job_id',$id)->first();
        return view('admin.jobs.view-job', compact('job', 'req'));

    }

    public function editJobInfo($job_id){
        $job = Job::find($job_id);

        return view('admin.jobs.edit-job', compact('job'));
    }

    public function updateJobInfo(Request $request, $job_id){
        Job::find($job_id)->update([
            'name' => $request->job_title,
            'description' => $request->description,
            'salary_level' => $request->salary_grade,
            'jobtype_id' => $request->jobtype,
            // 'status' => $request->,
        ]);

        JobRequirement::where('job_id',$job_id)->first()->update([
            'education_qual' => $request->education_qual,
            'additional_qual' => $request->additional_qual,
            'experience_req' => $request->experience_req,
            'document_req' => $request->document_req,

        ]);
        return redirect()->back()->with('success', 'info updated');

    }
}
