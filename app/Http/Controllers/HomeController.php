<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Provider;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
}
