<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Controllers\EducationController;

class AddressController extends Controller
{
    public function saveAddressInfo(Request $request, $user){
        Address::create([
            'house_number' => $request->house_num,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
            'user_id' => $user->id,
        ]);
        app(EducationController::class)->saveEducationInfo($request, $user);

    }   
}
