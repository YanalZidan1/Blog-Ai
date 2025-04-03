<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // index 
    public function index(){
        $users = User::all();
        return view('auth.register' , compact('users'));
    }

    //store
    public function store(Request $request){
        // validate
        $fields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // create
        $user = User::create($fields);

        // login
        Auth::login($user);

        //redirect
        return redirect()->route('dashboard')->with('success', 'User created successfully');
    }

    // login
    public function login(Request $request){
        // validate
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Try to login
        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->has('remember'))) {
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }


        // redirect
        return redirect()->route('dashboard')->with('error', 'Invalid credentials');
    }

    // logout
    public function logout(Request $request){

        // logout
        Auth::logout();

        // invalidate session
        $request->session()->invalidate();

        // regenerate token
        $request->session()->regenerateToken();

        // redirect
        return redirect()->route('auth.log')->with('success', 'Logout successful.');
    }

}
