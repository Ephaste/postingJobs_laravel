<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/create form
    public function create(){
        return view('users.register');
    }

    //Store new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6', // Fix typo here
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        // Login
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }

    //logout
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //Show  login form
    public function login(){
        return view('users.login');
        
    }
public function authenticate(Request $request){
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required',
    ]); 

    if (auth()->attempt($formFields)){
        $request->session()->regenerate();

        return redirect('/')->with('message', 'You are logged in!');
    }
    return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');
} 
}