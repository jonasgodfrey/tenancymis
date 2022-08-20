<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $owner = $user->owner_id;
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

            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $owner,
                'title' => "New Property Created",
                'message' => $user->name . ' added a new property to TenancyPlus'
            ]);

            if ($property) {
                Session::flash('flash_message', 'Property Created Successfully !');
                return redirect()->back();
            }
        }
    }

    public function edit($id)
    {
        if (Gate::denies('admin_manager')) {
            abort('404');
        }

        $property = Property::findOrFail($id);

        # code...
        $state = State::all();
        $prop_cat = PropertyCategory::all();
        $prop_types = PropertyType::all();
        $countries = Country::all();

        return view('admin.property.edit')->with([
            'states' => $state,
            'prop_cats' => $prop_cat,
            'prop_types' => $prop_types,
            'countries' => $countries,
            'property' => $property
        ]);
    }


    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $owner = $user->owner_id;
        $rand = rand(111, 9999);

        $property = Property::find($id);
        $input = $request->all();


        $file = $request->file('logo');

        if ($file !== "") {

            $request->validate([
                'logo' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            ]);

            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/property/', $filename);
            $property->fill($input)->save();
            $property->update(['uploadsDir' => $filename ]);
        }else{
            $property->fill($input)->save();
        }


        // publish a notification for the user create action
        $notification = Notification::create([
            'user_id' => $user->id,
            'owner_id' => $owner,
            'title' => "Property Data Updated",
            'message' => "$user->name updated property details for $property->propname on TenancyPlus"
        ]);

        if ($property) {
            Session::flash('flash_message', 'Property Updated Successfully !');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        # code...
    }
}
