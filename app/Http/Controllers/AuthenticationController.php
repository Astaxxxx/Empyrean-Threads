<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //show login page
    public function newLogin() {
        return view('pages/login');
    }

    //show Register Page 
    public function newRegister() {
        return view('pages/register');
    }

    // Register user 
    public function postForRegister(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        //registration
        $username = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //login
        Auth::login($username);

        return back()->with('success', 'Logged In!');
    }
    // Login user
    public function postForLogin(Request $request) {
        //validate
        $detail = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //login
        if(Auth::attempt($detail)){
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Login Details are Invalid'
        ]);

        //return
    }

    //logout
    public function logout(){

        Auth::logout();
        return back();
    }

    // reset password
    public function resetPassword() {
        
    }
}
