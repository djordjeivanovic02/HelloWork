<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if ($user->userInfo != null) {
            Carbon::setLocale('sr');
            $formattedDate = '';
            if ($user != null) {
                $date = $user->created_at;
                $formattedDate = Carbon::parse($date)->translatedFormat('d. F Y');
            }

            $responsibilities = [];
            if ($user->userInfo != null && $user->userInfo->responsibilities != null) {
                $responsibilities = explode('&', $user->userInfo->responsibilities);
            }

            $languages = [];
            if ($user->userInfo != null && $user->userInfo->languages != null) {
                $languages = explode('&', $user->userInfo->languages);
            }

            $social = [];
            if ($user->userInfo != null && $user->userInfo->social_medias != null) {
                $social = explode('&', $user->userInfo->social_medias);
            }

            return view('user', [
                'currentUser' => auth()->user(),
                'user' => $user,
                'date' => $formattedDate,
                'responsibilities' => $responsibilities,
                'languages' => $languages,
                'social' => $social
            ]);
        } else {
            return view('index', [
                'user' => auth()->user(),
                'currentUser' => auth()->user()
            ]);
        }
    }

    public function showDashboard()
    {
        $userInfo = auth()->user()->userInfo;
        $languages = $userInfo->languages;
        $languagesArray = [];
        if ($languages != null) {
            $languagesArray = explode('&', $languages);
        }

        $respons = $userInfo->responsibilities;
        $responsibilities = [];
        if ($respons != null) {
            $responsibilities = explode('&', $respons);
        }

        $skills = $userInfo->skills;
        $skillsArray = [];
        if ($skills != null) {
            $skillsArray = explode('&', $skills);
        }

        $socials = $userInfo->social_medias;
        $socialsArray = [];
        if ($socials != null) {
            $socialsArray = explode('&', $socials);
        }

        return view('user-change-profile', [
            'currentUser' => auth()->user(),
            'user' => auth()->user(),
            'languages' => $languagesArray,
            'responsibilities' => $responsibilities,
            'skills' => $skillsArray,
            'socials' => $socialsArray,
        ]);
    }

    public function updateUserData(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required'],
                'professional_title' => ['required'],
                'age' => ['required'],
                'current_salary' => ['required'],
                'expected_salary' => ['required'],
                'education' => ['required'],
                'about' => ['required'],
                'phone' => ['required'],
                'country' => ['required'],
                'postcode' => ['required'],
                'city' => ['required'],
                'full_address' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!', 500]);
            }

            $userInfo = UserInfo::where('user_id', auth()->id())->first();

            if ($userInfo) {
                $userInfo->update([
                    'age' => $request->input('age'),
                    'professional_title' => $request->input('professional_title'),
                    'languages' => $request->input('languages'),
                    'current_salary' => $request->input('current_salary'),
                    'expected_salary' => $request->input('expected_salary'),
                    'phone' => $request->input('phone'),
                    'country' => $request->input('country'),
                    'about' => $request->input('about'),
                    'education' => $request->input('education'),
                    'skills' => $request->input('skills'),
                    'expirience' => $request->input('experience'),
                    'responsibilities' => $request->input('responsibilities'),
                    'postcode' => $request->input('postcode'),
                    'social_medias' => $request->input('social'),
                    'city' => $request->input('city'),
                    'full_address' => $request->input('full_address')
                ]);
            } else {
                $userInfo = UserInfo::create([
                    'user_id' => 2,
                    'age' => $request->input('age'),
                    'professional_title' => $request->input('professional_title'),
                    'languages' => $request->input('languages'),
                    'current_salary' => $request->input('current_salary'),
                    'expected_salary' => $request->input('expected_salary'),
                    'phone' => $request->input('phone'),
                    'country' => $request->input('country'),
                    'about' => $request->input('about'),
                    'education' => $request->input('education'),
                    'skills' => $request->input('skills'),
                    'expirience' => $request->input('experience'),
                    'responsibilities' => $request->input('responsibilities'),
                    'postcode' => $request->input('postcode'),
                    'social_medias' => $request->input('social_medias'),
                    'city' => $request->input('city'),
                    'full_address' => $request->input('full_address')
                ]);
            }
            $userInfo->user->update([
                'name' => $request->input('name')
            ]);
            return response()->json(['type' => 'success', 'message' => 'Uspešno ažurirani korisnikovi podaci'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function deleteProfile(Request $request)
    {
        $user = User::findOrFail($request->input('id'));

        if ($user->delete()) {
            return response()->json(['message' => 'Profil korisnika je uspešno obrisan.'], 200);
        } else {
            return response()->json(['message' => 'Došlo je do greške prilikom brisanja profila korisnika.'], 500);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|min:8|different:old_password',
            ]);
            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!', 500]);
            }

            $user = $request->user();
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['type' => 'wrong-password', 'message' => "Stara lozinka nije ispravna!", 500]);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(['type' => 'success', 'message' => 'Lozinka uspešno promenjena'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function uploadLogo(Request $request)
    {
        try {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $user = auth()->user();
            $userId = auth()->id();
            $userInfo = $user->userInfo;
            $logo = $request->file('logo');
            $imageName = Str::random(20) . "." . $logo->getClientOriginalExtension();
            $logo->storeAs('public/uploads/user_' . $userId . '/logo', $imageName);

            if (!$userInfo) {
                $userInfo = new UserInfo();
                $userInfo->user_id = $user->id;
                $userInfo->save();
            }

            $userInfo->logo = $imageName;
            $userInfo->save();
            return response()->json(['type' => 'success', 'message' => "Uspešno ažuriran logo"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
