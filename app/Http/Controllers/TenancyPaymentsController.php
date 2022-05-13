<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TenancyPaymentsController extends Controller
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

            $properties = $user->properties;

            return view('admin.payments.index')->with([
                'properties' => $properties,
            ]);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if (Gate::allows('admin')) {

            $tenantrec = PaymentRecord::where('tenant_id', $request->tenant)->where('duration_status', 'active')->first();

            if ($tenantrec != '') {

                $tenantrec->update([
                    'duration_status' => 'expired',
                ]);
            } else {

                $payment = PaymentRecord::create([
                    'property_id' => $request->propname,
                    'unit_id' => $request->unit,
                    'tenant_id' => $request->tenant,
                    'paystatus_id' => $request->paystatus,
                    'amount' => $request->payamount,
                    'paydate' => $request->paydate,
                    'startdate' => $request->startdate,
                    'duedate' => $request->duedate,
                    'duration' => $request->duration,
                    'duration_status' => 'active',
                    'evidence_image' => $request->propname,

                ]);
            }
        }
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
