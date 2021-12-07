<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        
        return view('site.index');
    }
}
