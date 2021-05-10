<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
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
        return View::make('register')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'nullable|string',
            'address' => 'required|string',
            'password' => 'required|string'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/register')
                ->withErrors($validator);
        }

        // store
        $user = User::create(request(['firstname', 'lastname', 'email', 'address', 'password']));
        Basket::create(["user_id" => $user->id]);

        // login user
        auth()->login($user);

        return redirect()->to('/');
    }
}
