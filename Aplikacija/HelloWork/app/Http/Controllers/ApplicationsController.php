<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Exception;

class ApplicationsController extends Controller
{
    public function apply(Request $request, Ad $ad){
        try{
            if($ad->users()->where('user_id', auth()->id())->exists()){
                return response()->json(['type' => 'error', 'message' => "Vec ste aplicirali za dati posao"], 400);
            }

            $ad->users()->attach(auth()->id());
            return response()->json(['type' => 'success', 'message' => 'Uspesno ste aplicirali za ovaj posao!'], 200);
        }
        catch(Exception $ex){
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}
