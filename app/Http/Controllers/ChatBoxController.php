<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBoxController extends Controller
{
    public function index()
    {
        return view('admin.chats.index')->with([]);
    }
}
