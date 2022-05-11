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

            return view('admin.units.index')->with([
                'unitstype' => $unitstype,
                'properties' => $properties,
            ]);
        }
    }

    public function store(Request $request)
    {
        # code...
        if (Gate::allows('admin')) {

            $request->validate([
                'unitpics' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            ]);

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
