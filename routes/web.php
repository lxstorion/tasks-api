<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::resource('/tasks', TasksController::class);
Route::get('/tasks/delete/{id}', [TasksController::class, 'delete'])->name('tasks.delete');
