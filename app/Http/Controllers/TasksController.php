<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ResourceServiceContract;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private ResourceServiceContract $tasksService;
    public function __construct(ResourceServiceContract $tasksService) {
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
        return view('show')
            ->with('task', $this->tasksService->getById($id));
    }
    public function edit(string $id)
    {
        return view('components.forms.edit')
            ->with('task', $this->tasksService->getById($id));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'min:10', 'max:255']
        ]);
        $affectedRows = $this->tasksService->update($id, $validatedData);
        return $affectedRows < 1 ?
            response()->json(['errors' => ['error' => 'Fatal error during update task with task_id ' . $id]], 404) :
            response()->json(['data' => $validatedData]);
    }

    public function delete($id) {
        return view('components.forms.delete')
            ->with('task', $this->tasksService->getById($id));
    }
    public function destroy(string $id)
    {
        $destroyed = $this->tasksService->delete($id);
        if (!$destroyed)
            return redirect()->back(404)->withErrors(['error' => 'Cannot delete task with id: ' . $id]);
        return redirect(route('tasks.index'));
    }
}
