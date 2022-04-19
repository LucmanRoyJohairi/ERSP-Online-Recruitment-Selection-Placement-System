<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobOffer;
use App\Models\Application;
use App\Models\Shortlist;
use App\Models\Rating;
use App\Models\User;
use App\Models\Screening;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ShortlistNotification;
use App\Notifications\JobOfferNotification;
use App\Notifications\OnboardingNotification;
use App\Notifications\HiredNotification;
use App\Notifications\InterviewNotification;
use App\Notifications\TeachingDemoNotification;
use App\Notifications\FailedApplicationNotification;
use App\Notifications\SkillTestNotification;

class ApplicationController extends Controller
{
    
    public function viewJobs(){
        $jobs = Job::all();
        // dd($jobs);
        // foreach($jobs as $j){
        // echo $j->applications;

        // }
        return view('admin.applications.index', compact('jobs'));
    }

    public function viewApplications($id){
        $jobs = Job::find($id);
        $apply = Application::where('job_id',$id)->get();
        // foreach($apply as $a){
        //     return $a->user;

        // }

        return view('admin.applications.applications', compact('jobs','apply'));

    }

    public function ApplicationProcessPage($id){
        $job = Job::find($id);
        $shortlist = Shortlist::where('job_id',$id)->get();
        $onboard = Application::where([['job_id',$id],['application_status', 'onboarding']])->get();
        $rating = Rating::where('job_id',$id)->get();
        $apply = Application::where([['job_id',$id], ['application_status', '!=', 'released']])->first();
        $offers = JobOffer::where('job_id',$id)->get();
        $hired = Application::where([['job_id',$id],['application_status', 'hired']])->first();
        $screening = Screening::where('job_id',$id)->get();
        $toRank;
        $ratings =  Shortlist::join('ratings', 'ratings.shortlist_id', '=', 'shortlists.id')->where('shortlists.job_id',$id)->orderBy('score', 'desc')->select('shortlists.*')->get();
        if(count($shortlist) != count($ratings)){
            $toRank = Shortlist::where('job_id',$id)->get();
        }else{
            $toRank =  Shortlist::join('ratings', 'ratings.shortlist_id', '=', 'shortlists.id')->where('shortlists.job_id',$id)->orderBy('score', 'desc')->select('shortlists.*')->get();

        }
        // foreach($shortlist as $s){
        //     if($s){

        //     }
        //     $shortlist = Shortlist::where('job_id',$id)->get();

        // }

        // return $toRank;
        // foreach($ratings as $a){
        // return $a->rating;

        // }
        return view('admin.applications.application_process', compact('toRank','screening','onboard','hired','offers','id','apply', 'job', 'shortlist', 'rating'));

    }

    public function updateApplicationStatus(Request $request, $id){
        // return response()->json(['success'=>'Ajax request submitted successfully', 'id' => $request->all()]);

        // TODO:get the applications base on the job id
        // return $request->numOfActive;
        $appStatus = Application::where([['job_id', $id], ['application_status', '!=', 'released']])->get();
        $job = Job::find($id);
        $user_ids = [];


        foreach($appStatus as $a){
            if($request->numOfActive == 1){
                $a->application_status = 'shortlist';
                
    
            }
            if($request->numOfActive == 2){
                $a->application_status = 'screening';
    
            }
            if($request->numOfActive == 3){
                $a->application_status = 'rating';
    
            }
            if($request->numOfActive == 4){
                $a->application_status = 'joboffer';
    
            }
            if($request->numOfActive == 5){
                $a->application_status = 'onboarding';
    
            }
            if($request->numOfActive == 6){
                $a->application_status = 'hired';  
                $job->status = 'inactive';

    
            }
            array_push($user_ids, $a->user_id );

        $a->save();
        $job->save();
       

        }//foreach
        $user = User::whereIn('id',$user_ids)->get();

            foreach($user as $u){
                if($request->numOfActive == 5){
                
                    Notification::send($u, new OnboardingNotification());
                }
                
            }

            // dd('here');
            foreach($user as $u){
                if($request->numOfActive == 6){

                    Notification::send($u, new HiredNotification($job->id));
                }
            }
        

        // $progress = Progress::find(1);
        // return view('home', compact('progress'));
        return response()->json(['success'=>'Ajax request submitted successfully', 'num: ' => $request->numOfActive]);
    
    }

