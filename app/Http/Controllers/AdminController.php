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
use App\Models\JobOffer;
use App\Models\Application;
use App\Models\Document;
use App\Models\Issuance;
use Datatables;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\IssuanceNotification;

class AdminController extends Controller
{

    public function index(){
        $jobs = Job::all();
        $joboffers = JobOffer::all();
        $acceptedOffers = JobOffer::where('status','accepted')->get();
        $pendingOffers = JobOffer::where('status','pending')->get();
        $declinedOffers = JobOffer::where('status','declined')->get();
        $applicants = User::where('userTypeId', 2)->get();
        $latest = Job::latest('created_at')->first();
        $applications = Application::where([['application_status', '!=' ,'hired'], ['application_status', '!=' ,'released']])->get();
        $hired = Application::where('application_status', 'hired')->get();
        

        return view('admin.index', compact('hired','applications','pendingOffers','declinedOffers','acceptedOffers','joboffers','jobs', 'applicants', 'latest'));
    }

    public function userInfo(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user_info', compact('user'));
    }

    public function viewApplicantsPage(){
        $applicants = User::where('userTypeId', 2)->get();
        $applications = Application::find(5);
        // return $applicants->applications->job;

        // dd($applicants);

       

        return view('admin.applicants.index', compact('applicants') );
    }
    public function usersList()
    {
        $edu = DB::table('users')
        ->join('applications', 'applications.user_id', '=', 'users.id')
        ->select('users.*', 'applications.*')
        ->where('users.userTypeId', '=', 2)
        ->get();

        return datatables()->of($edu)
            ->make(true);
        
    }

    public function viewApplicants($id){
        $applicant = User::find($id);
        $address = Address::where('user_id', $id)->first();
        $education = Education::where('user_id', $id)->first();
        $course = Course::where('user_id', $id)->first();
        $experience = Experience::where('user_id', $id)->first();
        $eligibility = Eligibility::where('user_id', $id)->get();
        $quali = Qualification::where('user_id', $id)->first();
        $preEmpDocs =  [];

        for($i = 0; $i < 23; $i++){
            array_push($preEmpDocs, Document::where([['user_id', $id], ['filename',  'like', '%' . 'pre-employment-' . ($i+1) . '.' . '%']])->first());
        }

        // return Document::where([['user_id', $id], ['filename', 'like', '%' . 'requirement-' . 1 . '.'. '%']])->first();
        $req = [];
        for($i = 0; $i < 12; $i++){
            array_push($req, Document::where([['user_id', $id], ['filename', 'like', '%' . 'requirement-' . ($i+1)  . '.' . '%']])->first());

        }
        
        return view('admin.applicants.view-applicants', compact('preEmpDocs','req','quali','applicant', 'address', 'education', 'course', 'experience', 'eligibility'));
    }


    public function viewJobOffersPage(){
        $offers = JobOffer::all();
        return view('admin.job-offers.index', compact('offers'));
    }

    public function viewIssuancePage(){
        $hired = Application::where('application_status', 'hired')->get();
        $issuanceSent = Issuance::all();
        // $id = Auth()->user()->id;
        // $issuance = Issuance::where('user_id', $id)->first();
        // return $id;
        return view('admin.issuance.send-issuance', compact('issuanceSent','hired'));
    }
    public function sendIssuance(Request $request, $user_id){
        $drive_link = $request->drive_link;
        $issuance = Issuance::where('user_id',$user_id)->first();


        $user = User::where('id',$user_id)->get();
        foreach($user as $u){
            Notification::send($u, new IssuanceNotification());
        }
        if($issuance){
            $issuance->link = $drive_link;
            $issuance->save();
            return redirect()->back();

        }else{
            Issuance::create([
                'link' => $drive_link,
                'user_id' => $user_id,
    
            ]);
            return redirect()->back();
    
        }
        
    }
}

