<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all categories
        $categories = Category::all();

        // load the view and pass the categories
        return View::make('dashboard.index')
            ->with('categories', $categories);
    }
}
