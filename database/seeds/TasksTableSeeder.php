<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'user_id' => 1,
            'title' => 'Task1',
            'points' => 0,
            'is_done' => 0,
            'created_at' => date('Y-m-d H:i:s', strtotime(now())),
            'updated_at' => date('Y-m-d H:i:s', strtotime(now())),
        ]);

        DB::table('tasks')->insert([
            'user_id' => 2,
            'title' => 'Task1',
            'points' => 0,
            'is_done' => 0,
            'created_at' => date('Y-m-d H:i:s', strtotime(now())),
            'updated_at' => date('Y-m-d H:i:s', strtotime(now())),
        ]);

        DB::table('tasks')->insert([
            'user_id' => 3,
            'title' => 'Task1',
            'points' => 0,
            'is_done' => 0,
            'created_at' => date('Y-m-d H:i:s', strtotime(now())),
            'updated_at' => date('Y-m-d H:i:s', strtotime(now())),
        ]);
    }
}
