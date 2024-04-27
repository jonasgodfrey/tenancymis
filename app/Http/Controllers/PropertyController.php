<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use App\Models\Country;
use App\Models\PaymentDuration;
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
use Illuminate\Support\Facades\DB;
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
        $properties = Property::leftJoin('units', 'units.property_id', '=', 'properties.id')
            ->leftJoin('tenant_rental_records', 'tenant_rental_records.unit_id', '=', 'units.id')
            ->leftJoin('property_categories', 'properties.property_category_id', '=', 'property_categories.id')
            ->select('properties.id', 'properties.property_name','property_categories.category_name', 'properties.property_address', DB::raw('COUNT(units.id) as total_units'), DB::raw('COUNT(tenant_rental_records.id) as total_tenants'))
            ->groupBy('properties.id', 'properties.property_name', 'properties.property_address', 'property_categories.category_name')
            ->where('properties.owner_id', $user->id)->get();

        logInfo($properties);

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
        $paymentDuration = PaymentDuration::all();
        $property = Property::find($property_id);
        $units = Unit::where(['property_id' => $property_id])->get();
        $assignable_units = Unit::where(['property_id' => $property_id, 'status' => 0])->get();
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
            'paymentDuration' => $paymentDuration,
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
                'property_category_id' => $request->propcat,
                'proptype_id' => $request->proptype,
                'owner_id' => $user->id,
                'property_name' => $request->property_name,
                'property_address' => $request->address,
                'property_description' => $request->property_description,
                'email' => $request->email,
                'phone' => $request->tel,
                'country_id' => $request->country,
                'state_id' => $request->state,
                'uploads_dir' => $filename,
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
            $property->update(['uploads_dir' => $filename]);
        } else {
            $property->fill($input)->save();
        }


        // publish a notification for the user create action
        $notification = Notification::create([
            'user_id' => $user->id,
            'owner_id' => $owner,
            'title' => "Property Data Updated",
            'message' => "$user->name updated property details for $property->property_name on TenancyPlus"
        ]);

        if ($property) {
            Session::flash('flash_message', 'Property Updated Successfully !');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $property =  Property::findOrFail($request->property_id);

        if ($property) {

            $units = $property->units;

            if (count($units) > 0) {
                return response()->json(['status' => 1, 'message' => 'This property cannot be deleted because it contains units']);
            }

            Unit::whereIn('property_id', [$request->property_id])->select('id')->delete();
            // User::whereIn('email', $tenants->pluck('email'))->delete();
            // Tenant::whereIn('email', $tenants->pluck('email'))->delete();

            $property->delete();

            // publish a notification for the user create action
            $notification = Notification::create([
                'user_id' => $user->id,
                'owner_id' => $user->owner_id,
                'title' => "Property Delete",
                'message' => "$user->name deleted $property->property_name from TenancyPlus"
            ]);
        }

        return response()->json(['status' => 0, 'message' => 'Property Deleted successfully']);
    }
}
