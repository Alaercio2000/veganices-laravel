<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function uploadImageProfile(Request $request , $route)
    {

        $request->validate([
            'uploadImage' => 'required|image|mimes:jpeg,jpg,svg,png'
        ]);

        $imageName = Auth::user()->id . '.jpg';

        $request->uploadImage->move(public_path('app/avatar/'), $imageName);

        $user = User::find(Auth::user()->id);
        $user->avatar = $imageName;
        $user->save();

        return redirect()->route($route);
    }

    public function deleteImage($id , $route)
    {

        $user = User::find($id);

        if ($user->id == Auth::user()->id) {
            $user->avatar = null;
            $user->save();
        }

        return redirect()->route($route);
    }
}
