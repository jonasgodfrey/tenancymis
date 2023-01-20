<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\UnitType;
use App\Models\User;
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

    public function propertyUnits($property_id)
    {
        $user = Auth::user();

        # code...
        $state = State::all();
        $prop_cat = PropertyCategory::all();
        $prop_types = PropertyType::all();
        $countries = Country::all();
        $properties = $user->properties;
        $property = Property::find($property_id);
        $units = Unit::where(['propId' => $property_id])->get();
        $assignable_units = Unit::where(['propId' => $property_id, 'status' => 'empty'])->get();
        $users = User::where('owner_id', $user->id)->get();

        $unitstype = UnitType::all();

        return view('admin.property.units')->with([
            'states' => $state,
            'prop_cats' => $prop_cat,
            'prop_types' => $prop_types,
            'countries' => $countries,
            'property' => $property,
            'users' => $users,
            'units' => $units,
            'assignable_units' => $assignable_units,
            'unitstype' => $unitstype
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:jpeg,jpg,png,mime|max:3008',
            'propcat' => 'required',
            'proptype' => 'required',
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

        if (!empty($file)) {

            $request->validate([
                'logo' => 'mimes:jpeg,jpg,png,mime|max:3008',
            ]);

            $filename = 'attached-file-' . $rand . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/property/', $filename);
            $property->fill($input)->save();
            $property->update(['uploadsDir' => $filename]);
        } else {
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
        $user = Auth::user();
        $property =  Property::findOrFail($request->propid);

        if ($property) {

            $units = $property->units;

            if (count($units) > 0) {
                return response()->json(['status' => 1, 'message' => 'This property cannot be deleted because it contains units']);
            }

            Unit::whereIn('propId', [$request->propid])->select('id')->delete();
            // User::whereIn('email', $tenants->pluck('email'))->delete();
            // Tenant::whereIn('email', $tenants->pluck('email'))->delete();

            $property->delete();

            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $user->owner_id,
                'title' => "Property Delete",
                'message' => "$user->name deleted $property->propname from TenancyPlus"
            ]);
        }

            return response()->json(['status' => 0, 'message' => 'Property Deleted successfully']);
        
    }
}
