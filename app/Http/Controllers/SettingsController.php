<?php

namespace App\Http\Controllers;

use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Http\Request;
use UnitEnum;

class SettingsController extends Controller
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
        $cat = PropertyCategory::all();
        
        return view('admin.settings.index')->with([
            'category' => $cat,
        ]);
    }

    public function addpropertycat(Request $request)
    {
        $cat = $request->catname;

        $propcat = PropertyCategory::create([
            'category_name' => $cat,
        ]);

        if ($propcat) {
            return response()->json([
               'New property category created',
            ]);
        }else{
            return response()->json([
               'An error occured',
            ]);
        }
    }

    public function addpropertytype(Request $request)
    {
        $type = $request->typename;
        $cat = $request->catname;

        $proptype = PropertyType::create([
            'propcatId' => $cat,
            'typename' => $type,
        ]);

        if ($proptype) {
            return response()->json([
               'New property type created',
            ]);
        }else{
            return response()->json([
               'An error occured',
            ]);
        }
    }

    public function addunitname(Request $request)
    {
        $name = $request->unitname;
        $cat = $request->catname;

        $unit = UnitType::create([
            'propcatId' => $cat,
            'name' => $name,
        ]);

        if ($unit) {
            return response()->json([
               'New property category created',
            ]);
        }else{
            return response()->json([
               'An error occured',
            ]);
        }
    }


}
