<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewJobController extends Controller
{
    public function show(){
        return view('new-job', 
        [
            'user' => auth()->user()
        ]);
    }
}
