<?php

namespace App\Http\Controllers;

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
        # code...
        if (Gate::allows('admin')) {

            $request->validate([
                'unitpics' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            ]);

            $units_num = $user->units->count();

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
                'propId' => $request->propname,
                'typeId' => $request->unittype,
                'unitNum' => $request->unitno,
                'unitDesc' => $request->unitdesc,
                'leaseAmount' => $request->rentamount,
                'name' => $request->unitname,
                'status' => 'empty',
                'image' => $filename,
                'owner_id' => $user->id
            ]);

            if ($unit) {
                Session::flash('flash_message', 'Unit Created Successfully !');
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
}
