@component('mail::message')

<h3></h3>

<h3> Hello {{$data['name']}}, </h3>



<p>Your rent is expiring {{$data['due_date']}},
     kindly ensure to make payments before the due date to avoid any issues</p>

<p>
    If you have any complaints please contact our support.
</p>
    
{{-- <p>
    <u>Follow the steps below to get started</u>
</p>

<ol>
    <li>Update your profile</li>
    <li>Subscribe to a package</li>
    <li>Share your affiliate link</li>
</ol> --}}

{{-- @component('mail::button', ['url'   ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent