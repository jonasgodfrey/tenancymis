<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildSellController extends Controller
{
    public function index()
    {
        return view('bs.index')->with([]);
    }

    public function subscribdash()
    {
        return view('bs.subscribersdash')->with([]);
    }
}
