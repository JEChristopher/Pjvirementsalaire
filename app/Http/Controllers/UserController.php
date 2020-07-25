<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function register()
    {
        // TODO : CREER UN UTILISATEUR
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
}
