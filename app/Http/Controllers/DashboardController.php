<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Unit;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\UserSubscription;


class DashboardController extends Controller
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

        $properties_num = $user->properties->count();
        $units_num = $user->units->count();
        $tenants_num = $user->tenants->count();
        $tenants = $user->tenants;

        if (Gate::allows('admin')) {
            return view('admin.dashboard.index')->with([
                'properties' => $properties_num,
                'units' => $units_num,
                'tenants_num' => $tenants_num,
                'tenants' => $tenants
            ]);
        }

        if (Gate::allows('manager')) {
            return view('users.manager.index')->with([]);
        }

        if (Gate::allows('accountant')) {
            return view('users.accountant.index')->with([]);
        }

        if (Gate::allows('artisan')) {
            return view('users.artisan.index')->with([]);
        }

        if (Gate::allows('tenant')) {
            return view('users.tenants.index')->with([]);
        }
    }

    public function superdash()
    {
        // $user = Auth::user('admin@mytenancyplus.com');

      
        $properties_all = Property::count();
        $units_all = Unit::count();
        $tenants_all = Tenant::count();
        $subscriptions = UserSubscription::sum('amount');
        $subscribers = UserSubscription::count();
        $residential = Property::where('propcatId', 2)->count();
        $commercial = Property::where('propcatId', 1)->count();

        // $kobollin = Cei::where('llin_recipient','Yes')->count();

        // dd($residential);
      

        if (Gate::allows('admin')) {
            return view('admin.dashboard.superadmin')->with([
                'properties_all' => $properties_all,
                'units_all' => $units_all,
                'tenants_all' => $tenants_all,
                'subscriptions' => $subscriptions,
                'subscribers' => $subscribers,
                'residential' => $residential,
                'commercial' => $commercial,
                
            ]);
        }
    }
}
