<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantsController extends Controller
{
    public function index()
    {
        return view('accountant.index')->with([]);
    }
}
