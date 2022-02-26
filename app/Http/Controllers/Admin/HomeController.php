<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ----------------------------
use Illuminate\Support\Facades\Auth;
use App\Category;



class HomeController extends Controller
{
    
    public function index(){

        $user = Auth::user();
        $user_info = $user->UserInfo;
        return view('admin.home', compact('user', 'user_info'));
    }
}
