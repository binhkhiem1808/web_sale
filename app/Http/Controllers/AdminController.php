<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        return view('layouts.pages.loginAdmin');
    }


    public function login(Request $request)
    {
        // dd($request->has('remember_me'));
        $remember = $request->has('remember_me') ? true : false;
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $remember)){
            return redirect()->to('/index');
        }
    }
}
