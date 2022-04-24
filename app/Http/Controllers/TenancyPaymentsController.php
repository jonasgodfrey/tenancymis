<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenancyPaymentsController extends Controller
{
    public function index()
    {
        return view('admin.payments.index')->with([]);
    }

    public function invoicegenerate()
    {
        return view('admin.payments.invoice')->with([]);

    }
}
