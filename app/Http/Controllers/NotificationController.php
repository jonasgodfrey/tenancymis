<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\PaymentRecord;
use Carbon\Carbon;
use GuzzleHttp\Client;
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

        $default = PaymentRecord::all();
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

    }

    public function sendSchedule($scheduleData)
    {
        # code...

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

                Mail::to($row->tenant->email)->send(new ReminderEmail($datax));

                $payload = [

                    "SMS" => [
                        "auth" => [
                            "username" => "ngotrack2018@gmail.com",
                            "apikey" => "0d4a9306a7c07a06f546d4a529d597847c4f4ba4",
                        ],
                        "message" => [
                            "sender" => "MyTenancyPlus",
                            "messagetext" => "Hello " . $datax['name'] . ", Your rent at " . $datax['prop_name'] . "\n is expiring " . $datax['due_date'] . ". kindly ensure to make payments before the due date thank you. If you have any complaints please contact our support [support@mytenancyplus.com].\n best regards,\n mytenancyplus.com",
                            "flash" => "0"
                        ],
                        "recipients" => [
                            "gsm" => [
                                [
                                    "msidn" => $datax['phone'],
                                    "msgid" => 'test',
                                ],

                            ]
                        ]
                    ]
                ];

                Http::withBody(json_encode($payload), 'application/json')->withOptions([
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ]
                ])->post('https://api.ebulksms.com/sendsms.json');

            } catch (\Throwable $th) {
                return $th;
            }
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
                } if (($status == '2') && (Carbon::today()->gt($due_date))) {

                    $update_status = $row->update([
                        'duration_status' => '1'
                    ]);
                }

            } catch (\Throwable $th) {
                return $th;
            }
        }
    }

}
