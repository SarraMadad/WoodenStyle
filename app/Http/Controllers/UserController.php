<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all users
        $users = User::all();

        // load the view and pass the products
        return View::make('user.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // load the create form (app/views/user/create.blade.php)
        return View::make('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'nullable|string',
            'address' => 'required|string',
            'password' => 'required|string', //
            'is_admin' => 'required|boolean' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/create')
                ->withErrors($validator);

        } else {
            // store
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = $request->password;
            $user->is_admin = $request->is_admin;
            $user->save();

            // redirect
            return Redirect::to('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        // get the user
        $user = User::find($id);

        // show the view and pass the product to it
        return View::make('user.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        // get the user
        $user = User::find($id);

        // show the edit form and pass the product
        return View::make('user.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        // validate
        $rules = array(
            'firstname' => 'string',
            'lastname' => 'string',
            'address' => 'string',
            'password' => 'string',
            'is_admin' => 'boolean',

        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $user = User::find($id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = $request->password;
            $user->is_admin = $request->is_admin;
            $user->save();

            // redirect
            return Redirect::to('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        return Redirect::to('user');
    }
}
