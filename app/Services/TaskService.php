<?php

namespace App\Services;

use App\Models\Tasks;

class TaskService
{
    public function getTasks() {
        return Tasks::all();
    }
    public function destroyTask($id) {
        return Tasks::destroy($id);
    }
    public function createTask(array $task) {
        $id = Tasks::create($task);
        return $id;
    }
    public function getTaskById($id) {
        $task = Tasks::find($id);
        return $task;
    }
}
