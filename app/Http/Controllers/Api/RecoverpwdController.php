<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecoverpwdController extends Controller
{
    public function index()
    {
        return view('auth.recoverpwd')->with([]);
    }
}
