@component('mail::message')

The following message was sent by {{$contactUs->name}}.

Email: {{$contactUs->email}}

Phone: {{$contactUs->phoneNo}}

Message: {{$contactUs->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
