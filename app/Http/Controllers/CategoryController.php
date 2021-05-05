<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all categories
        $categories = Category::all();

        // load the view and pass the categories
        return View::make('category.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // load the create form (app/views/category/create.blade.php)
        return View::make('category.create');
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
            'description' => 'required|string',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('category/create')
                ->withErrors($validator);

        } else {
            // store
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            // redirect
            return Redirect::to('category');
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
        // get the category
        $category = Category::find($id);

        // show the view and pass the category to it
        return View::make('category.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        // get the category
        $category = Category::find($id);

        // show the edit form and pass the category
        return View::make('category.edit')
            ->with('category', $category);
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
            'name' => 'required',
            'description' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('category/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            // redirect
            return Redirect::to('category');
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
        $category = Category::find($id);
        $category->delete();

        // redirect
        return Redirect::to('category');
    }
}
