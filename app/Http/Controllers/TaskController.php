<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ServicesGithub;
use App\Task;

class TaskController extends Controller
{
    //
    public function index() {

        $users = ServicesGithub::getUsers();
        
        //$tasks = Task::OrderBy("user_id")->get();


        foreach($users->data as $user) {
            
            $user->total_point = $this->getTotalPoint($user->id); 
            $user->total_earned_point = $this->getTotalEarnedPoint($user->id);
            $user->tasks = $this->getUserTasks($user->id); 
        }

        return view("welcome", compact("users"));
    }

    public function getUserTasks($user_id) {

        $tasks = Task::where("user_id", $user_id)->get();
        return $tasks;
    }

    public function getTotalPoint($user_id) {

        $point = Task::where("user_id", $user_id)->sum("point");
        return $point;
    }

    public function getTotalEarnedPoint($user_id) {

        $point = Task::where("user_id", $user_id)->where("is_done", 1)->sum("point");
        return $point;
    }

    public function getUsers() {

        $users = ServicesGithub::getUsers();
       
        return response()->json($users);
    }

    public function AddTask(Request $request) {

        $task = Task::create([
            "parent_id" => $request->parent_id,
            "user_id" => $request->user_id,
            "title" => $request->title,
            "point" => $request->point,
            "created_at" => date("Y-m-d H:i:s", strtotime(now())),
            "updated_at" => date("Y-m-d H:i:s", strtotime(now())),

        ]);
       
        return redirect("/");
    }

    public function getTasks() {

        $tasks = Task::all();

        return response()->json($tasks);

    }



}
