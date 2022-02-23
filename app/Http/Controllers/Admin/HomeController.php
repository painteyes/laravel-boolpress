<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Auth user
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        
        $user_info = $user->UserInfo;

        return view('admin.home', compact('user', 'user_info'));
    }
}
