<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\LastActivity;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\Ad;

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
