<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    public function show(){
        return view('job', [
            'user' => auth()->user()
        ]);
    }

    public function createAd(Request $request){
        try{
            
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage(), 500]);
        }
    }
}
