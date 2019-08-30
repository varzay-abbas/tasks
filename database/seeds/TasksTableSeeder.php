<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tasks')->insert([            
            "user_id" => 1,
            "title" => "Task X",
            "points" => 3,
            "is_done" => 0,
            "created_at" => date("Y-m-d H:i:s", strtotime(now())),
            "updated_at" => date("Y-m-d H:i:s", strtotime(now())),
        ]);
    }
}
