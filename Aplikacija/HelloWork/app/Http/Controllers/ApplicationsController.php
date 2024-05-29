<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Ad;
use Exception;
use Validator;

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
}
