<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    
    public function update(Request $request, User $user)
    {
        if(!empty($request->password)){
            $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric',  
                'password' => ['required', 'string', 'min:8', 'confirmed'],          
            ]);
            $password = Hash::make($request->password);
            $user->password = $password;
        }else{
            $request->validate([
                'name' => 'required',
                'mobile' => 'required|numeric',            
            ]);
        }

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->save();

        $msg = "پروفایل با موفقیت ویرایش شد.";
        return redirect(route('site.index'))->with('success', $msg);

       
        

    }

   
}
