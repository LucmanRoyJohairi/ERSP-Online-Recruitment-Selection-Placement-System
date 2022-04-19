<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Address;
use App\Models\Eligibility;
use App\Models\Course;
use App\Models\Qualification;
use App\Models\Job;
use App\Models\JobRequirement;
use App\Models\Application;
use App\Models\Document;
use App\Models\Issuance;
use App\Mail\ContactFormMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{

    public function index(){
        $allNotif = auth()->user()->notifications;
        $notif = auth()->user()->unreadNotifications;
        $jobs = Job::all();
        $user = User::find(auth()->user()->id);
        return view('applicant.index', compact('user','jobs', 'notif', 'allNotif'));
    }

    public function sendMail(Request $request){
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

        ];

        Mail::to('ustphrmo@ustp.edu.ph')->send(new ContactFormMail($data));
        return redirect()->back()->with('success', 'mail sent!');
    }

    public function aboutPage(){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        return view('applicant.about', compact('notif', 'allNotif'));
    }
    
   

    public function contactPage(){
        $allNotif = auth()->user()->notifications;
        $user = User::find(auth()->user()->id);

        $notif = auth()->user()->unreadNotifications;
        return view('applicant.contact', compact('user','notif', 'allNotif'));
    }

    public function appliedJobsPage(){
        $user = auth()->user()->id;
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;

        $applications = Application::where('user_id', $user)->get();
        return view('applicant.jobs.applied-job', compact('notif', 'allNotif', 'applications'));
    }

    public function editProfilePage(){
        $id = auth()->user()->id;
        $user = User::find($id);
        $allNotif = auth()->user()->notifications;
        $notif = auth()->user()->unreadNotifications;
        $eligibility = Eligibility::where('user_id', $id)->get();
        $eliName = [];
        foreach($eligibility as $e){
            array_push($eliName, $e->eligibility_name);
        }

        return view('applicant.edit-profile', compact('notif', 'allNotif', 'user', 'eliName'));
    }

    public function saveEdit(Request $request){
        $id = auth()->user()->id;
        User::find($id)->update([
            'firstname' => $request->fname,
            'middlename' => $request->mname,
            'lastname' => $request->lname,
            'dateOfBirth' => $request->dateOfBirth,
            'contact' => $request->contact,
            'email' => $request->email
        ]);

       Address::where('user_id',$id)->first()->update([
            'house_number' => $request->house_number,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
       ]);

       Education::where('user_id',$id)->first()->update([
        'school' => $request->school,
       ]);

       Course::where('user_id',$id)->first()->update([
        'course_name' => $request->course,
       ]);

    //    dd($request->eligibility);

       foreach($request->eligibility as $elig){
            
            Eligibility::where('user_id',$id)->first()->update([
                'eligibility_name' =>$elig,

            ]);
        }

        if(is_null($request->qualification_text)){
            Qualification::where('user_id',$id)->first()->update([
            
                'qualification_name' => $request->qualification,

            ]);

        }else{
            Qualification::where('user_id',$id)->first()->update([
            
                'qualification_name' => $request->qualification_text,

            ]);

        }

        Experience::where('user_id',$id)->first()->update([
            'job_title' => $request->job_title,
            'company' => $request->company,
            'total_years' => $request->total_years,
            // 'email' => $request->refEmail,
        ]);


        return redirect()->back()->with('success', 'info updated');

    }

    public function profilePage($id){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        $user = User::find($id);
        $address = Address::where('user_id', $id)->first();
        $education = Education::where('user_id', $id)->first();
        $course = Course::where('user_id', $id)->first();
        $experience = Experience::where('user_id', $id)->first();
        $eligibility = Eligibility::where('user_id', $id)->get();
        $quali = Qualification::where('user_id', $id)->first();
        $apply = Application::where([['user_id', $id], ['application_status', '!=', 'released']])->first();
        $issuance = Issuance::where('user_id', $id)->first();
        $requirements =  [];
        $preEmpDocs =  [];
        // $reqdocs = Document::where()->get();

        for($i = 0; $i < 12; $i++){
            array_push($requirements, Document::where([['user_id', $id], ['filename', 'like', '%' . 'requirement-' . ($i+1) . '.' .  '%']])->first());
        }
        for($i = 0; $i < 23; $i++){
            array_push($preEmpDocs, Document::where([['user_id', auth()->user()->id], ['filename', 'like', '%' . 'pre-employment-' . ($i+1) . '.' .  '%']])->first());
        }

        // dd($requirements);

        // return $requirements;

        // $req1 = Document::where([['user_id', $id], ['filename', 'requirement-1']])->first();
      

        return view('applicant.profile', compact('issuance','preEmpDocs','apply','requirements','notif', 'allNotif','quali','user', 'experience','education', 'address', 'eligibility', 'course'));
    }

    //Applicant-job
    public function careersPage(){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        $jobs = Job::where('status', 'active')->get();
        // $jobs = Job::all();
        $user_id = Auth()->user()->id;
        $application = Application::where([['user_id', $user_id]])->first();

        $docs = Document::where([['user_id', $user_id],['doctype_id', 1]])->get();
       
        // return count($docs);
        // dd(count($applications));
        
        return view('applicant.careers', compact('docs','jobs', 'application', 'notif', 'allNotif'));
    }

    public function viewCareerInfo($job_id){
        $user_id = Auth()->user()->id;
        $allNotif = auth()->user()->notifications;
        $application = Application::where('user_id', $user_id)->first();
        $notif = auth()->user()->unreadNotifications;
        $job = Job::find($job_id);
        $req = JobRequirement::where('job_id',$job_id)->first();
        $docs = Document::where([['user_id', $user_id],['doctype_id', 1]])->get();


        return view('applicant.jobs.job-info', compact('docs','application','job', 'req', 'notif', 'allNotif'));
    }
    public function applyForCareer($job_id){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        $job = Job::find($job_id);
        // dd(Auth()->user()->id);
        $user_id = Auth()->user()->id;
        $user = User::find($user_id);
        $address = Address::where('user_id', $user_id)->first();
        $education = Education::where('user_id', $user_id)->first();
        $course = Course::where('user_id', $user_id)->first();
        $experience = Experience::where('user_id', $user_id)->first();
        $eligibility = Eligibility::where('user_id', $user_id)->get();
        $quali = Qualification::where('user_id', $user_id)->first();
        $eliName =  [];
        $requirements =  [];


        for($i = 0; $i < 12; $i++){
            array_push($requirements, Document::where([['user_id', $user_id], ['filename',  'like', '%' . 'requirement-' . ($i+1) . '.' . '%']])->first());
        }


        foreach($eligibility as $e){
            array_push($eliName, $e->eligibility_name);
        }
        return view('applicant.jobs.apply-job', compact('requirements','eliName','notif', 'allNotif','job', 'user', 'experience','education', 'address', 'eligibility', 'course', 'quali'));
    }

    public function submitApplication($job_id){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        $user_id = Auth()->user()->id;
        // return Carbon::now()->format('Y-d-m');
        Application::create([
            'user_id' => $user_id,
            'job_id' => $job_id,
            'date_applied' => Carbon::now(),
            'application_status' => 'pending',
        ]);
        return redirect()->route('careers')->with('success', 'application has been sent.');

    }

    public function viewNotification($userId, $notifId){
        $allNotif = auth()->user()->notifications;

        $notif = auth()->user()->unreadNotifications;
        $notification = auth()->user()->notifications()->find($notifId);
        $notification->markAsRead();
         return view('applicant.notification', compact('notif','notification', 'allNotif'));
    }
    
    public function searchJob(Request $request){
        $search = $request->job_search;

        $allNotif = auth()->user()->notifications;
        $notif = auth()->user()->unreadNotifications;
        $jobs = Job::where([['status', 'active'], ['name', $search]])->get();
        $user_id = Auth()->user()->id;
        $application = Application::where([['user_id', $user_id], ['application_status', '!=', 'released']])->first();
        $docs = Document::where([['user_id', $user_id],['doctype_id', 1]])->get();


        return view('applicant.careers', compact('docs','jobs', 'application', 'notif', 'allNotif'));
        // dd($search);
    }
}
