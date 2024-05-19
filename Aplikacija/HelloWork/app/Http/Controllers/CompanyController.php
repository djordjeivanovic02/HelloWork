<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CompanyInfo;
use Exception;

class CompanyController extends Controller
{
    public function show(){
        return view('company', ['user' => auth()->user()]);
    }
    public function updateCompanyData(Request $request){
        try{
            validator(request()->all(), [
                'name' => ['required'],
                'size' => ['required'],
                'address' => ['required'],
                'about' => ['required'],
                'start_date' => ['required', 'date'],
                'contact' => ['required', 'email'],
                'links' => ['required'],
                'activity' => ['required']
            ]);
    
            $companyInfo = CompanyInfo::where('user_id', auth()->id())->first();
    
            if($companyInfo){
                $companyInfo->update([
                    'size' => $request->input('size'),
                    'address' => $request->input('address'),
                    'about' => $request->input('about'),
                    'start_date' => $request->input('start_date'),
                    'contact' => $request->input('contact'),
                    'links' => $request->input('links'),
                    'activity' => $request->input('activity')
                ]);
            }else{
                $companyInfo = CompanyInfo::create([
                    'user_id' => auth()->id(),
                    'name' => $request->input('name'),
                    'size' => $request->input('size'),
                    'address' => $request->input('address'),
                    'about' => $request->input('about'),
                    'start_date' => $request->input('start_date'),
                    'contact' => $request->input('contact'),
                    'links' => $request->input('links'),
                    'activity' => $request->input('activity')
                ]);
            }
            $companyInfo->company->update([
                'name' => $request->input('name')
            ]);
            return response()->json(['message' => 'Uspešno ažurirani podaci o kompaniji'], 200);
        }catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage(), 500]);
        }
    }
    
    public function uploadLogo(Request $request){
        try{
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $user = auth()->user();
            $companyInfo = $user->companyInfo;
            $logo = $request->file('image');
            $imageName = Str::random(20) . "." . $logo->getClientOriginalExtension();
            $logo->storeAs('public/uploads/logo', $imageName);
            
            if(!$companyInfo){
                $companyInfo = new CompanyInfo();
                $companyInfo->user_id = $user->id;
                $companyInfo->save();
            }

            $companyInfo->logo = $imageName;
            $companyInfo->save();
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}