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
        return Tasks::destroy($id);
    }
    public function create(array $task) {
        return Tasks::create($task);
    }
    public function getById($id) {
        return Tasks::findOrFail($id);
    }
    public function update($id, array $data)
    {
        return Tasks::where('task_id', $id)->update($data);
    }
}
