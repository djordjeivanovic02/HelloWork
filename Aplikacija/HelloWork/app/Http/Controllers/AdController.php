<?php

namespace App\Http\Controllers;

use App\Models\SavedAd;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Ad;

class AdController extends Controller
{
    public function show($id)
    {
        $ad = Ad::find($id);
        if ($ad != null) {
            $social = [];
            if ($ad->users->companyInfo != null && $ad->users->companyInfo->links != null) {
                $social = explode(',', $ad->users->companyInfo->links);
            }
            $isSaved = false;
            $applications = false;
            if (auth()->user()) {
                $isSaved = SavedAd::where('user_id', auth()->user()->id)
                    ->where('ad_id', $ad->id)
                    ->exists();

                $applications = auth()->user()->appliedAds()
                    ->where('ad_id', $id)
                    ->exists();
            }

            return view('job', [
                'currentUser' => auth()->user(),
                'ad' => $ad,
                'social' => $social,
                'isSaved' => $isSaved,
                'isApplied' => $applications,
            ]);
        } else {
            return view('index', [
                'user' => auth()->user(),
                'currentUser' => auth()->user()
            ]);

        }
    }

    public function showManageAds()
    {
        $ads = auth()->user()->ads()
            ->withCount('applications')
            ->get();

        return view('company-manage-jobs', [
            'currentUser' => auth()->user(),
            'user' => auth()->user(),
            'ads' => $ads
        ]);
    }

    public function showSearchJob(Request $request)
    {
        $query = Ad::query();

        // Filtriranje po nazivu posla ili kompanije
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhereHas('users', function ($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->search . '%');
                    });
            });
        }

        // Filtriranje po lokaciji
        if ($request->has('location') && !empty($request->location)) {
            $query->whereHas('users.companyInfo', function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%');
            });
        }

        // Filtriranje po veštinama
        if ($request->has('skills') && !empty($request->skills)) {
            $query->where('tabs', 'like', '%' . $request->skills . '%');
        }

        // Filtriranje po kategoriji posla
        if ($request->has('jobCategory') && !empty($request->jobCategory)) {
            $query->where('job_category', $request->jobCategory);
        }

        // Filtriranje po tipu posla
        $jobTypes = [];
        if ($request->has('fullTime')) {
            $jobTypes[] = 1;
        }
        if ($request->has('partTime')) {
            $jobTypes[] = 2;
        }
        if (!empty($jobTypes)) {
            $query->whereIn('job_type', $jobTypes);
        }

        // Filtriranje po načinu plaćanja
        if ($request->hasAny(['dailyPay', 'mountlyPay', 'yearlyPay'])) {
            $paymentMethods = [];
            if ($request->has('dailyPay')) {
                $paymentMethods[] = 1;
            }
            if ($request->has('mountlyPay')) {
                $paymentMethods[] = 2;
            }
            if ($request->has('yearlyPay')) {
                $paymentMethods[] = 3;
            }
            $query->whereIn('payment_method', $paymentMethods);
        }

        // Filtriranje po ceni
        if ($request->has('minPrice') && !empty($request->minPrice)) {
            $query->where('min_salary', '>=', $request->minPrice * 1000);
        }

        if ($request->has('maxPrice') && !empty($request->maxPrice)) {
            $query->where('max_salary', '<=', $request->maxPrice * 1000);
        }

        // Primeni sortiranje
        if ($request->has('sorting')) {
            switch ($request->sorting) {
                case 0:
                    $query->orderBy('title', 'desc');
                    break;
                case 1:
                    $query->orderBy('created_at', 'desc');
                    break;
                case 2:
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }
        $query->where('skills', 1);
        // Paginacija
        $adsCount = $query->count();
        $ads = $query->paginate(3)->appends($request->except('page'));
        // dd($ads);
        if ($request->ajax()) {
            return view('parts.job-list', compact('ads'))->render();
        }
        return view('search-jobs', [
            'currentUser' => auth()->user(),
            'user' => auth()->user(),
            'ads' => $ads,
            'adsCount' => $adsCount,
        ]);
    }

    public function createAd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => ['required'],
                'address' => ['required'],
                'job_type' => ['required'],
                'min_salary' => ['required'],
                'max_salary' => ['required'],
                'job_category' => ['required'],
                'working_time' => ['required'],
                'number_of_jobs_needed' => ['required'],
                'payment_method' => ['required'],
                'description' => ['required'],
                'ad_duration' => ['required']
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!', 500]);
            }

            $ad = new Ad();
            $ad->user_id = auth()->id();
            $ad->title = $request->title;
            $ad->address = $request->address;
            $ad->job_type = $request->job_type;
            $ad->min_salary = $request->min_salary;
            $ad->max_salary = $request->max_salary;
            $ad->job_category = $request->job_category;
            $ad->responsibilities = $request->responsibilities;
            $ad->experience = $request->experience;
            $ad->skills = $request->skills;
            $ad->working_time = $request->working_time;
            $ad->number_of_jobs_needed = $request->number_of_jobs_needed;
            $ad->payment_method = $request->payment_method;
            $ad->description = $request->description;
            $ad->ad_duration = $request->ad_duration;
            $ad->tabs = $request->tabs;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Str::random(20) . '.' . $image->extension();
                $image->storeAs('public/uploads/ads', $imageName);
                $ad->image = $imageName;
            }

            Auth::user()->logActivity('created_ad', auth()->user()->name . ' je dodao novi oglas: ' . $ad->title);
            $ad->save();

            return response()->json(['type' => 'success', 'message' => 'Oglas je uspesno kreiran', 'ad' => $ad], 201);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }


    }

    public function deleteAd(Request $request, $id)
    {
        try {
            $ad = Ad::findOrFail($id);

            // if ($ad->user_id !== auth()->id()) {
            //     return response()->json(['type' => 'permission-fail', 'message' => 'Nemate prava da obrisete ovaj oglas.'], 403);
            // }

            if ($ad->image_path) {
                Storage::delete('public/uploads/ads/' . $ad->image_path);
            }

            $ad->delete();

            return response()->json(['type' => 'success', 'message' => 'Oglas uspesno obrisan'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
