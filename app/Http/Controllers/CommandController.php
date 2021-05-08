<?php

namespace App\Http\Controllers;

use App\Models\Command;
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
        return View::make('command.index')
            ->with('commands', $commands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        // load the create form (app/views/command/create.blade.php)
        return View::make('command.create');
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
            'totalAmount' => 'required|integer',
            'product' => 'nullable|string', //TODO : many-to-many type ?
            'status' => 'required|string',
            'user_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('command/create')
                ->withErrors($validator);

        } else {
            // store
            $command = new Command();
            $command->totalAmount = $request->totalAmount;
            $command->user_id = $request->user_id;
            $command->product = $request->product;
            $command->status = $request->status;
            $command->save();

            // redirect
            return Redirect::to('product');
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
        // get the command
        $command = Command::find($id);

        // show the view and pass the command to it
        return View::make('command.show')
            ->with('command', $command);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $id) //Command $command
    {
        // get the command
        $command = Command::find($id);

        // show the edit form and pass the product
        return View::make('command.edit')
            ->with('command', $command);
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
            'totalAmount' => 'integer',
            'product' => 'nullable|string', //TODO: many-to-many type
            'status' => 'string', //TODO: tranform to enum
            'user_id' => 'nullable|integer' //TODO: check exists
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('command/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $command = Command::find($id);
            $command->totalAmount = $request->totalAmount;
            $command->product = $request->product;
            $command->status = $request->status;
            $command->user_id = $request->user_id;
            $command->save();

            // redirect
            return Redirect::to('command');
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
        $command = Command::find($id);
        $command->delete();

        // redirect
        return Redirect::to('command');
    }
}
