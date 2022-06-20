<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $owner_id = $user->owner_id;
        $owner = User::where('id', $owner_id)->first();

        if (Gate::allows('admin')) {

            if (Gate::allows('is_subscribed')) {
                abort('404');
            }
            return view('subscription.index');
        } else {

            if ($owner->subscriptionStatus('active')) {

                abort('404');
            } else {

                return view('subscription.users');
            }
        }
    }

    public function users()
    {
        $user = Auth::user();

        $owner_id = $user->owner_id;
        $owner = User::where('id', $owner_id)->first();

        if ($owner->subscriptionStatus('active')) {
            abort('404');
        } else {
            return redirect('subscription.users');
        }
    }
}
