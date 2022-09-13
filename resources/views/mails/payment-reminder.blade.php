@component('mail::message')

<h3></h3>

<h3> Hello {{$data['name']}}, </h3>



<p>Your rent at <b>{{$data['prop_name']}}</b> is expiring {{$data['due_date']}},
Kindly ensure to make payments before the due date thank you.</p>

<p>
If you have any complaints please contact our support support@mytenancyplus.com
</p>

<p>
    Best Regards,<br>
    {{$data['prop_name']}}
</p>

@endcomponent
