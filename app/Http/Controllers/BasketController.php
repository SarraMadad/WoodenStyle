<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    /**
     * @param Request $request
     * @param $userId
     * @return RedirectResponse
     */
    public function addProduct(Request $request, $userId)
    {
        $basket = Basket::whereUserId($userId)->first();
        $product = Product::find($request->only(['product']));

        $basket->products()->attach($product);
        $this->updateTotalAmount($basket);

        return Redirect::to($userId . '/basket');
    }

    /**
     * @param Request $request
     * @param $userId
     * @return RedirectResponse
     */
    public function removeproduct(Request $request, $userId)
    {
        $basket = Basket::whereUserId($userId)->first();
        $product = Product::find($request->only(['product']));

        $basket->products()->detach($product);
        $this->updateTotalAmount($basket);

        return Redirect::to($userId . '/basket');
    }

    private function updateTotalAmount(Basket $basket)
    {
        $total = 0;
        $products = $basket->products()->get();

        foreach ($products as $product) {
            $total += $product->price;
        }
        $basket->totalAmount = $total;
        $basket->save();
    }
}
