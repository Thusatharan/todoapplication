<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('completed')->get();
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
        
        return redirect(route('todo.index'))->with('message','Updated Successfully');
    }

    public function store(Request $request)
    {
        
        $tododata = new Todo;

        $tododata-> title = request('todotext');
        $tododata->save();
        // $todo = new Todo;
        // $todo-> title = request('todotext');
        // $todo-> save();

        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
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
