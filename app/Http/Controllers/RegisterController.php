<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('account.create');
    }

    public function store()
    {
        request()->validate([ //Laravel validation
            var_dump(request->all())
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => ['required','max:25','min:7'],
            'confirmpassword' => 'required'
        ]);
    }
}
