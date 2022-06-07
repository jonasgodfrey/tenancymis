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

        // One Day Due
        $schedules = [$schedules1, $schedules3, $schedules7, $schedules14, $schedules30, $default];

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
                    'phone' => $row->tenant->phone,
                    'total_amount' => $row->amount,
                    'payment_date' => $payment_date->format('M d Y'),
                    'due_date' =>  $due_date->diffForHumans() . ' (' .$due_date->format('M d Y').')'
                ];

                Mail::to($row->tenant->email)->send(new ReminderEmail($datax));

                // $client = new Client();

                $payload = [
                    
                    "SMS" => [
                        "auth" => [
                            "username" => "ngotrack2018@gmail.com",
                            "apikey" => "56d55c9d36560666d2dcf02459a3ca86203591ce",
                        ],
                        "message" => [
                            "sender" => "Tenancy+",
                            "messagetext" => "Hello, ". $data['name'] ."Your rent is expiring ". $data['due_date'] ."kindly ensure to make payments before the due date to avoid any issues. If you have any complaints please contact our support.",
                            "flash" => "0"
                        ],
                        "recipients" =>
                        [
                            "gsm" => [
                                [
                                    "msidn" => $data['phone'],
                                    "msgid" => $data['phone'],
                                ],
                               
                            ]
                        ]
                    ]
                
                ];
        
                $res =  Http::withBody(json_encode($payload), 'application/json')
                ->withOptions([
                'headers' => [
                    'Content-Type' => 'application/json',
                   
                ]
                ])
                ->post('http://api.ebulksms.com:8080/sendsms.json');

                
            } catch (\Throwable $th) {
                return $th;
            }
        }
    }

    public function sendsms(Request $request)
    {

        $payload = [
            
            "SMS" => [
                "auth" => [
                    "username" => "ngotrack2018@gmail.com",
                    "apikey" => "56d55c9d36560666d2dcf02459a3ca86203591ce",
                ],
                "message" => [
                    "sender" => "Tenancy+",
                    "messagetext" => "Hello, kindly ensure to make payments before the due date to avoid any issues. If you have any complaints please contact our support.",
                    "flash" => "0"
                ],
                "recipients" =>
                [
                    "gsm" => [
                        [
                            "msidn" => $request->phone,
                            "msgid" => 'test',
                        ],
                       
                    ]
                ]
            ]
        
        ];
       $res =  Http::withBody(json_encode($payload), 'application/json')
            ->withOptions([
            'headers' => [
                'Content-Type' => 'application/json',
               
            ]
            ])
            ->post('http://api.ebulksms.com:8080/sendsms.json');


            return $res;

        // $client = new \GuzzleHttp\Client();


        // // return $request->phone;


        

        // $response = $client->post('http://api.ebulksms.com:8080/sendsms.json', [
        //     'debug' => fopen('php://stderr', 'w'),
        //     'forms_params' => $payload,
        //     'headers' => [
        //         'Content-Type' => 'application/json',
               
        //     ]
        //   ]);


        //   return $response;
        
    }
}
