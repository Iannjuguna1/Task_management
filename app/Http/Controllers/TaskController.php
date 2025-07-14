<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tasks;
use App\Models\users;

class TaskController extends Controller
{
    // List all tasks
    public function index()
    {
        $tasks = tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        $users = users::all();
        return view('tasks.create', compact('users'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',  //Assign user for the task
            'status' => 'required|in:pending,in progress,completed',
            'deadline' => 'required|date',
            'created_by' => 'required|exists:users,id',
        ]);

        tasks::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Show form to edit a task
    public function edit($id)
    {
        $task = tasks::findOrFail($id);
        $users = users::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    // Update a task
    public function update(Request $request, $id)
    {
        $task = tasks::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,in progress,completed',
            'deadline' => 'required|date',
            'created_by' => 'required|exists:users,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Delete a task
    public function destroy($id)
    {
        $task = tasks::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    //view your Tasks 
    public function myTasks()
{
    // If using authentication, use auth()->id()
    $userId = auth()->id() ?? 1; // fallback to 1 for demo/testing

    $tasks = tasks::where('user_id', $userId)->get();

    return view('tasks.my_tasks', compact('tasks'));
}
}
