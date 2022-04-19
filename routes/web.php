<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

use App\Models\User;
use App\Notifications\ShortlistNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
})->middleware('admin');

Route::get('/send-mail', function(){
    // $user = \App\Models\User::first();
    $user = User::find(2);
    // dd($user);
    Notification::send($user, new ShortlistNotification(1));
    dd("email sent, new record added");
    
});

Route::get('/test-func', function () {
    $files = Storage::disk('google')->files()[0];
    dd(Storage::disk('google')->url($files));

});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin
Route::get('/admin/dashboard/info', [AdminController::class, 'userInfo'])->name('user-info');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard')->middleware('admin');

//ADMIN-APPLICANTS

Route::get('/admin/dashboard/applicants', [AdminController::class, 'viewApplicantsPage'])->name('applicants-page')->middleware('admin');
Route::get('/admin/dashboard/applicants/view/{id}', [AdminController::class, 'viewApplicants'])->name('view-applicants')->middleware('admin');

//ADMIN-APPLICATIONS
Route::get('/admin/dashboard/jobs', [ApplicationController::class, 'viewJobs'])->name('view-jobs-page')->middleware('admin');
Route::get('/admin/dashboard/jobs/applications/{job_id}', [ApplicationController::class, 'viewApplications'])->name('view-job-applications')->middleware('admin');
Route::get('/admin/dashboard/jobs/applications/{job_id}/process', [ApplicationController::class, 'ApplicationProcessPage'])->name('application-process')->middleware('admin');
Route::post('/admin/dashboard/jobs/applications/{job_id}/process/next', [ApplicationController::class, 'updateApplicationStatus'])->name('update-process')->middleware('admin');

//ADMIN-APPLICATIONS-Shortlist
Route::get('/admin/dashboard/jobs/applications/{job_id}/process/next/shortlist', [ApplicationController::class, 'getShortlist'])->middleware('admin');
Route::post('/admin/dashboard/jobs/applications/{job_id}/process/next/shortlist/add', [ApplicationController::class, 'addToShortlist'])->middleware('admin');

//ADMIN-ratings
Route::post('/admin/dashboard/jobs/applications/{job_id}/process/rate', [ApplicationController::class, 'addRating'])->middleware('admin');
Route::post('/admin/dashboard/jobs/applications/{job_id}/process/joboffer/send', [ApplicationController::class, 'sendJobOffer'])->middleware('admin');

//Admin screening
Route::post('/admin/dashboard/jobs/applications/{job_id}/process/screening/send', [ApplicationController::class, 'sendScreeningInfo'])->middleware('admin');



//ADMIN-jobs

Route::get('/admin/dashboard/jobs/new', [JobController::class, 'addJobsPage'])->name('add-jobs')->middleware('admin');
Route::post('/admin/dashboard/jobs/new/save', [JobController::class, 'saveJobInfo'])->name('save-job')->middleware('admin');
Route::get('/admin/dashboard/jobs/manage', [JobController::class, 'manageJobsPage'])->name('manage-jobs')->middleware('admin');
Route::get('/admin/dashboard/jobs/manage/{id}', [JobController::class, 'viewJobInfo'])->name('view-job')->middleware('admin');
Route::get('/admin/dashboard/jobs/manage/edit/{id}', [JobController::class, 'editJobInfo'])->name('edit-job')->middleware('admin');
Route::post('/admin/dashboard/jobs/manage/edit/{id}', [JobController::class, 'updateJobInfo'])->name('update-job')->middleware('admin');

//ADMIN-jobs Offers
Route::get('/admin/dashboard/job-offers', [AdminController::class, 'viewJobOffersPage'])->name('view-offers-page')->middleware('admin');
Route::get('/admin/dashboard/issuance', [AdminController::class, 'viewIssuancePage'])->name('view-issuance-page')->middleware('admin');
Route::post('/admin/dashboard/issuance/send/{id}', [AdminController::class, 'sendIssuance'])->name('send-issuance')->middleware('admin');

//ADMIN








//APPLICANT 
Route::get('/dashboard', [ApplicantController::class, 'index'])->name('applicant-dashboard')->middleware('applicant');
Route::get('/dashboard/about', [ApplicantController::class, 'aboutPage'])->name('about-us')->middleware('applicant');
Route::get('/dashboard/contact', [ApplicantController::class, 'contactPage'])->name('contact')->middleware('applicant');

//edit profile
Route::get('/dashboard/edit-profile', [ApplicantController::class, 'editProfilePage'])->name('edit-profile')->middleware('applicant');
Route::post('/dashboard/edit-profile', [ApplicantController::class, 'saveEdit'])->name('save-edit')->middleware('applicant');

//APPLICANT-Job
Route::get('/dashboard/careers', [ApplicantController::class, 'careersPage'])->name('careers')->middleware('applicant');
//applicant-search-job
Route::post('/dashboard/careers', [ApplicantController::class, 'searchJob'])->name('search-job')->middleware('applicant');
Route::get('/dashboard/careers/{job_id}', [ApplicantController::class, 'viewCareerInfo'])->name('view-career')->middleware('applicant');
Route::get('/dashboard/careers/{job_id}/apply', [ApplicantController::class, 'applyForCareer'])->name('apply-career')->middleware('applicant');

Route::get('/dashboard/careers/{job_id}/apply/submit', [ApplicantController::class, 'submitApplication'])->name('submit-application')->middleware('applicant');

//Applicant job history
Route::get('/dashboard/applied-jobs', [ApplicantController::class, 'appliedJobsPage'])->name('applied-jobs')->middleware('applicant');


//APPLICANT-PROFILE
Route::get('/dashboard/profile/{id}', [ApplicantController::class, 'profilePage'])->name('profile')->middleware('applicant');
Route::get('/dashboard/profile/{id}/notification/{notifId}', [ApplicantController::class, 'viewNotification'])->name('view-notif')->middleware('applicant');


//APPLICANT ATTACHMENTS
Route::post('/dashboard/profile/attachments/{id}', [DocumentController::class, 'saveDocuments'])->name('save-docs')->middleware('applicant');
Route::post('/dashboard/profile/pre-employment/{id}', [DocumentController::class, 'savePreEmploymentDocs'])->name('save-pre-emp')->middleware('applicant');

//APPLICANT-JOB OFFER
Route::get('/dashboard/joboffer', [JobOfferController::class, 'jobOfferPage'])->name('job-offer')->middleware('applicant');
Route::get('/dashboard/joboffer/{id}/view', [JobOfferController::class, 'viewJobOffer'])->name('view-offer')->middleware('applicant');
Route::post('/dashboard/joboffer/{id}/view/decline', [JobOfferController::class, 'declineJobOffer'])->name('decline-offer')->middleware('applicant');
Route::post('/dashboard/joboffer/{id}/view/accept', [JobOfferController::class, 'acceptJobOffer'])->name('accept-offer')->middleware('applicant');


//applicant-send-mail
Route::post('/dashboard/send-mail', [ApplicantController::class, 'sendMail'])->name('send-mail')->middleware('applicant');


