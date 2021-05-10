<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Command;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all commands
        $commands = Command::all();

        // load the view and pass the commands
        return View::make('backoffice.command.index')
            ->with('commands', $commands);
    }

    /**
     * Display a listing of the resource of the user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function indexUserCommand(int $id)
    {
        // get all categories
        $categories = Category::all();

        // get all commands
        $commands = Command::whereUserId($id)->get();

        // load the view and pass the commands
        return View::make('client.command')
            ->with('commands', $commands)
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
        // store
        $basketId = $request->only('basket');
        $basket = Basket::find($basketId)->first();
        $command = new Command();
        $command->totalAmount = $basket->totalAmount;
        $command->user_id = $basket->user_id;
        $command->status = "Validé";
        $command->save();
        
        // redirect
        return Redirect::to($basket->user_id . '/command');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        // get the command
        $command = Command::find($id);

        // show the view and pass the command to it
        return View::make('backoffice.command.show')
            ->with('command', $command);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id) //Command $command
    {
        // get the command
        $command = Command::find($id);

        // show the edit form and pass the product
        return View::make('backoffice.command.edit')
            ->with('command', $command);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)  //Command $command
    {
        // validate
        $rules = array(
            'totalAmount' => 'integer',
            'status' => 'string',
            'user_id' => 'nullable|integer'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('backoffice/command/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $command = Command::find($id);
            $command->totalAmount = $request->totalAmount;
            $command->product = $request->product;
            $command->status = $request->status;
            $command->user_id = $request->user;
            $command->save();

            // redirect
            return Redirect::to('backoffice/command');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id //\App\Models\Command  $command
     * @return RedirectResponse
     */
    public function destroy(int $id) //Command $command
    {
        // delete
        $command = Command::find($id);
        $command->delete();

        // redirect
        return Redirect::to('backoffice/command');
    }
}
