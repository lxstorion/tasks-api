<?php

namespace Database\Seeders;

use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run(): void
    {
        Tasks::factory()->count(30)->create();
    }
}
