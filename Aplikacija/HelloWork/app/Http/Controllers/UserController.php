<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            $userInfo = UserInfo::where('user_id', 2)->first();

            if($userInfo){
                $userInfo->update([
                    'age' => $request->input('age'),
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
                    'user_id' => 2,
                    'age' => $request->input('age'),
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
            $userInfo->user->update([
                'name' => $request->input('name')
            ]);
            return response()->json(['message' => 'Uspešno ažurirani korisnikovi podaci'], 200);
        }catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage(), 500]);
        }
    }

    public function deleteProfile(Request $request){
        $user = User::findOrFail($request->input('id'));

        if($user->delete()){
            return response()->json(['message' => 'Profil korisnika je uspešno obrisan.'], 200);
        }
        else{
            return response()->json(['message' => 'Došlo je do greške prilikom brisanja profila korisnika.'], 500);
        }
    }
}
