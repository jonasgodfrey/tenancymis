<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\PaymentRecord;
use Carbon\Carbon;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function sendreminderemail()
    {

        $schedules1 = PaymentRecord::whereBetween('duedate', [now()->addDays(1), now()->addDays(2)])->get();
        $schedules3 = PaymentRecord::whereBetween('duedate', [now()->addDays(3), now()->addDays(4)])->get();
        $schedules7 = PaymentRecord::whereBetween('duedate', [now()->addDays(7), now()->addDays(8)])->get();
        $schedules14 = PaymentRecord::whereBetween('duedate', [now()->addDays(14), now()->addDays(15)])->get();
        $schedules30 = PaymentRecord::whereBetween('duedate', [now()->addDays(30), now()->addDays(31)])->get();

        // One Day Due
        $schedules = [$schedules1, $schedules3, $schedules7, $schedules14, $schedules30];

        foreach ($schedules as $schedule) {
            # code...
            $this->sendSchedule($schedule);
        }

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
                    'total_amount' => $row->amount,
                    'payment_date' => $payment_date->format('M d Y'),
                    'due_date' =>  $due_date->diffForHumans() . ' (' .$due_date->format('M d Y').')'
                ];

                Mail::to($row->tenant->email)->send(new ReminderEmail($datax));
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }
}
