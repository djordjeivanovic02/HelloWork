<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\LastActivity;
use App\Models\SupportMessages;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\Ad;
use Storage;

class AdminController extends Controller
{
    public function show()
    {
        $adsCount = Ad::count();
        $applicationsCount = Application::count();
        $usersCount = User::count();

        $activities = LastActivity::orderByDesc('created_at')->get();

        return view('admin-dashboard', [
            'adsCount' => $adsCount,
            'applicationsCount' => $applicationsCount,
            'usersCount' => $usersCount,
            'activities' => $activities
        ]);
    }

    public function forCheck()
    {
        $newestAdsForCheck = Ad::where('skills', null)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        $newestAdsaccepted = Ad::where('skills', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        $newestAdsRejected = Ad::where('skills', 0)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('admin-for-check', [
            'newestAdsForCheck' => $newestAdsForCheck,
            'newestAdsAccepted' => $newestAdsaccepted,
            'newestAdsRejected' => $newestAdsRejected
        ]);
    }
    public function candidates()
    {
        $users = User::where('type', 1)
            ->withCount('applications')
            ->get();
        return view('/admin-candidates', [
            'users' => $users
        ]);
    }
    public function companies()
    {
        $users = User::where('type', 2)
            ->withCount('ads')
            ->get();
        return view('/admin-company', [
            'users' => $users
        ]);
    }

    public function allAds(Request $request)
    {
        $ads = Ad::orderBy('created_at', 'desc')->paginate(3);
        if ($request->ajax()) {
            return view('parts.admin-ads-list', compact('ads'))->render();
        }
        return view('/admin-all-ads', [
            'ads' => $ads
        ]);
    }
    public function support(Request $request)
    {
        $messages = SupportMessages::orderByRaw('readed ASC')->orderByDesc('created_at')
            ->get();// if ($request->ajax()) {
        //     return view('parts.admin-ads-list', compact('ads'))->render();
        // }
        return view('/admin-support', [
            'messages' => $messages
        ]);
    }
    public function deleteAd(Request $request, $id)
    {
        try {
            $ad = Ad::findOrFail($id);

            if ($ad->image_path) {
                Storage::delete('public/uploads/ads/' . $ad->image_path);
            }

            $ad->delete();

            return response()->json(['type' => 'success', 'message' => 'Oglas uspesno obrisan'], 200);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
    public function approveAd($id)
    {
        try {
            $ad = Ad::where('id', $id)->first();
            if ($ad) {
                $ad->skills = 1;
                $ad->save();
                return response()->json(['type' => 'success', 'message' => 'Uspešno ste odobrili posao!'], 200);
            }
            return response()->json(['type' => 'error', 'message' => 'Posao ne postoji'], 400);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }

    public function rejectAd($id)
    {
        try {
            $ad = Ad::where('id', $id)->first();
            if ($ad) {
                $ad->skills = 0;
                $ad->save();
                return response()->json(['type' => 'success', 'message' => 'Uspešno ste odbili posao!'], 200);
            }
            return response()->json(['type' => 'error', 'message' => 'Posao ne postoji'], 400);
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
