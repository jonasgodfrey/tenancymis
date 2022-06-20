<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            dd($e);
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $user = Auth::user();
        $data = json_decode($paymentDetails['data']['metadata']['0']);
        $amount = $paymentDetails['data']['amount'];
        $payDate = $paymentDetails['data']['created_at'];
        $units = $data->unit;
        $package = $data->plan_type;
        $duedate = null;
        $status = $paymentDetails['data']['status'];

        if($package == 1){
            $duedate = Carbon::parse($payDate);
            $duedate->addMonth();
        }
        if ($package == 2) {
            $duedate = Carbon::parse($payDate);
            $duedate->addYear();
        }

        if ($status == 'success') {
            $subscription = UserSubscription::create([
                'user_id' => $user->id,
                'start_date'=> Carbon::parse($payDate),
                'end_date'=> $duedate,
                'status'=> 'active',
                'plan_type'=> $package,
                'total_units_no'=> $units,
                'amount'=> $amount,
            ]);

            if ($subscription) {
                Session::flash('flash_message', 'Subcription Successful !');
                return redirect('dashboard');
            }
        }
       
    }
}
