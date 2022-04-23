<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyUnitsController extends Controller
{
    public function index()
    {
        return view('admin.units.index')->with([]);
    }
}
