<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AjaxRequestsController extends Controller
{
    public function fetch_free_units(Request $request)
    {
        if (Gate::allows('admin')) {

            $units = Unit::where('property_id', $request->property_id)->whereNot('status', 1)->get();

            return  response()->json($units);
        }
    }

    public function fetch_unit(Request $request)
    {
        if (Gate::allows('admin')) {

            $units = Unit::where('property_id', $request->property_id)->where('status', 1)->get();

            return  response()->json($units);
        }
    }

    public function fetch_tenant(Request $request)
    {
        if (Gate::allows('admin')) {
            $unit = Unit::where('id', $request->unit_id)->first();
            $tenant = $unit->tenant;

            if($tenant){
                return  response()->json($tenant);
            }else{
                return  response('');
            }
        }
    }

}
