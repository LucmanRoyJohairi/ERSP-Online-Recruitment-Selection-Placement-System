<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Course;
use App\Models\Qualification;
use App\Http\Controllers\EligibilityController;


class EducationController extends Controller
{
    public function saveEducationInfo(Request $request, $user){
       
        $edu = Education::create([
            'school' => $request->school,
            'user_id' => $user->id,
            
        ]);
        Course::create([
            'course_name' => $request->course,
            'education_id' => $edu->id,
            'user_id' => $user->id,

        ]);
        if(is_null($request->qualification_text)){
            Qualification::create([
            
                'qualification_name' => $request->qualification,
                'education_id' => $edu->id,
                'user_id' => $user->id,

            ]);

        }else{
            Qualification::create([
            
                'qualification_name' => $request->qualification_text,
                'education_id' => $edu->id,
                'user_id' => $user->id,

            ]);

        }
        
        app(EligibilityController::class)->saveEligibilityInfo($request, $user);

        

    }
}
