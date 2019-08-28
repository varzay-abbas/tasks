<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Classes\ServicesGithub;
use App\Task;

class TaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Task Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the rest api based crud functionalties of tasks as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * users from github.
     *
     * @var array type
     */
    protected $github_users = [];

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    //
    public function index()
    {
        try {
            $users = ServicesGithub::getUsers();
            foreach ($users->data as $user) {
                $user->total_points = $this->getTotalPoints($user->id);
                $user->total_earned_points = $this->getTotalEarnedPoints($user->id);
                $user->tasks = $this->getUserTasks($user->id);
            }
           // return response()->json($users);
            return view("welcome2", compact("users"));
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function getUserTasks($user_id)
    {
        try {
            //$tasks = Task::where("user_id", $user_id)->get();
            $tasks = Task::whereNull('parent_id')
                        ->with('childrenSubtasks')
                        ->where("user_id", $user_id)
                        ->get();
            return $tasks;
        } catch (Exception $e) {
            report($e);
            return false;
        }
    }

    public function getSubTasks($task_id)
    {
        $tasks = Task::with("grandchildren")->where("parent_id", $task_id)->get();
       
        return response()->json($tasks);
    }
    
    
    public function getTotalPoints($user_id)
    {
        $points = Task::where("user_id", $user_id)->sum("points");
        return $points;
    }

    public function getTotalEarnedPoints($user_id)
    {
        $points = Task::where("user_id", $user_id)->where("is_done", 1)->sum("points");
        return $points;
    }

    public function getUsers()
    {
        $users = ServicesGithub::getUsers();
       
        return response()->json($users);
    }

    /**
     * Get a validator for an incoming  request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'parent_id' => ['nullable', Rule::in(Task::pluck("id")->toArray())],
            'user_id' => ['required', 'integer', Rule::in(ServicesGithub::getUserIds())],
            'title' => 'required|max:255',
            'points' => 'required|integer|between:1,10',
            'is_done' => 'required|integer|between:0,1',
        ]);
    }

    /**
     * Create a new task instance after a validation checking.
     *
     * @param  array  $data
     * @return \App\Task
     */

    public function addTask(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $task = Task::create([
                "parent_id" => $request->parent_id,
                "user_id" => $request->user_id,
                "title" => $request->title,
                "points" => $request->points,
                "is_done" => $request->is_done,
                "created_at" => date("Y-m-d H:i:s", strtotime(now())),
                "updated_at" => date("Y-m-d H:i:s", strtotime(now())),
    
            ]);

            return response()->json($task, 201);
        }
       
        return response()->json(["Other Errors"], 500);
    }


    public function updateTask(Request $request, $id)
    {
        $task = Task::find($id);
        if ($task != null) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            } else {
                $task->parent_id = $request->parent_id;
                $task->user_id = $request->user_id;
                $task->title = $request->title;
                $task->points = $request->points;
                $task->is_done = $request->is_done;
                $task->updated_at = date("Y-m-d H:i:s", strtotime(now()));
                $task->update();
                $task = Task::find($id);
            
                return response()->json($task, 201);
            }
        }

        return response()->json(["Other Errors"], 500);
        //return redirect("/");
    }


    public function getTasks()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function getTasksTree()
    {
        $tasks = Task::whereNull('parent_id')
        ->with('childrenSubtasks')
        ->get();
        
        return view('tasks', compact('tasks'));
    }
}
