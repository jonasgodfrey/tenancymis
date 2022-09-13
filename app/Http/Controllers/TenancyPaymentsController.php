<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PaymentRecord;
use App\Models\Tenant;
use Carbon\Carbon;
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
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();
        $count = 0;

        if (Gate::allows('admin')) {
            $payments = $user->tenants;
            $properties = $user->properties;

            return view('admin.payments.index')->with([
                'properties' => $properties,
                'tenants' => $payments,
                'count' => $count
            ]);
        }

        return null;
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
        ]);

        $user = Auth::user();

        if (Gate::allows('admin')) {

            $file = $request->file('file');

            // generate a new filename. getClientOriginalExtension() for the file extension
            $rand = rand(111, 9999);
            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $storefile = $file->storeAs('public/payments/', $filename);

            $tenantrec = Tenant::where('id', $request->tenant)->first();

            if ($storefile) {
                $startdate = Carbon::parse($request->startdate);
                $duedate = Carbon::parse($request->duedate);

                $payment = PaymentRecord::create([
                    'property_id' => $request->propname,
                    'unit_id' => $request->unit,
                    'paycat_id' => $request->paycat,
                    'tenant_id' => $request->tenant,
                    'paystatus_id' => $request->paystatus,
                    'amount' => $request->payamount,
                    'paydate' => Carbon::now(),
                    'startdate' => $startdate,
                    'duedate' => $duedate,
                    'duration' => $request->duration,
                    'duration_status' => '3',
                    'paymethod' => $request->paymethod,
                    'evidence_image' => $filename,
                ]);

                $tenantrec->update([
                    'payId' => $payment->id,
                ]);

                // publish a notification for the user create action
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'owner_id' => $user->id,
                    'title' => "New Payment Record Added",
                    'message' => $user->name . ' added a new payment record, for (tenant: ' . $tenantrec->name . ') on TenancyPlus'
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

    public function edit($id)
    {
        if (Gate::denies('admin_manager')) {
            abort('404');
        }

        $user = Auth::user();


        $payment = PaymentRecord::findOrFail($id);

        return view('admin.payments.edit')->with([
            'payment' => $payment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $file = $request->file('file');
        $tenant_payment = PaymentRecord::find($id);
        $data = $request->all();


        $tenantrec = Tenant::where('id', $tenant_payment->tenant_id)->first();

        if (!empty($file)) {
            // generate a new filename. getClientOriginalExtension() for the file extension
            $rand = rand(111, 9999);
            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $storefile = $file->storeAs('public/payments/', $filename);

            $tenant_payment->fill($data)->save();
            $tenant_payment->update(['evidence_image' => $filename]);
        } else {
            $tenant_payment->fill($data)->save();
        }

        // publish a notification for the user create action
        $notification = Notification::create([
            'user_id' => $user->id,
            'owner_id' => $user->id,
            'title' => "Payment Record Updated",
            'message' => $user->name . ' updated a new payment record, for (tenant: ' . $tenantrec->name . ') on TenancyPlus'
        ]);


        Session::flash('flash_message', 'Tenant Payment Updated Successfully');
        return redirect()->route('payments.index');
    }


    public function delete(Request $request)
    {
        $user = Auth::user();

        $payment = PaymentRecord::findOrFail($request->id);
        $payment->delete();

        if ($payment) {
            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $user->owner_id,
                'title' => "New Tenant Created",
                'message' => "$user->name deleted tenant: '{$payment->tenant->name}' payment record, made on $payment->paydate from  TenancyPlus"
            ]);
        }

        exit("Record Deleted successfully.");
    }
}
