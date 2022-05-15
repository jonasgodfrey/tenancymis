<?php

namespace App\Http\Controllers;

use App\Models\PaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

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
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
        ]);


        if (Gate::allows('admin')) {

            $file = $request->file('file');

            // generate a new filename. getClientOriginalExtension() for the file extension
            $rand = rand(111, 9999);
            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $storefile = $file->storeAs('public/payments/', $filename);

            $tenantrec = PaymentRecord::where('tenant_id', $request->tenant)->where('duration_status', 'active')->first();

            if ($storefile) {

                if ($tenantrec != '') {
                    $tenantrec->update([
                        'duration_status' => 'expired',
                    ]);
                }

                $payment = PaymentRecord::create([
                    'property_id' => $request->propname,
                    'unit_id' => $request->unit,
                    'paycat_id' => $request->paycat,
                    'tenant_id' => $request->tenant,
                    'paystatus_id' => $request->paystatus,
                    'amount' => $request->payamount,
                    'paydate' => $request->paydate,
                    'startdate' => $request->startdate,
                    'duedate' => $request->duedate,
                    'duration' => $request->duration,
                    'duration_status' => 'active',
                    'paymethod' => $request->paymethod,
                    'evidence_image' => $filename,
                ]);

                if ($payment) {
                    Session::flash('flash_message', 'New tenant Payment Added Successfully');
                    return redirect()->back();
                }
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
