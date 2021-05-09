<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all baskets
        $baskets = Basket::all();

        // load the view and pass the baskets
        return View::make('backoffice.basket.index')
            ->with('baskets', $baskets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all products
        $products = Product::all();

        // load the create form (app/views/product/create.blade.php)
        return View::make('backoffice.product.create')
            ->with('products', $products);

        // get all users
        $users = User::all();

        // load the create form (app/views/user/create.blade.php)
        return View::make('backoffice.user.create')
            ->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'user_id' => 'nullable|integer', //TODO: check exists
            'product_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('basket/create')
                ->withErrors($validator);

        } else {
            // store
            $basket = new Basket();
            $basket->user_id = $request->user; //TODO: Get User model
            $basket->product_id = $request->product; //TODO: Get Product model
            $basket->save();

            // redirect
            return Redirect::to('basket');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // get the basket
        $basket = Basket::find($id);

        // show the view and pass the basket to it
        return View::make('backoffice.basket.show')
            ->with('basket', $basket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // get the basket
        $baskets = Basket::find($id);
        $users = User::all();
        $products = Product::all();

        // show the edit form and pass the basket
        return View::make('backoffice.basket.edit')
            ->with('basket', $baskets)
            ->with('user', $users)
            ->with('product', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // validate
        $rules = array(
            'user_id' => 'nullable|integer', //TODO: check exists
            'product_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('basket/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $basket = Basket::find($id);
            $basket->user_id = $request->user; //TODO: Get User model
            $basket->product_id = $request->product; //TODO: Get Product model

            $basket->save();

            // redirect
            return Redirect::to('basket');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // delete
        $basket = Basket::find($id);
        $basket->delete();

        // redirect
        return Redirect::to('basket');
    }
}
