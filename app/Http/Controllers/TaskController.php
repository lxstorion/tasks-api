<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use http\Env\Response;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $taskService;
    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }
    public function index()
    {
        $tasks = $this->taskService->getTasks();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
