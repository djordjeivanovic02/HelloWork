<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show(){
        return view('company', ['user' => auth()->user()]);
    }
}
