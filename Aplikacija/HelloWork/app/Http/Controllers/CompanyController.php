<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\SavedAd;
use App\Models\User;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CompanyInfo;
use Exception;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function show($id)
    {
        $company = User::find($id);
        if ($company != null) {
            $ads = $company->ads;

            $folderPath = public_path('storage/uploads/company_' . $id . '/images/');
            $images = [];
            if (File::exists($folderPath)) {

                $files = File::files($folderPath);
                foreach ($files as $file) {
                    $images[] = asset('storage/uploads/company_' . $id . '/images/' . $file->getFilename());
                }
            }

            $todayAds = 0;
            foreach ($ads as $item) {
                if (Carbon::parse($item->created_at)->isToday()) {
                    $todayAds++;
                }
                $savedAds[$item->id] = SavedAd::where('user_id', auth()->id())
                    ->where('ad_id', $item->id)
                    ->exists() ? true : false;
            }

            $social = [];
            if ($company->companyInfo != null && $company->companyInfo->links != null) {
                $social = explode(',', $company->companyInfo->links);
            }

            return view('company', [
                'currentUser' => auth()->user(),
                'company' => $company,
                'ads' => $ads,
                'images' => $images,
                'todayAds' => $todayAds,
                'social' => $social,
                'savedAds' => $savedAds
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
        $folderPath = public_path('storage/uploads/company_' . auth()->id() . '/images/');
        $images = [];
        if (File::exists($folderPath)) {

            $files = File::files($folderPath);
            foreach ($files as $file) {
                $images[] = asset('storage/uploads/company_' . auth()->id() . '/images/' . $file->getFilename());
            }
        }

        $socialNetworks = [];
        if (auth()->user()->companyInfo != null) {
            $data = auth()->user()->companyInfo->links;
            if ($data != null) {
                $dataArray = explode(',', $data);
                $socialNetworks = $dataArray;
            }
        }

        return view('company-change-profile', [
            'user' => auth()->user(),
            'currentUser' => auth()->user(),
            'images' => $images,
            'socialNetworks' => $socialNetworks,
        ]);
    }

    public function showApplications()
    {
        $user = auth()->user();

        $allApplications = collect();
        $applicationsByAd = collect();
        $ads = $user->ads;

        foreach ($ads as $ad) {
            $applications = $ad->applications()->with('user')->get();
            $allApplications = $allApplications->merge($applications);
            $applicationsByAd->put($ad->id, $applications);
        }

        return view('/company-applications', [
            'currentUser' => $user,
            'user' => $user,
            'allApplications' => $allApplications,
            'applicationsByAd' => $applicationsByAd,
            'ads' => $ads
        ]);
    }

    public function updateCompanyData(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'size' => ['required'],
                'country' => ['required'],
                'city' => ['required'],
                'address' => ['required'],
                'about' => ['required'],
                'start_date' => ['required', 'date'],
                'contact' => ['required'],
                'links' => ['required'],
                'category' => ['required'],
                // 'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] // Dodaj validaciju za slike
            ]);

            $userId = auth()->id();
            $companyInfo = CompanyInfo::where('user_id', $userId)->first();
            // print_r($companyInfo);
            if ($companyInfo) {
                $companyInfo->update($request->only(['size', 'country', 'city', 'address', 'about', 'start_date', 'contact', 'website', 'links', 'category']));
                // print_r($companyInfo->company()->name);
                $userProfile = User::where('id', $userId)->first();
                $userProfile->update(['name' => $request->input('name')]);
            } else {
                $companyInfo = CompanyInfo::create(array_merge($request->only(['size', 'country', 'city', 'address', 'about', 'start_date', 'contact', 'website', 'links', 'category']), ['user_id' => $userId]));
            }

            $folderPath = 'public/uploads/company_' . $userId . '/images';

            if (Storage::exists($folderPath)) {
                Storage::deleteDirectory($folderPath);
            }
            if (!Storage::exists($folderPath)) {
                Storage::makeDirectory($folderPath);
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $imageName = $image->getClientOriginalName();
                        $image->storeAs($folderPath, $imageName);
                    }
                }
            }

            return response()->json(['type' => 'success', 'message' => 'Uspešno ažurirani podaci o kompaniji i sačuvane slike'], 200);
        } catch (Exception $ex) {
            // Greška
            return response()->json(['type' => 'success', 'message' => $ex->getMessage()], 500);
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
            $companyInfo = $user->companyInfo;
            $logo = $request->file('logo');
            $imageName = Str::random(20) . "." . $logo->getClientOriginalExtension();
            $logo->storeAs('public/uploads/company_' . $userId . '/logo', $imageName);

            if (!$companyInfo) {
                $companyInfo = new CompanyInfo();
                $companyInfo->user_id = $user->id;
                $companyInfo->save();
            }

            $companyInfo->logo = $imageName;
            $companyInfo->save();
            return response()->json(['type' => 'success', 'message' => "Uspešno ažuriran logo"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
