<?php

namespace App\Http\Controllers;

use App\Models\Interest;

class InterestsController extends Controller
{
    public function showInterests()
    {
        $interests = Interest::INTERESTS;
        
        return view('interests', compact('interests'));
    }
}

