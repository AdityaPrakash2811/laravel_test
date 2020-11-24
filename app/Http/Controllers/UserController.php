<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

            /*$user = new User();
            $user->name='prakash';
            $user->email="xyz@geekyants.com";
            $user->password=bcrypt("random");
            $user->role_id=2;

            $user->save();*/

            return view('home');
    }
}
