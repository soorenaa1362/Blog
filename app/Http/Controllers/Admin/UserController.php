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
        // $user_id = Auth::user()->id;
        // $users = User::where('id', '!=', $user_id)->get();
        $users = User::orderBy('id', 'ASC')->get();
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50',
            'mobile' => 'required|numeric',
        ]);

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        
        $msg = 'کاربر مورد نظر با موفقیت ویرایش شد.';
        return redirect(route('admin.users.index'))->with('success', $msg);

    }



    public function destroy(User $user)
    {
        // User::destory($user->id);
        $user->delete();
        $msg = "کاربر مورد نظر با موفقیت حذف شد.";
        return redirect(route('admin.users.index'))->with('warning', $msg);
    }


    public function status(User $user)
    {

    }

}
