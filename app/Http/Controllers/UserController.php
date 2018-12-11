<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_list = User::get();

        return view('users.index', compact('user_list'));
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }
}
