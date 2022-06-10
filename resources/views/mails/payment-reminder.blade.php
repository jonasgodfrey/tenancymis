@component('mail::message')

<h3></h3>

<h3> Hello {{$data['name']}}, </h3>



<p>Your rent at <b>{{$data['prop_name']}}</b> is expiring {{$data['due_date']}},
     kindly ensure to make payments before the due date to avoid any issues</p>

<p>
    If you have any complaints please contact our support.
</p>

<p>
    Best Regards,<br>
    {{ config('app.name') }}
</p>

@endcomponent
