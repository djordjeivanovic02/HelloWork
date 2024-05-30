<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Ad;
use Exception;
use Validator;
use DB;

class ApplicationsController extends Controller
{
    public function apply(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!'], 400);
            }

            $id = $request->id;
            $user = auth()->user();

            if (!$user) {
                return response()->json(['type' => 'error', 'message' => 'Niste prijavljeni!'], 401);
            }

            $applications = $user->appliedAds()
                ->where('ad_id', $id)
                ->exists();

            if ($applications) {
                return response()->json(['type' => 'error', 'message' => 'Već ste aplicirali za dati posao'], 400);
            } else {
                $appl = new Application();
                $appl->user_id = $user->id;
                $appl->ad_id = $id;
                $appl->save();

                return response()->json(['type' => 'success', 'message' => 'Uspešno ste aplicirali za ovaj posao!'], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
    public function cancelApply(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!'], 400);
            }

            $id = $request->id;
            $user = auth()->user();

            if (!$user) {
                return response()->json(['type' => 'error', 'message' => 'Niste prijavljeni!'], 401);
            }

            $application = $user->appliedAds()
                ->where('ad_id', $id)
                ->first();

            if (!$application) {
                return response()->json(['type' => 'error', 'message' => 'Niste aplicirali za ovaj posao'], 400);
            } else {
                // echo $application->id;
                // return response()->json(['type' => 'success', 'message' => $application->id], 200);
                Application::where('ad_id', $id)
                    ->where('user_id', auth()->id())
                    ->forceDelete();

                return response()->json(['type' => 'success', 'message' => 'Uspešno ste otkazali aplikaciju za ovaj posao!'], 200);
            }
        } catch (Exception $ex) {
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
