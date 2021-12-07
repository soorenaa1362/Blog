<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        return view('admin.users.index', compact('users'));
    }


    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request)
    {
        dd($request->all());
    }
}
