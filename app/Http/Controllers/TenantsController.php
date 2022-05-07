<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TenantsController extends Controller
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

            $properties = $user->properties;

            return view('admin.tenants.index')->with([
                'properties' => $properties,
            ]);
        }
    }

    public function fetch_units(Request $request)
    {
        if (Gate::allows('admin')) {
            # code...
            $property = Property::where('id', $request->propid)->first();
            $units = $property->units;

            return  response()->json($units);
        }
    }

    public function tenantsdashboard()
    {
        return view('tenants.index')->with([]);
    }
}
