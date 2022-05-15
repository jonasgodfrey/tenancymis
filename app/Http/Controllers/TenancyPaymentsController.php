<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenancyPaymentsController extends Controller
{    /**
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
        return view('admin.payments.index')->with([]);
    }

    public function invoicegenerate()
    {
        return view('admin.payments.invoice')->with([]);

    }

    public function update(Request $request)
    {
        # code...
    }
    public function delete(Request $request)
    {
        # code...
    }
}
