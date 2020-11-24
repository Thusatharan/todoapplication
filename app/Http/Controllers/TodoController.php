<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\Todo;
use App\Models\User;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index',compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        
        // dd($request->all());
        $todo->update(['title' => $request->todotext]);
        $todo->update(['description' => $request->descriptionText]);
        
        return redirect(route('todo.index'))->with('message','Updated Successfully');
    }

    public function store(Request $request)
    {
        $tododata = new Todo;
        $request['user_id'] = auth()->id();
        $tododata-> user_id = $request['user_id'];
        $tododata-> title = request('todotext');
        $tododata-> description = request('descriptionText');
        $tododata->save();
        // $todo = new Todo;
        // $todo-> title = request('todotext');
        // $todo-> save();

        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }

    public function show($id)
    {
        $todos = Todo::find($id);
        return view('todos.show',compact('todos'));
    }

    public function complete(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->update(['completed'=>true]);

        return redirect()->back()->with('message','Marked as Completed');
    }

    public function incomplete(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update(['completed'=>false]);

        return redirect()->back()->with('message','Marked as Incomplete');
    }

    public function delete(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->back()->with('message','Task Deleted');
    }
}
