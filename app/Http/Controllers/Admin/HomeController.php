<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ----------------------------
use Illuminate\Support\Facades\Auth;
use App\UserInfo;



class HomeController extends Controller
{
    
    public function index(){
        $user = Auth::user();
        $user_info = $user->userInfo;
        return view('admin.home', compact('user', 'user_info'));
    }

    public function update(Request $request)
    {
        // $request->validate($this->getValidationRules());

        // $form_data = $request->all(); 

        // $user_info = new UserInfo();

        // $user_info->fill($form_data);

        // $user_info->update();

        // $user = Auth::user();

        // $user->userInfo()->create($user_info);

        // return redirect()->route('admin.home');
    }

    protected function getValidationRules() {
        return [
            'phone' => 'numeric|min:10|max:15',
            'address' => 'required|max:50',
        ];
    }

}
