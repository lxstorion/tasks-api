<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private $tasksService;
    public function __construct(TaskService $tasksService) {
        $this->tasksService = $tasksService;
    }
    public function index()
    {

    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
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
