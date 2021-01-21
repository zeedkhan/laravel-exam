<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function index()
    {
        // grab all 
        // $todos = Todo::orderBy('completed')->get();

        // grab just each user todo

        // orderBy use for sql, sortBy use for Eloquent
        $todos = auth()->user()->todos->sortBy('completed');
        return view('todos.index', compact('todos'));
    }

    // Create todo
    public function create()
    {
        return view('todos.create');
    }

    // Edit todo
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    // Post form to database
    public function store(TodoCreateRequest $request)
    {
        // Only logged in user can access to create route

        $todo = auth()->user()->todos()->create($request->all());

        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }

        return redirect(route('todo.index'))->with('message', 'Todo Created Successfully');
    }

    // Update todo
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = ($request->stepId[$key]);
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo updated!');
    }

    // Complete todo
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Todo completed !');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Todo incomplete !');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', 'Todo deleted!');
    }

    // Delete todo
}
