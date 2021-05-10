<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all products
        $products = Product::all();

        // load the view and pass the products
        return View::make('backoffice.product.index')
            ->with('products', $products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function indexClient()
    {
        // get all products
        $products = Product::all();

        // get all categories
        $categories = Category::all();

        // load the view and pass the products
        return View::make('client.index')
            ->with('categories', $categories)
            ->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // get all categories
        $categories = Category::all();

        // load the create form (app/views/product/create.blade.php)
        return View::make('backoffice.product.create')
            ->with('categories', $categories);
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('backoffice/product/create')
                ->withErrors($validator);

        } else {
            // store
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->category_id = $request->category; //TODO: Get Category model
            $product->save();

            // redirect
            return Redirect::to('backoffice/product');
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
        // get the product
        $product = Product::find($id);

        // show the view and pass the product to it
        return View::make('backoffice.product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        // get the product
        $product = Product::find($id);
        $categories = Category::all();

        // show the edit form and pass the product
        return View::make('backoffice.product.edit')
            ->with('product', $product)
            ->with('categories', $categories);
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
            'name' => 'string',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'stock' => 'integer',
            'category_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('product/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->category_id = $request->category; //TODO: Get Category model
            $product->save();

            // redirect
            return Redirect::to('backoffice/product');
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
        $product = Product::find($id);
        $product->delete();

        // redirect
        return Redirect::to('backoffice/product');
    }
}
