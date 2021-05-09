<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Command;
use App\Models\Product;
use App\Models\User;
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
        $limit = 5;
        // get x products
        $products = Product::orderBy('created_at', 'DESC')->paginate($limit);
        // get x categories
        $categories = Category::paginate($limit);
        // get x users
        $users = User::orderBy('created_at', 'DESC')->paginate($limit);
        // get x commands
        $commands = Command::orderBy('created_at', 'DESC')->paginate($limit);

        // load the view and pass the categories
        return View::make('backoffice.dashboard.index')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('users', $users)
            ->with('commands', $commands);
    }
}
