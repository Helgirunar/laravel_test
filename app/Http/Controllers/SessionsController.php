<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('message', 'Successfully logged out');
    }
    public function create() {
        return view('sessions.create');
    }

    public function store()
    {
         $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('message','Successfully logged in');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }
}
