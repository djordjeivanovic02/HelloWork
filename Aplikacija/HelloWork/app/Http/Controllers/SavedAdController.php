<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\SavedAd;
use Exception;
use Illuminate\Http\Request;

class SavedAdController extends Controller
{

    public function show()
    {
        $savedAds = auth()->user()->savedAds;
        foreach ($savedAds as $item) {
            $item->companyInfo = CompanyInfo::where('user_id', $item->ad->user_id)->get();
        }
        return view('user-saved', [
            'user' => auth()->user(),
            'savedAds' => $savedAds,
        ]);
    }

    public function saveAd(Request $request)
    {
        try {
            validator(request()->all(), [
                'ad_id' => ['required']
            ]);
            $exist = SavedAd::where('user_id', auth()->id())
                ->where('ad_id', $request->input('ad_id'))
                ->exists();
            if ($exist)
                return $this->deleteSavedAd($request);

            SavedAd::create([
                'user_id' => auth()->id(),
                'ad_id' => $request->input('ad_id'),
                'save_date' => now()
            ]);
            return response()->json(['type' => 'success', 'message' => 'Uspešno sačuvan oglas'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage(), 500]);
        }
    }

    public function checkIsSaved(Request $request)
    {
        try {
            validator(request()->all(), [
                'ad_id' => ['required']
            ]);
            $exist = SavedAd::where('user_id', auth()->id())
                ->where('ad_id', $request->input('ad_id'))
                ->exists();
            return response()->json(['type' => 'success', 'message' => $exist], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage(), 500]);
        }
    }

    public function deleteSavedAd(Request $request)
    {
        try {
            validator(request()->all(), [
                'ad_id' => ['required']
            ]);

            $exists = SavedAd::where('user_id', auth()->id())
                ->where('ad_id', $request->input('ad_id'))
                ->exists();
            if ($exists) {
                SavedAd::where('user_id', auth()->id())
                    ->where('ad_id', $request->input('ad_id'))
                    ->delete();
                return response()->json(['type' => 'success', 'message' => "Uspešno obrisan oglas"], 200);
            }
            return response()->json(['type' => 'not-exist', 'message' => "Oglas ne postoji"], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage(), 500]);
        }
    }
}
