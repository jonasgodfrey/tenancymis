<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisansController extends Controller
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
        return view('admin.artisans.index')->with([]);
    }

    public function artisansdash()
    {
       return view('artisans.index')->with([]);
    }
}
