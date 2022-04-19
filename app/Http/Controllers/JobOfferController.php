<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobOffer;
use App\Models\User;
use App\Models\Application;
use App\Models\Document;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FailedApplicationNotification;

class JobOfferController extends Controller
{
    public function jobOfferPage(){
        $allNotif = auth()->user()->notifications;
        $notif = auth()->user()->unreadNotifications; 
        $userId = auth()->user()->id;
        $preDocs = Document::where([['user_id', $userId],['doctype_id', 2]])->get();


        $offers = JobOffer::where('user_id', $userId)->get();
        // return $offers;
        return view('applicant.job-offer.index', compact('preDocs', 'allNotif', 'notif', 'offers'));
    }
    public function viewjobOffer($id){
        // dd($id);
        $preEmpDocs =  [];
        for($i = 0; $i < 23; $i++){
            array_push($preEmpDocs, Document::where([['user_id', auth()->user()->id], ['filename',  'like', '%' . 'pre-employment-' . ($i+1) . '.' . '%']])->first());
        }

        // dd($preEmpDocs);
        $allNotif = auth()->user()->notifications;
        $notif = auth()->user()->unreadNotifications;
        $offer = JobOffer::find($id);
        $user = User::find(auth()->user()->id);
        $docNames = [
            'Personal Data Sheet 3 Original (Notarized) - Long Bond Paper',
            'Clearance from Previous employer - 1 Original & 1 Photocopy',
            'Original NSO Birth Certificate - 1 Original & 1 Photocopy',
            'Marriage Certificate (if married) - 2 Photocopy',
            'Birth Certificate of children - 2 Photocopy',
            '2 Authenticated Copies of Transcript of Records',
            '2 Authenticated Copies of Diploma (College, Graduate School, Post-graduate',
            '2 Authenticated Copies of Certificate of Eligibility (if applicable)',
            '2 Authenticated Copies of PRC ID (if applicable)',
            'a. Blood Test - 1 Original & 1 Photocopy',
            'b. Urinalysis - 1 Original & 1 Photocopy',
            'c. Chest X-ray - 1 Original & 1 Photocopy',
            'd. Drug Test - 1 Original & 1 Photocopy',
            'e. Neuropsychiatric Examination w/ Pyschological Test
            1 Original & 1 Photocopy',
            'NBI Clearance - 1 Original & 1 Photocopy',
            'Statement of Assets, Liabilities and Net Worth (SALN)
            - 3 Original (Notarized)',
            'BIR Form 1902 (Application for Registration) and Form 2305
            - 2 Original (Downloadable)',
            'Pag Ibig Fund member’s Data Form (MDF) with Registration
            Tracking Number (RTN) - 1 Original & 1 photocopy',
            'Philhealth Number and Philhealth Membership Form with 
            Philhealth Number - 2 Original',
            'Clearance from money, property and legal accountabilities from the previous office.',
            'Certified true copy of pre-audited disbursement voucher of last salary from previous agancy and/or 
            Certification by the Chief Accountant of last salary received from previous office duty verified by the assigned auditor thereat.',
            'Certified of Available Leave Credits',
            'Service Record'
    
    
        ];
        // return $offer;
        return view('applicant.job-offer.view-offer', compact('docNames','user','preEmpDocs','allNotif', 'notif', 'offer'));
    }

    public function declineJobOffer($id){

        $userId = auth()->user()->id;
        $offer = JobOffer::where([['user_id', $userId], ['id', $id]])->first();
        $application = Application::where([['user_id', $userId],['job_id', $offer->job->id]] )->first();

        $application->application_status = 'released';
        $offer->status = 'declined';
        $offer->save();
        $application->save();

        // return redirect()->back();
        return response()->json(['success'=>'Ajax request submitted successfully', 'offer' => $application]);


    }

    public function acceptJobOffer($id){
        $joboffer = jobOffer::find($id);
        $allOffers = jobOffer::where('job_id', $joboffer->job_id)->get();
        // $offersSent = jobOffer::where()->get();
        $userId = auth()->user()->id;
        $user_ids = [];
        $idsSent= [];

        foreach($allOffers as $j){
            array_push($idsSent, $j->user_id);

        }

        $otherApplications = Application::select('*')
                            ->where('job_id', $joboffer->job_id)
                            ->whereNotIn('user_id', $idsSent)
                            ->get();

        foreach($otherApplications as $applications){
            
            $applications->application_status = 'released';
            $applications->save();
            array_push($user_ids, $applications->user_id );

        }

        $user = User::whereIn('id',$user_ids)->get();
        foreach($user as $u){
            Notification::send($u, new FailedApplicationNotification($joboffer->job->id));
        }
        
        $offer = JobOffer::where([['user_id', $userId], ['job_id', $joboffer->job_id]])->first();
        $offer->status = 'accepted';
        $offer->save();
        return response()->json(['success'=>'Ajax request submitted successfully', 'other' => $otherApplications]);

    }
}
