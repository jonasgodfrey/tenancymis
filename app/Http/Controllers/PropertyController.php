<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        # code...
        return view('admin.property.index')->with([]);
    }
}
