<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tasks')->create([
            [
                'title' => 'Wake up',
                'description' => 'Wake up. For what who knows?'
            ],
            [
                'title' => 'Some breakfast',
                'description' => 'Some breakfast. For what who knows?'
            ],
            [
                'title' => 'Some sleep',
                'description' => 'Some sleep. For what who knows?'
            ],
            [
                'title' => 'Wake up',
                'description' => 'Evening. For what who knows?'
            ],
            [
                'title' => 'Burn',
                'description' => '.).).)'
            ]
        ]);
    }
}
