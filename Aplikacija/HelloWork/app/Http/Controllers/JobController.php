<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function show(){
        return view('job', [
            'user' => auth()->user()
        ]);
    }
}
