<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function saveExperienceInfo(Request $request, $user){
        Experience::create([
            'job_title' => $request->jobtitle,
            'company' => $request->company,
            'total_years' => $request->years,
            'email' => $request->refEmail,
            'user_id' => $user->id,
        ]);
    }
}
