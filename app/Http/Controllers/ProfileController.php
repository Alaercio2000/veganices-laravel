<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile.index');
    }

    public function uploadImage(Request $request){

        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $imageName = Auth::user()->id.'.'.$request->file->extension();

        $request->file->move(public_path('app/avatar'),$imageName);
    }

    public function deleteImage($id){

        $user = User::find($id);

        if ($user->id == Auth::user()->id) {
            $user->avatar = null;
            $user->save();
        }

        return back();
    }
}
