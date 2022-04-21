<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        # code...
        return view('admin.property.index')->with([]);
    }
}
