<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
                'remember' => 'nullable|string',
            ]);

            if(auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                if (auth()->user()->role == 'super' || auth()->user()->role == 'admin') {
                    return redirect()->route('index');
                }

                // logout user
                auth()->logout();

                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'email' => 'Unauthorized access. You are not allowed to access this page.',
                ]);
            }

            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'email' => 'Invalid email or password',
            ]);
        }

        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function forgot(Request $request)
    {
        if($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
            ]);

            return redirect()->back()->with('success', 'Password reset link sent to your email');
        }

        return view('auth.forgot');
    }
}
