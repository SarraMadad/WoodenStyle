<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resources.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        // get all categories
        $categories = Category::all();

        // load the view and pass the categories
        return View::make('backoffice.dashboard.index')
            ->with('categories', $categories);
    }
}
