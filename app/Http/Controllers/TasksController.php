<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ResourceServiceContract;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private ResourceServiceContract $tasksService;
    public function __construct(TaskService $tasksService) {
        $this->tasksService = $tasksService;
    }
    public function index()
    {
        $tasks = $this->tasksService->getAll();
        return view('index')->with('tasks', $tasks);
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'min:10', 'max:255'],
        ]);
        $id = $this->tasksService->create($validatedData);
        if (!$id)
            return redirect(route('tasks.create'))->withErrors(['error' => 'Cannot create task']);
        return redirect(route('tasks.index'));
    }
    public function show(string $id)
    {
        $task = $this->tasksService->getById($id);
        if (!$task)
            return view('show')->withErrors(['error' => 'Cannot find task with id: ' . $id]);
        return view('show')->with('task', $task);
    }
    public function edit(string $id)
    {
        $task = $this->tasksService->getById($id);
        if (!$task)
            return response()->json([
                'error' => 'Unable to load resource',
                'resource_id' => $id
            ], 404);
        return view('components.forms.edit')->with('task', $task);
    }
    public function update(Request $request, string $id)
    {
        //
    }

    public function delete($id) {
        $task = $this->tasksService->getById($id);
        if (!$task)
            return response()->json([
                'error' => 'Unable to load resource',
                'resource_id' => $id
            ], 404);
        return view('components.forms.delete')->with('task', $task);
    }
    public function destroy(string $id)
    {
        $destroyed = $this->tasksService->delete($id);
        if (!$destroyed)
            return redirect()->back(404)->withErrors(['error' => 'Cannot delete task with id: ' . $id]);
        return redirect(route('tasks.index'));
    }
}
