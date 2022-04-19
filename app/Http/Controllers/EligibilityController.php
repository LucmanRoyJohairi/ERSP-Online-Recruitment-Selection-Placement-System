<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eligibility;
use App\Http\Controllers\ExperienceController;

class EligibilityController extends Controller
{
    public function saveEligibilityInfo(Request $request, $user){
        foreach($request->eligibility as $elig){
            
            Eligibility::create([
                'eligibility_name' =>$elig,
                'user_id' => $user->id, 

            ]);
        }
        app(ExperienceController::class)->saveExperienceInfo($request, $user);

    }
}
