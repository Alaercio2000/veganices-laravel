<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Requests;
use App\Models\Post;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $myRequests = $user->requests()->get();
        $myPosts = $user->post()->get();

        return view('profile.user.index', [
            'user' => $user,
            'myRequests' => $myRequests,
            'myPosts' => $myPosts,
        ]);
    }
}
