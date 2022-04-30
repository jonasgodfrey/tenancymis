<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class UserProfileController extends Controller
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
}
