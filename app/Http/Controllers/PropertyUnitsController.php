<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\PaymentCategory;
use App\Models\PaymentRecord;
use Illuminate\Http\Request;
use App\Models\UnitType;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PropertyUnitsController extends Controller
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

            $unitstype = UnitType::all();
            $properties = $user->properties;
            $units = $user->units;
            $sub = $user->subscription->where('status', 'active')->first();

            return view('admin.units.index')->with([
                'unitstype' => $unitstype,
                'properties' => $properties,
                'units' => $units
            ]);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $owner = $user->owner_id;

        # code...
        if (Gate::allows('admin')) {

            $request->validate([
                'unitpics' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            ]);

            $units_num = $user->units->count();
            $property_units_num = Unit::where('property_id', $request->property_name)->count();

            $sub = $user->subscription->where('status', 'active')->first();
            $sub_unit_num = (int)$sub->total_units_no;


            if ($units_num === $sub_unit_num) {
                Session::flash('flash_message', 'Maximum Number of units for your plan reached please upgrade plan to add more units!');
                return redirect()->back();
            }

            $file = $request->file('unitpics');

            // generate a new filename. getClientOriginalExtension() for the file extension
            $rand = rand(111, 9999);
            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

            // save to storage/app/photos as the new $filename
            $storefile = $file->storeAs('public/unit/', $filename);

            $unit = Unit::create([
                'property_id' => $request->property_name,
                'type_id' => $request->unittype,
                'unitNum' => $request->unitno,
                'unit_ref_id' => "unit_" . $property_units_num++,
                'unit_description' => $request->unit_description,
                'lease_amount' => $request->rentamount,
                'name' => $request->unitname,
                'status' => 'empty',
                'image' => $filename ?? "null",
                'owner_id' => $user->id
            ]);

            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $owner,
                'title' => "New Unit Created",
                'message' => $user->name . ' added a new unit to TenancyPlus'
            ]);

            if ($unit) {
                Session::flash('flash_message', 'Unit Created Successfully !');
                return redirect()->back();
            }
        }
    }

    public function store_multiple(Request $request)
    {
        $user = Auth::user();
        $owner = $user->owner_id;

        # code...
        if (Gate::allows('admin')) {

            $units_num = $user->units->count();
            $property_units_num = Unit::where('property_id', $request->property_name)->count();

            $sub = $user->subscription->where('status', 'active')->first();
            $sub_unit_num = (int)$sub->total_units_no;


            if ($units_num === $sub_unit_num) {
                Session::flash('flash_message', 'Maximum Number of units for your plan reached please upgrade plan to add more units!');
                return redirect()->back();
            }

            $new_units_to_be_added = $request->multiple_unit_count + $units_num;

            if ($new_units_to_be_added > $sub_unit_num) {
                Session::flash('flash_message', 'Maximum Number of units for your plan exceeded please upgrade plan to add more units!');
                return redirect()->back();
            }

            $file = $request->file('unitpics');
            $filename = '';
            // generate a new filename. getClientOriginalExtension() for the file extension
            if (!empty($file)) {
                $rand = rand(111, 9999);
                $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

                // save to storage/app/photos as the new $filename
                $storefile = $file->storeAs('public/unit/', $filename);
            }


            $i = 0;

            while ($i < $request->multiple_unit_count) {

                if ($units_num === $sub_unit_num) {
                    Session::flash('flash_message', 'Maximum Number of units for your plan reached please upgrade plan to add more units!');
                    return redirect()->back();
                }
                $property_units_num++;
                $unit = Unit::create([
                    'property_id' => $request->property_name,
                    'type_id' => $request->unittype,
                    'unit_ref_id' => "unit_" . $property_units_num,
                    'unit_description' => $request->unit_description,
                    'lease_amount' => $request->rentamount,
                    'name' => $request->unitname,
                    'status' => 'empty',
                    'image' => $filename,
                    'owner_id' => $user->id
                ]);
                $i++;
            }


            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $owner,
                'title' => $request->multiple_unit_count . " New Units Created",
                'message' => $user->name . ' added new units to TenancyPlus'
            ]);

            if ($unit) {
                Session::flash('flash_message', 'Units Created Successfully !');
                return redirect()->back();
            }
        }
    }

    public function update(Request $request)
    {
        # code...
    }
    public function delete(Request $request)
    {
        # code...
    }
    public function showUnitInfo($unit_id)
    {
        $user = Auth::user();
        if (Gate::allows('admin')) {

            $unit = Unit::find($unit_id);

            if (!$unit) {
                Session::flash('error_message', 'Invalid Unit provided');
                return redirect()->to('/');
            }

            if ($unit->property->owner_id != $user->id) {
                Session::flash('error_message', 'Maximum Number of units for your plan reached please upgrade plan to add more units!');
                return redirect()->back();
            }
            $sub = $user->subscription->where('status', 'active')->first();
            $paymentRecords = PaymentRecord::where('unit_id', $unit_id)->get();
            $paymentCategories = PaymentCategory::all();

            return view('admin.units.show_details')->with([
                'unit' => $unit,
                'payment_records' => $paymentRecords,
                'payment_categories' => $paymentCategories
            ]);
        }
    }
}
