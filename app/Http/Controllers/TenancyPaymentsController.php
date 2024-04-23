<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PaymentRecord;
use App\Models\Tenant;
use App\Models\TenantRentalRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $payments = PaymentRecord::leftJoin('users', 'users.id', 'payment_records.tenant_id')
                ->leftJoin('properties', 'properties.id', 'payment_records.property_id')
                ->select('payment_records.*', 'users.*', 'properties.*')->where('users.owner_id', '=', $user->id)->get();
            $properties = $user->properties;

            logInfo($payments, "My payments");

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

            $tenantrec = User::where('id', $request->tenant)->first();

            if ($storefile) {
                $startdate = Carbon::parse($request->startdate);
                $duedate = Carbon::parse($request->duedate);

                try {

                    DB::beginTransaction();

                    $payment = PaymentRecord::create([
                        'property_id' => $request->property_id,
                        'unit_id' => $request->unit_id,
                        'paycat_id' => $request->payment_category,
                        'tenant_id' => $request->tenant_id,
                        'payment_status_id' => 3,
                        'payment_reference' => generateTransactionReference(),
                        'amount' => $request->payamount,
                        'paydate' => Carbon::now(),
                        'payment_status_id' => 2,
                        'amount_paid' => $request->payamount,
                        'payment_date' => Carbon::now(),
                        'startdate' => $startdate,
                        'duedate' => $duedate,
                        'duration' => $request->duration,
                        'duration_status' => '3',
                        'paymethod' => $request->paymethod,
                        'evidence_image' => $filename,
                    ]);


                    $tenantRecord = TenantRentalRecord::where('tenant_id', $request->tenant_id)->where('unit_id', $request->unit_id)->first();

                    logInfo($tenantRecord, "********************************");

                    if ($tenantRecord->start_date == null) {
                        $tenantRecord->start_date = $startdate;
                    }
                    $tenantRecord->end_date =  $duedate;
                    $tenantRecord->save();

                    // publish a notification for the user create action
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'owner_id' => $user->id,
                        'title' => "New Payment Record Added",
                        'message' => $user->name . ' added a new payment record, for (tenant: ' . $tenantrec->name . ') on TenancyPlus'
                    ]);

                    DB::commit();

                    if ($payment) {
                        Session::flash('flash_message', 'New tenant Payment Added Successfully');
                        return redirect()->back();
                    }
                } catch (\Exception $e) {

                    logInfo($e->getMessage(), "Server ERror!! Message");
                    DB::rollBack();
                    Session::flash('error_message', 'Server Error... Please try again later');
                }
            }
        }
    }

    public function addNewPayment(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            'amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'duration' => 'required|string',
            'start_date' => 'required|string',
            'due_date' => 'required|string',
            'unit_id' => 'required|string',
            'tenant_id' => 'required|string',
            'property_id' => 'required|string',
            'amount_paid' => 'required|numeric',
            'lease_amount' => 'required|numeric',
            'payment_category' => 'required|numeric',
            'payment_method' => 'required|required',
        ]);

        $user = Auth::user();

        if (Gate::allows('admin')) {

            if ($request->hasFile('file')) {
                $file = $request->file('file');

                // generate a new filename. getClientOriginalExtension() for the file extension
                $rand = rand(111, 9999);
                $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

                // save to storage/app/photos as the new $filename
                $storefile = $file->storeAs('public/payments/', $filename);
            } else {
                $filename = "";
            }

            try {

                DB::beginTransaction();

                $tenantrec = TenantRentalRecord::where('tenant_id', $request->tenant_id)->first();

                if ($storefile &&  $tenantrec) {
                    $startdate = Carbon::parse($request->start_date);
                    $duedate = Carbon::parse($request->due_date);

                    $payment = PaymentRecord::create([
                        'payment_reference' => generateTransactionReference(),
                        'property_id' => $request->property_id,
                        'unit_id' => $request->unit_id,
                        'paycat_id' => $request->payment_category,
                        'tenant_id' => $request->tenant_id,
                        'amount' => $request->amount,
                        'amount_paid' => $request->amount_paid,
                        'discount' => $request->discount,
                        'payment_date' => Carbon::now(),
                        'startdate' => $startdate,
                        'duedate' => $duedate,
                        'duration' => $request->total_months,
                        'payment_status_id' => 2,
                        'duration_status' => '3',
                        'paymethod' => $request->payment_method,
                        'evidence_image' => $filename,
                    ]);

                    if ($tenantrec->start_date == null) {
                        $tenantrec->update([
                            'start_date' => $request->start_date,
                            'end_date' => $request->due_date,
                        ]);
                    } else {
                        $tenantrec->update([
                            'end_date' => $request->due_date,
                        ]);
                    }

                    // publish a notification for the user create action
                    $notification = Notification::create([
                        'user_id' => $user->id,
                        'owner_id' => $user->id,
                        'title' => "New Payment Record Added",
                        'message' => "$user->first_name $user->last_name added a new payment record, for (tenant: $tenantrec->first_name $tenantrec->last_name) on TenancyPlus"
                    ]);

                    DB::commit();

                    if ($payment) {
                        Session::flash('flash_message', 'New tenant Payment Added Successfully');
                        return redirect()->back();
                    }
                } else {
                    Session::flash('flash_message', 'Failed to get tenant record');
                    return redirect()->back();
                }
            } catch (Exception $e) {
                DB::rollBack();

                Session::flash('error_message', 'Server Error! Please try again later');
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
