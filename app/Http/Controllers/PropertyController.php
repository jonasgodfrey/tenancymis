<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
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

        # code...
        $state = State::all();
        $prop_cat = PropertyCategory::all();
        $prop_types = PropertyType::all();
        $countries = Country::all();
        $properties = $user->properties;

        return view('admin.property.index')->with([
            'states' => $state,
            'prop_cats' => $prop_cat,
            'prop_types' => $prop_types,
            'countries' => $countries,
            'properties' => $properties
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
        ]);

        $file = $request->file('logo');
        $user = Auth::user();
        // generate a new filename. getClientOriginalExtension() for the file extension
        $rand = rand(111, 9999);

        $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $storefile = $file->storeAs('public/property/', $filename);

        if ($storefile) {
            $property = Property::create([
                'propcatId' => $request->propcat,
                'proptypeId' => $request->proptype,
                'ownerId' => $user->id,
                'propname' => $request->propname,
                'propaddress' => $request->address,
                'propdesc' => $request->propdesc,
                'email' => $request->email,
                'phone' => $request->tel,
                'countryId' => $request->country,
                'stateId' => $request->state,
                'uploadsDir' => $filename,
            ]);

            if ($property) {
                Session::flash('flash_message', 'Property Created Successfully !');
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
