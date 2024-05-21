<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Ad;

class AdController extends Controller
{
    public function show(){
        return view('job', [
            'user' => auth()->user()
        ]);
    }

    public function createAd(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required|exists:users,id',
                'title' => 'required|string',
                'address' => 'required|string',
                'job_type' => 'required|string',
                'min_salary' => 'required|numeric',
                'max_salary' => 'required|numeric',
                'job_category' => 'required|string',
                'working_time' => 'required|string',
                'number_of_jobs_needed' => 'required|integer',
                'payment_method' => 'required|string',
                'description' => 'required|string',
                'ad_duration' => 'required|integer',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($validator->fails()){
                return response()->json(['type' => 'invalid-data', 'message' => 'Neispravni podaci!', 500]);
            }

            $ad = new Ad();
            $ad->user_id = $request->user_id;
            $ad->title = $request->title;
            $ad->address = $request->address;
            $ad->job_type = $request->job_type;
            $ad->min_salary = $request->min_salary;
            $ad->max_salary = $request->max_salary;
            $ad->job_category = $request->job_category;
            $ad->working_time = $request->working_time;
            $ad->number_of_jobs_needed = $request->number_of_jobs_needed;
            $ad->payment_method = $request->payment_method;
            $ad->description = $request->description;
            $ad->ad_duration = $request->ad_duration;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Str::random(20).'.'.$image->extension();
                $image->storeAs('public/uploads/ads', $imageName);
                $ad->image = $imageName;
            }

            $ad->save();

            return response()->json(['message' => 'Oglas je uspesno kreiran', 'ad' => $ad], 201);
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function deleteAd(Request $request, $id){
        try{
            $ad = Ad::findOrFail($id);

            if ($ad->user_id !== auth()->id()) {
                return response()->json(['message' => 'Nemate prava da obrisete ovaj oglas.'], 403);
            }

            if ($ad->image_path) {
                Storage::delete('public/uploads/ads/' . $ad->image_path);
            }

            $ad->delete();

            return response()->json(['message' => 'Oglas uspesno obrisan'], 200);
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
