<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\City;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view("user.index",compact('user'));
    }

    public function cart()
    {
        $user = Auth::user();
        return view("user.index",compact('user'));
    }


}
