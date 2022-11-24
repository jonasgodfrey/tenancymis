<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\InbrandedController;
use App\Http\Controllers\NotificationController;
use App\Models\Notification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\EmailVerification;
use App\Models\Role;
use App\Models\UserSubscription;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'purpose' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $regCode = "PLA" . rand(11100, 999999);
        $admin_role = Role::where('name', 'admin')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'purpose' => $request->purpose,
            'role' => 'admin',
            'owner_id' => 0,
            // 'username' => $validatedData['username'],
            'usercode' => $regCode,
            // 'sponsors_id' => $validatedData['referrer_code'],
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach($admin_role);

        $user->update([
            'otp' => rand(111111, 999999),
            'owner_id' => $user->id,
        ]);

        $notification = Notification::create([
            'user_id' => $user->id,
            'owner_id' => $user->id,
            'title' => "New Signup",
            'message' => 'You just signed up welcome to PLA'
        ]);

        UserSubscription::create([
            "user_id" => $user->id,
            "start_date" => Carbon::now(),
            "end_date" => Carbon::now()->addMonth(),
            "status" => 'active',
            "plan_type" => 2,
            "amount" => 0,
            "total_units_no" => 5,
        ]);

        $datax = [
            'name' => $user->name,
            'email' => $user->email,
            'otp' => $user->otp
        ];

        // $inbrandedController = new InbrandedController();

        // $registerInbranded = $inbrandedController->register($user->name, $user->email);

        // if(!$registerInbranded['status']){
        //     return response()->json(['status' => '01', 'message' => 'Failed to Register webhook']);
        // }

        $notificationController = new NotificationController();

        $message = "Hi $request->name, Welcome to MyTenancyPlus. Thank you for Signing up with the No. 1 property management solution in Africa.\nKindly click the link below to sign in to your portal";

        $notificationController->sendSMSWithSendChamp($request->phone, $message);

        try {
            //code...

            Mail::to($user->email)
                ->send(new Welcome($datax));

            Mail::to($user->email)
                ->send(new EmailVerification($datax));
        } catch (\Throwable $th) {
            //throw $th;

        }

        $token = $user->createToken('auth_token')->plainTextToken;

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
