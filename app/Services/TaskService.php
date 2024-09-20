<?php

namespace App\Services;

use App\Models\Tasks;
use App\Services\Contracts\ResourceServiceContract;

class TaskService implements ResourceServiceContract
{
    public function getAll() {
        return Tasks::all();
    }
    public function delete($id) {
        $deleted = Tasks::find($id);
        if (!$deleted)
            return false;
        $deleted->delete();
        return $deleted;
    }
    public function create(array $task) {
        $task = new Tasks($task);
        return $task->save();
    }
    public function getById($id) {
        $task = Tasks::find($id);
        if (!$task)
            return false;
        return $task;
    }
    public function update($id, array $data)
    {

    }
}
