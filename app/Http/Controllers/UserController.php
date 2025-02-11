<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function store(Request $request)
    {
        // Implement create user logic
    }

    public function update(Request $request, $user)
    {
        // Implement update user logic
    }

    public function destroy($user)
    {
        // Delete the user...
    }
}
