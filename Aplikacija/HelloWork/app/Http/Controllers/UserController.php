<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\UserPreviousJobs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

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

        $languagesArray = [];
        $responsibilities = [];
        $skillsArray = [];
        $socialsArray = [];

        if ($userInfo) {
            $languages = $userInfo->languages;
            if ($languages != null) {
                $languagesArray = explode('&', $languages);
            }

            $respons = $userInfo->responsibilities;
            if ($respons != null) {
                $responsibilities = explode('&', $respons);
            }

            $skills = $userInfo->skills;
            if ($skills != null) {
                $skillsArray = explode('&', $skills);
            }

            $socials = $userInfo->social_medias;
            if ($socials != null) {
                $socialsArray = explode('&', $socials);
            }
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

    public function showUserCV()
    {
        $user = auth()->user();
        $cv = null;
        if ($user->userInfo) {
            $cv = $user->userInfo->cv;
        }
        return view('/user-cv', [
            'currentUser' => $user,
            'user' => $user,
            'cv' => $cv,
        ]);
    }

    public function showApplications()
    {
        $user = auth()->user();
        $applications = Application::where('user_id', $user->id)
            // ->orderByRaw("FIELD(status, 'accepted', 'rejected', 'pending')")
            ->orderByDesc('updated_at')
            ->get();

        $accepted = Application::where('user_id', $user->id)
            ->where('status', 'accepted')
            ->orderByDesc('updated_at')
            ->get();

        $rejected = Application::where('user_id', $user->id)
            ->where('status', 'rejected')
            ->orderByDesc('updated_at')
            ->get();

        $active = Application::where('user_id', $user->id)
            ->where('status', 'pending')
            ->orderByDesc('updated_at')
            ->get();
        return view('/user-applications', [
            'currentUser' => $user,
            'user' => $user,
            'applications' => $applications,
            'accepted' => $accepted,
            'rejected' => $rejected,
            'active' => $active
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
                    'user_id' => auth()->id(),
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

    public function deleteProfile($id)
    {
        try {
            DB::beginTransaction();

            $user = User::find($id);

            if (!$user) {
                return response()->json(['type' => 'error', 'message' => 'Korisnik nije pronađen.'], 404);
            }

            // Brisanje povezanih aplikacija
            $user->applications()->delete();

            // Brisanje korisnika
            $user->delete();

            DB::commit();

            return response()->json(['type' => 'success', 'message' => 'Profil korisnika je uspešno obrisan.'], 200);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
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

    public function resetPassword(Request $request)
    {
        try {
            $id = $request->input('id');
            $password = $request->input('password');

            $user = User::where('id', $id)->first();
            if ($user) {
                $user->password = Hash::make($password);
                $user->save();
                return response()->json(['type' => 'success', 'message' => 'Lozinka uspešno promenjena'], 200);
            } else {
                return response()->json(['type' => 'error', 'message' => "Doslo je do greske"], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
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

    public function uploadCV(Request $request)
    {
        try {
            $request->validate([
                'cv' => 'required|file|mimes:pdf|max:2048',
            ]);

            $user = auth()->user();
            $cv = $request->file('cv');

            $folderPath = 'public/uploads/user_' . $user->id . '/cv';

            if (Storage::exists($folderPath))
                Storage::deleteDirectory($folderPath);

            if (!Storage::exists($folderPath))
                Storage::makeDirectory($folderPath);

            $userInfo = $user->userInfo;

            if (!$userInfo) {
                $userInfo = new UserInfo();
                $userInfo->user_id = $user->id;
                $userInfo->save();
            }

            $fileName = Str::random(20) . "." . $cv->getClientOriginalExtension();
            $userInfo->cv = $fileName;
            $userInfo->save();

            $cv->storeAs($folderPath . '/' . $fileName);
            return response()->json(['type' => 'success', 'message' => "Uspešno sačuvan cv"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function deleteCV(Request $request)
    {
        try {
            $user = auth()->user();

            $folderPath = 'public/uploads/user_' . $user->id . '/cv';

            if (Storage::exists($folderPath))
                Storage::deleteDirectory($folderPath);

            $userInfo = $user->userInfo;
            $userInfo->cv = null;
            $userInfo->save();

            return response()->json(['type' => 'success', 'message' => "Uspešno obrisan cv"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function addPreviousJob(Request $request)
    {
        try {
            $prevJob = new UserPreviousJobs();
            $prevJob->job_title = $request->input('previousTitle');
            $prevJob->company_name = $request->input('previousCompany');
            $prevJob->start_year = $request->input('previousStart');
            $prevJob->end_year = $request->input('previousEnd');
            $prevJob->created_at = now();
            $prevJob->user()->associate(auth()->user());

            $prevJob->save();
            return response()->json(['type' => 'success', 'message' => "Uspešno dodat posao"], 200);

        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
        }
    }

    public function deletePreviousJob($id)
    {
        try {
            $previousJob = UserPreviousJobs::find($id);

            if (!$previousJob || $previousJob->user_id != auth()->id()) {
                return response()->json(['type' => 'error', 'message' => 'Posao nije pronađen ili ne pripada korisniku.'], 404);
            }

            $previousJob->delete();
            return response()->json(['type' => 'success', 'message' => "Uspešno obrisan prethodni posao"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 200);
        }
    }
}
