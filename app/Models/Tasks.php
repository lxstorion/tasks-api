<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_id',
        'title',
        'description'
    ];
    public $timestamps = true;
}
