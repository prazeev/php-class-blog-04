<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function auth(Request $request) {
        $data = ['email' => $request->email, 'password' => $request->password];
        $auth = Auth::attempt($data);
        if($auth) {
            return redirect()->action('SiteController@index');
        } else {
            return redirect()->action('UserController@login');
        }
    }
    public function login() {
        return view('site.login');
    }

    public function register() {
        return view('site.register');
    }

    public function signup(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:10|required|confirmed',
            'name' => 'required|string'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($user) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->action('SiteController@index');
        } else {
            abort(500);
        }
    }



    public function profile() {
        $data['categories_post'] = Category::all();
        return view('site.profile')->with($data);
    }
}