    public function getShortlist(Request $request){
        // return response()->json(['success'=>'Ajax request submitted successfully', 'works' => $request->years ]);

        
        $elg = $request->eli;
        $education = $request->edu;
        $years = $request->years;
        $ids = [];

        if($request->edu){
            $edu = DB::table('users')
            ->join('qualifications', 'qualifications.user_id', '=', 'users.id')
            ->join('applications', 'applications.user_id', '=', 'users.id')
            // ->where('job_id', '=', $id)
            ->select('applications.*', 'qualifications.qualification_name')
            ->where('qualifications.qualification_name', '=', $education)
            ->get();

            foreach($edu as $e){
                if (!in_array($e->id, $ids)){
                    array_push($ids, $e->id);
    
                }
    
            }
        }
        

        //eligibility
        if($request->eli){
            $eli = DB::table('users')
            ->join('eligibilities', 'eligibilities.user_id', '=', 'users.id')
            ->join('applications', 'applications.user_id', '=', 'users.id')
            // ->where('job_id', '=', $id)
            ->select('applications.*', 'eligibilities.eligibility_name')
            ->whereIn('eligibilities.eligibility_name', $elg)
            ->get();

            foreach($eli as $e){
                if (!in_array($e->id, $ids)){
    
                    array_push($ids, $e->id);
    
                }
    
            }
        }
        
        if($request->years){
            $work = DB::table('users')
            ->join('experiences', 'experiences.user_id', '=', 'users.id')
            ->join('applications', 'applications.user_id', '=', 'users.id')
            // ->where('job_id', '=', $id)
            ->select('applications.*', 'experiences.total_years')
            ->where('experiences.total_years', "=",$request->years)
            ->get();

            foreach($work as $w){
                if (!in_array($w->id, $ids)){
                    array_push($ids, $w->id);
    
                }
    
            }
        }
        
        // return response()->json(['success'=>'Ajax request submitted successfully', 'works' => $work ]);

        

        

        
        // $application = User::find($ids);
        $application = DB::table('users')
        ->join('applications', 'applications.user_id', '=', 'users.id')
        ->select('users.firstname','users.lastname', 'users.dateOfBirth', 'users.contact','users.email','applications.id', 'applications.user_id')
        ->whereIn('applications.id',$ids)
        ->get();
        // return response()->json(['success'=>'Ajax request submitted successfully', 'cool' => $application]);


        return json_encode($application);
        exit;
    }

    public function addToShortlist(Request $request,$job_id){
        // return response()->json(['success'=>'Ajax request submitted successfully', 'aoo id' => $request->appID    ]);

        $app = DB::table('applications')->whereIn('id',$request->appID)->get();

        $user_ids = [];
        $other_ids = [];
        foreach($app as $a){
            Shortlist::create([
                'application_id' => $a->id,
                'job_id' => $a->job_id,
                'user_id' => $a->user_id,
                'date' => Carbon::now(),
            ]);
            array_push($user_ids, $a->user_id );
            
        }

        $user = User::whereIn('id',$user_ids)->get();
        foreach($user as $u){

            Notification::send($u, new ShortlistNotification($job_id));
        }

        $application = Application::whereNotIn('user_id', $user_ids)->get();

        foreach($application as $a){

            $a->application_status = 'released';
            $a->save();

            array_push($other_ids, $a->user_id );

        }


       
        $others = User::whereIn('id',$other_ids)->get();

        foreach($others as $o){

            Notification::send($o, new FailedApplicationNotification($job_id));
        }
        

        return response()->json(['success'=>'Ajax request submitted successfully', 'appID' => $a]);

        
    }   

