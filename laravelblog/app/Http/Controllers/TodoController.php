<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        // dd(auth()->user()->todos());
        $userId = auth()->id();
        $request['user_id'] = $userId;
        Todo::create($request->all());
        
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'Lists created successfully');


        //-------custom validator---------
        // $rules = [
        //     'title' => 'required|max:255',
        // ];
        // $messages = [
        //     'title.max' => 'Title should not be more than 255 characters',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);

        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // ----------------------------------------------


        
        // $request->validate([
        //     'title' => 'required|max:255',
        // ]);
        
        
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        return redirect(route('todo.index'))->with('message', 'Update!!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=> true]);
        return redirect()->back()->with('message', 'Task Completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=> false]);
        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Delete Successful');
    }
}
