<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Service\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    // Display a list of tasks
    public function index(Request $request)
    {
        // $tasks = $this->taskService->getAllTasks();
        $status = $request->query('status');
        $search = $request->query('search');

        $tasks = $this->taskService->getTasksByStatus($status, $search);
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $categories = Category::all();  // Fetch all categories for the dropdown
        return view('tasks.create', compact('categories'));
    }

public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:pending,in-progress,completed',
    ]);

    // Add the authenticated user's ID to the data
    $validatedData['user_id'] = Auth::id();

    // Pass the validated data to the service to create the task
    $this->taskService->createTask($validatedData);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
}

public function edit($id)
{
    // Fetch the task by its ID or fail with a 404
    $task = $this->taskService->getTaskById($id);

    // Fetch all categories for the category dropdown
    $categories = Category::all();

    // Pass the task and categories to the view
    return view('tasks.edit', compact('task', 'categories'));
}

    // Update an existing task in the database
public function update(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',  // Validate that category exists
        'status' => 'required|in:pending,in-progress,completed',  // Corrected validation rule
    ]);

    // Pass the validated data to the service to update the task
    $this->taskService->updateTask($id, $validatedData);

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
}

    public function destroy($id)
    {
        // Call the service to delete the task
        $this->taskService->deleteTask($id);

        // Redirect back to the task list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

}
