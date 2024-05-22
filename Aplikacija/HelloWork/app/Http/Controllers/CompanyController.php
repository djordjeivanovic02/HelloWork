<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CompanyInfo;
use Exception;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function show(){
        return view('company', ['user' => auth()->user()]);
    }
    public function updateCompanyData(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'size' => ['required'],
                'country' => ['required'],
                'city' => ['required'],
                'address' => ['required'],
                'about' => ['required'],
                'start_date' => ['required', 'date'],
                'contact' => ['required', 'email'],
                'links' => ['required'],
                'category' => ['required'],
                'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'] // Dodaj validaciju za slike
            ]);

            $userId = auth()->id();
            $companyInfo = CompanyInfo::where('user_id', $userId)->first();

            if ($companyInfo) {
                $companyInfo->update($request->only(['size', 'country', 'city', 'address', 'about', 'start_date', 'contact', 'links', 'category']));
                $companyInfo->company->update(['name' => $request->input('name')]);
            } else {
                $companyInfo = CompanyInfo::create(array_merge($request->only(['size', 'country', 'city', 'address', 'about', 'start_date', 'contact', 'links', 'category']), ['user_id' => $userId]));
            }

            $folderPath = 'uploads/company_' . $userId;
            if (!Storage::exists($folderPath)) {
                Storage::makeDirectory($folderPath);
            }

            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs($folderPath, $imageName);
            }
            return response()->json(['message' => 'Uspešno ažurirani podaci o kompaniji i sačuvane slike'], 200);
        } catch (Exception $ex) {
            // Greška
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    
    public function uploadLogo(Request $request){
        try{
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $user = auth()->user();
            $companyInfo = $user->companyInfo;
            $logo = $request->file('logo');
            $imageName = Str::random(20) . "." . $logo->getClientOriginalExtension();
            $logo->storeAs('public/uploads/logo', $imageName);
            
            if(!$companyInfo){
                $companyInfo = new CompanyInfo();
                $companyInfo->user_id = $user->id;
                $companyInfo->save();
            }

            $companyInfo->logo = $imageName;
            $companyInfo->save();
            return response()->json(['type' => 'success', 'message' => "Uspešno ažuriran logo"], 200);
        }
        catch(Exception $ex){
            return response()->json(['type' => 'error', 'message' => $ex->getMessage()], 500);
        }
    }
}