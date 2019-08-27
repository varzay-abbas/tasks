<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ServicesGithub;



class UserController extends Controller
{
    //
    public function getUsers() {
        
        $users = ServicesGithub::getUsers();
        return response()->json($users);
    }
}
