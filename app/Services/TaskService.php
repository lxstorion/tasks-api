<?php

namespace App\Services;

use App\Models\Tasks;

class TaskService
{
    public function getTasks() {
        return Tasks::all();
    }
}
