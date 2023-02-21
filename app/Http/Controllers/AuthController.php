<?php

namespace App\Http\Controllers;

use App\Jobs\SendRegisterMailJob;
use App\Mail\SendRegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class AuthController extends Controller
{

    public function showCart(){
        $users = User::with('products');
    }

    public function showLogin()
    {
        
        return view('layouts.pages.login');
    }

    public function showRegister()
    {
        return view('layouts.pages.registers');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required | min: 7',
            'email' => 'required', 

        ]);
        
        // dd($request->role_id);
        
        $user = User::create($request->all());
        // dd($user->id);
        $role = Role::create([
            'name' => 'user',
            'user_id' => $user->id
        ]);
        Auth::login($user);
        SendRegisterMailJob::dispatch($request->input('email'));
        return redirect('index');
    }


    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required | min: 5',
            'email' => 'required | min: 5'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('index');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }




}
