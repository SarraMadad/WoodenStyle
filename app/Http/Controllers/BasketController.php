<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        // get user basket
        $basket = Basket::whereUserId($id)->first();

        // get all categories
        $categories = Category::all();

        // load the view and pass the baskets
        return View::make('client.basket')
            ->with('basket', $basket)
            ->with('categories', $categories);
    }

    public function addProduct($request, $id)
    {
        //TODO: fais des trucs
    }

    public function removeproduct($request, $id)
    {
        //TODO: fais des trucs
    }

    private function updateTotalAmount($id)
    {
        //TODO update totalAmount

        $basket = Basket::find($id);
        $basket->totalAmount = 0; //Calculate auto totalAmount based on basket product
        $basket->save();
    }
}
