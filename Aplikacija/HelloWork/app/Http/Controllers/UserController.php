<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use Exception;

class UserController extends Controller
{
    public function show(){
        return view('user-profile');
    }

    public function updateUserData(Request $request){
        try{
            validator(request()->all(), [
                'name' => ['required'],
                'professional_title' => ['required'],
                'languages' => ['required'],
                'age' => ['required'],
                'phone' => ['required', 'regex:/^\+(?:[0-9] ?){6,14}[0-9]$/'],
                'email' => ['required', 'email'],
                'country' => ['required'],
                'city' => ['required']
            ]);
            $userInfo = UserInfo::where('user_id', auth()->id())->first();

            if($userInfo != null){
                $userInfo->update([
                    'professional_title' => $request->input('professional_title'),
                    'languages' => $request->input('languages'),
                    'current_salary' => $request->input('current_salary'),
                    'expected_salary' => $request->input('expected_salary'),
                    'phone' => $request->input('phone'),
                    'country' => $request->input('country'),
                    'postcode' => $request->input('postcode'),
                    'city' => $request->input('city'),
                    'full_address' => $request->input('full_address')
                ]);
            }else{
                $userInfo = UserInfo::create([
                    'user_id' => auth()->id(),
                    'professional_title' => $request->input('professional_title'),
                    'languages' => $request->input('languages'),
                    'current_salary' => $request->input('current_salary'),
                    'expected_salary' => $request->input('expected_salary'),
                    'phone' => $request->input('phone'),
                    'country' => $request->input('country'),
                    'postcode' => $request->input('postcode'),
                    'city' => $request->input('city'),
                    'full_address' => $request->input('full_address')
                ]);
            }
            return response()->json(['message' => 'Uspešno ažurirani korisnikovi podaci'], 200);
        }catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage(), 500]);
        }
    }
}
