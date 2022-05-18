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

         # code...
         $payments_records = PaymentRecord::all();
         $now = Carbon::now();

         $schedules1 = PaymentRecord::whereBetween('created_at', [now()->addDays(1), now()->addDays(2) ])->get();
         dd($schedules1);

         // One Day Due
        //  $payments_records->where();
         $datax = [
            // 'description' => $request->description,

            // 'project_title' => $project->title,

            // 'name' => $user->name,

            

        ];

        // Mail::to($user->email)
        // ->send(new ReminderEmail($datax));
        

     }
}
