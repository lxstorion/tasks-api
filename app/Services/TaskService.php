<?php

namespace App\Services;

use App\Models\Tasks;

class TaskService
{
    public function getTasks() {
        return Tasks::all();
    }
    public function destroyTask($id) {
        $deleted = Tasks::find($id);
        if (!$deleted)
            return false;
        $deleted->delete();
        return $deleted;
    }
    public function createTask(array $task) {
        $task = new Tasks($task);
        return $task->save();
    }
    public function getTaskById($id) {
        $task = Tasks::find($id);
        if (!$task)
            return false;
        return $task;
    }
}
