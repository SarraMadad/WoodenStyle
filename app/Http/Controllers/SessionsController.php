<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // get all categories
        $categories = Category::all();

        // load the view
        return View::make('login')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'email' => 'required|string',
            'password' => 'required|string'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/login')
                ->withErrors($validator->errors());
        }

        if (Auth::attempt($request->only('email', 'password')) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/');
    }

    /**
     * Destroy
     *
     * @return RedirectResponse
     */
    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }

}
