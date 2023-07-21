<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user', compact('users'));
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
    public function dash(){
        return view('dash.index');
    }
}
