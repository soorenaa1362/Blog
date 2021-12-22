<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $parentExperts = Expert::where('expert_id', 0)->get();
        return view('expert.expertTreeview', compact('parentExperts'));
    }
 
}
