<?php

namespace App\Http\Controllers;

Use App\Models\User;

use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    public function index()
    {
        $userdata = User::getAllUserData();
        $userdata->makeVisible('api_token')->toArray();

        return view('session/user-info',['users'=>$userdata]);
    }
}
