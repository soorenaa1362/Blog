<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        dd(auth()->user()->role);
    }


    public function test()
    {
        return view('bootstrapTree.tree');
    }
}
