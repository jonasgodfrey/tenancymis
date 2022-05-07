<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantsController extends Controller
{
    public function index()
    {
        return view('accountant.index')->with([]);
    }
}
