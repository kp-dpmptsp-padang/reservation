<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function reservation()
    {
        return view('reservation');
    }
}