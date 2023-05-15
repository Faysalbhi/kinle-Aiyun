<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('backend.user.index',[
            'users'=>User::all(),
        ]);
    
    }
}
