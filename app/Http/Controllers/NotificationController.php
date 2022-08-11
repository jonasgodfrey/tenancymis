<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Tenant;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\PaymentRecord;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function sendreminderemail()
    {

        $default = PaymentRecord::where('paystatus_id', '3')->get();
        $schedules1 = PaymentRecord::whereBetween('duedate', [now()->addDays(1), now()->addDays(2)])->get();
        $schedules3 = PaymentRecord::whereBetween('duedate', [now()->addDays(3), now()->addDays(4)])->get();
        $schedules7 = PaymentRecord::whereBetween('duedate', [now()->addDays(7), now()->addDays(8)])->get();
        $schedules14 = PaymentRecord::whereBetween('duedate', [now()->addDays(14), now()->addDays(15)])->get();
        $schedules30 = PaymentRecord::whereBetween('duedate', [now()->addDays(30), now()->addDays(31)])->get();

        //array of data
        $schedules = [$schedules1, $schedules3, $schedules7, $schedules14, $schedules30, $default];

        foreach ($schedules as $schedule) {
            # code...
            $this->sendSchedule($schedule);
        }

        /**
         *  Change user payment status based on days left
         */
        $this->checkAndUpdatePaymentStatus($schedules30, 30);
        $this->checkAndUpdatePaymentStatus($default, 'none');

        echo('success');

    }

    public function sendSchedule($scheduleData)
    {
        # code...
        $phoneNumbers = [];

        foreach ($scheduleData as $row) {

            try {
                $payment_date = Carbon::parse($row->paydate);
                $due_date = Carbon::parse($row->duedate);


                $datax = [
                    'name' => $row->tenant->name,
                    'phone' => $row->tenant->phone,
                    'prop_name' => $row->property->propname,
                    'total_amount' => $row->amount,
                    'payment_date' => $payment_date->format('M d Y'),
                    'due_date' => $due_date->diffForHumans() . ' (' . $due_date->format('M d Y') . ')'
                ];

                $mail = Mail::to([$row->tenant->email])->send(new ReminderEmail($datax));

                $message = "Hello " . $datax['name'] . ", Your rent at " . $datax['prop_name'] . "\n is expiring " . $datax['due_date'] . ". kindly ensure to make payments before the due date thank you. If you have any complaints please contact our support [support@mytenancyplus.com].\n best regards,\n mytenancyplus.com";


                $phone =  $datax['phone'];

                if (!str_starts_with($phone, '2') && str_starts_with($phone, 0)) {
                    $phone = ltrim($phone, $phone[0]);
                    $phone = '234' . $phone;
                }

                if (str_starts_with($phone, '+')) {
                    $phone = ltrim($phone, $phone[0]);
                    $phone = '234' . $phone;
                }

                $this->sendSMSWithSendChamp($phone, $message);

            } catch (\Throwable $th) {
                return $th;
            }

        }

    }


    public function sendSMSWithSendChamp(string $numbers, string $message)
    {

        try {

            $body = [
                "message" => $message,
                "to" => $numbers,
                "sender_name" => "TenancyPlus",
                "route" => "international"
            ];

            $header = [
                "Accept" => "application/json",
                "Authorization" => "Bearer sendchamp_live_$2y$10$90d6tRGTwBdvG7HFm/rfzOzHPlf6ANaoacOUlPHuH9b6Gtk8oSS9i",
                "Content-Type" => "application/json",
            ];

            $response = Http::withHeaders($header)->post("https://api.sendchamp.com/api/v1/sms/send", $body);

        } catch (Exception $e) {
        }
    }

    public function checkAndUpdatePaymentStatus($tenantData, $daysLeft)
    {
        foreach ($tenantData as $row) {

            try {
                $due_date = Carbon::parse($row->duedate);
                $status = $row->duration_status;

                if (($status == '3') && ($daysLeft == 30)) {

                    $update_status = $row->update([
                        'duration_status' => '2'
                    ]);
                }
                if (($status == '2') && (Carbon::today()->gt($due_date))) {

                    $update_status = $row->update([
                        'duration_status' => '1'
                    ]);
                }
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }

    final public function clear_all(Request $request)
    {
        $notifications = Notification::where('status', 'unseen')->get();

        foreach ($notifications as $notification) {
            $notification->update(['status' => 'seen']);
        }

        return redirect()->back();
    }
}