    // RATING
    public function addRating(Request $request, $job_id){

        // return $id;
        $rating = new Rating();
        $rating->shortlist_id = $request->shortlistId; //already exists in database.
        $rating->job_id = $job_id;
        $rating->score = $request->score;
        //score = 1
        $scores = [];
        $rank = [];

        $rates = Rating::where('job_id',$job_id)->get();
        if(count($rates) == 0){
            $rating->rank = 1;
        }

        foreach($rates as $r){
            array_push($scores, $r->score);
        }

        // foreach($rates as $r){
        //     // Rating::where('job_id',$job_id)->update(['rank' => 1]);;
        //     $r->update(['rank' => 2]);
        //     // $r->save();
        // }
        
        if(count($rates) > 0){

            foreach($rates as $r){
                if($r->score >= $request->score){
                    $rating->rank = $r->rank + 1;
                }
                if($request->score >= $r->score){
                    if( $r->rank == 1){
                        // $rating->rank = $r->rank-1;
                        $rating->rank = 1;
                        // $r->rank = 2;
                        $new = Rating::find($r->id);
                        $new->rank = $r->rank + 1;
                        $new->save();
                        // break;


                }else{
                    $rating->rank = $r->rank - 1;
                    $new = Rating::find($r->id);
                    $new->rank = $rating->rank + 1;
                    $new->save();


                }
                    
                }
            }
        }
        $rating->save();
        rsort($scores);

        $count = 0;
        foreach ($scores as $val) {

            $rank[$val] = $count+1;
            $count+=1;
        }
        
        for ($i = 0; $i < count($rates); $i++) {

            // if($rank[$rates[$i]->score]){
                $rates[$i]->update(['rank' => $rank[$rates[$i]->score]]);
            // }
        }
        return response()->json(['success'=>'Ajax request submitted successfully', 'scores' =>$rates ]);



    }

    public function sendJobOffer(Request $request, $job_id){
        $ids = $request->userID;
        $user = User::whereIn('id',$ids)->get();

        // if(count($request->userID) == 1){
            for ($i = 0; $i < count($ids); $i++)  {

                $offer = JobOffer::create([
                    'message' => $request->message,
                    'user_id' => $ids[$i],
                    'job_id' => $job_id,
                    'date' =>  Carbon::now(),
                    'status' => 'pending',
                ]);
            }
            $user = User::whereIn('id',$ids)->get();
            foreach($user as $u){
                Notification::send($u, new JobofferNotification($job_id));
            }
        // }
        return response()->json(['success'=>'Ajax request submitted successfully', 'userId' => $request->userID]);


        
    }

    public function sendScreeningInfo(Request $request, $job_id){
        $ids = $request->userID;
        $user = User::whereIn('id',$ids)->get();

            for ($i = 0; $i < count($ids); $i++)  {
                $screening = Screening::create([
                    'message' => $request->message,
                    'user_id' => $ids[$i],
                    'job_id' => $job_id,
                    'date' =>  Carbon::now(),
                    'screening_type' => $request->type,
                ]);
            }

            $user = User::whereIn('id',$ids)->get();

            if($request->type == 'interview'){
                foreach($user as $u){
                    Notification::send($u, new InterviewNotification($job_id, $request->type));
                }
            }

            if($request->type == 'teaching-demo'){
                foreach($user as $u){
                    Notification::send($u, new TeachingDemoNotification($job_id, $request->type));
                }
            }

            if($request->type == 'skill-test'){
                foreach($user as $u){
                    Notification::send($u, new SkillTestNotification($job_id, $request->type));
                }
            }
            
        return response()->json(['success'=>'Ajax request submitted successfully']);

    }
}
