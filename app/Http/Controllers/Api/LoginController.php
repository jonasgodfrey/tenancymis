<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Login";

        return view('auth.login', compact('title'))->with([]);
    }
}
