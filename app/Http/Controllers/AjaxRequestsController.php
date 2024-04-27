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


            $unit = Unit::leftJoin('tenant_rental_records', 'tenant_rental_records.unit_id', '=', 'units.id')
                ->leftJoin('property_categories', 'property_categories.id', '=', 'tenant_rental_records.property_category_id')
                ->leftJoin('payment_durations', 'payment_durations.id', '=', 'units.payment_duration_id')
                ->leftJoin('users', 'users.id', '=', 'tenant_rental_records.tenant_id')
                ->select('property_categories.category_name', 'users.*', 'units.*', 'units.id as unitId', 'payment_durations.*', 'tenant_rental_records.start_date', 'tenant_rental_records.end_date')->where('units.id', $request->unit_id)->first();


            // $unit = Unit::where('id', $request->unit_id)->first();
            // $tenant = $unit->tenant;

            if($unit){
                return  response()->json($unit);
            }else{
                return  response('');
            }
        }
    }

}
