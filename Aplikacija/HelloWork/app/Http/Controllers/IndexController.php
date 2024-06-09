<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $ads = Ad::orderBy('created_at', 'desc')->where('skills', 1)->take(6)->get();
        return view('index', [
            'currentUser' => auth()->user(),
            'user' => auth()->user(),
            'ads' => $ads
        ]);
    }
}
