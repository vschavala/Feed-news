<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('Profile/profile',["user" => $user]);
    }

    public function update(User $user, Request $request)
    {  
        
        $user->name = $request->name;
        if($request->has('avatar')){
            $this->validate($request, [
                'avatar' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            ]);
            $destination = public_path('avatars').'/'.$user->avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
            $user->avatar = $avatarName;
            $request->avatar->move(public_path('avatars'), $avatarName);
        }
        $user->updated_at = now();
        $user->email = auth()->user()->email;
        $user->update();
        return back()->with('success','Profile Updated!');
    }
}
