<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));


        } catch(Exception $e) {
            return redirect('/')->with('error', 'This email could not be added to our newsletter list');
        }

        return redirect('/')->with('message', 'You are now signed up for our newsletter');
    }
}
