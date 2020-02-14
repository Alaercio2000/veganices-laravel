<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Requests;
use App\Models\Post;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:is-user');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $myRequests = Requests::where('user_id',$user->id)->get();
        $myPosts = Post::where('user_id',$user->id)->get();

        $srcImg = 'default.jpg';

        if ($user->avatar) {
            $srcImg = $user->avatar;
        }
        return view('profile.index', [
            'user' => $user,
            'srcImg' => $srcImg,
            'myRequests' => $myRequests,
            'myPosts' => $myPosts,
        ]);
    }

    public function uploadImage(Request $request)
    {

        $request->validate([
            'uploadImage' => 'required|image|mimes:jpeg,jpg,svg,png'
        ]);

        $imageName = Auth::user()->id . '.jpg';

        $request->uploadImage->move(public_path('app/avatar/'), $imageName);

        $user = User::find(Auth::user()->id);
        $user->avatar = $imageName;
        $user->save();

        return redirect()->route('profile');
    }

    public function deleteImage($id)
    {

        $user = User::find($id);

        if ($user->id == Auth::user()->id) {
            $user->avatar = null;
            $user->save();
        }

        return back();
    }
}
