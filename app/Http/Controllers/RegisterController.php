<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('account.create');
    }

    public function store()
    {


        $attributes = request()->validate([ //Laravel validation
            'name' => 'required|max:255|min:2',
            'username' => 'required|max:255|min:3|unique:users,username', // Unique, checks the users table and the column username looks if the username already exists.
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required','max:25','min:7'],
        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('message', 'Your account has been created');
    }
}
