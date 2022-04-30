<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpAuthController extends Controller
{
    public function index()
    {
        return view('auth.otp')->with([]);
    }

    public function confirm()
    {
        return view('auth.confirm')->with([]);

    }

}
