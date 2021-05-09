<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    /**
     * Register user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        // load the view
        return View::make('register');
    }

    /**
     * Login user
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        // load the view
        return View::make('login');
    }
}
