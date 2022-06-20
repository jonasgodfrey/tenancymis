<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $auth_user = Auth::user();
        $owner_id = $auth_user->owner_id;
        $owner = User::where('id', $owner_id)->first();
        $user = null;

        if ($auth_user->role == "admin") {
            $user = $auth_user;
        }else{
            $user = $owner;
        }

        if ($user->subscriptionStatus('active')) {
            return $next($request);
        } else {
            return redirect('subscription');
        }
    }
}
