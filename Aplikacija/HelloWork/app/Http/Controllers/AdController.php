<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Ad;

class AdController extends Controller
{
    public function show()
    {
        return view('job', [
            'user' => auth()->user()
        ]);
    }

    public function showManageAds()
    {
        $ads = auth()->user()->ads()
            ->withCount('applications')
            ->get();

        return view('company-manage-jobs', [
            'user' => auth()->user(),
            'ads' => $ads
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

            if ($ad->user_id !== auth()->id()) {
                return response()->json(['type' => 'permission-fail', 'message' => 'Nemate prava da obrisete ovaj oglas.'], 403);
            }

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
