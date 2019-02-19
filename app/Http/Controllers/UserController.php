<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function auth(Request $request) {
        $data = ['email' => $request->email, 'password' => bcrypt($request->password)];
        $auth = Auth::attempt($data);
        if($auth) {
            return redirect()->action('SiteController@index');
        } else {
            return redirect()->route('user.login.index');
        }
    }
    public function login() {
        return view('site.login');
    }
}
