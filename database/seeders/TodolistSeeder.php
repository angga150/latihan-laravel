<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todolist;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todolist::insert([
            [
                'title' => 'Buy groceries',
                'description' => 'Milk, Bread, Eggs, Butter',
                'is_completed' => false,
            ],
            [
                'title' => 'Finish project report',
                'description' => 'Complete the final draft of the project report',
                'is_completed' => false,
            ],
            [
                'title' => 'Workout',
                'description' => 'Go for a 30-minute run',
                'is_completed' => true,
            ],
        ]);
    }
}
