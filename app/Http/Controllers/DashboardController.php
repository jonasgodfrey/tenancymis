<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
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
        $user = Auth::user();

        if (Gate::allows('admin')) {
            return view('admin.dashboard.index')->with([]);
        }

        if (Gate::allows('manager')) {
            return view('users.manager.index')->with([]);
        }

        if (Gate::allows('accountant')) {
            return view('users.accountant.index')->with([]);
        }

        if (Gate::allows('artisan')) {
            return view('users.artisan.index')->with([]);
        }

        if (Gate::allows('tenant')) {
            return view('users.tenant.index')->with([]);
        }
    }
}
