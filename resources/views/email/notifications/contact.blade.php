@component('mail::message')
# Message

Name : {{ucfirst($contact->name)}}

Email : {{$contact->email}}

Message : {{$contact->message}}

@component('mail::button', ['url' => url('/dashoard')])
View Dashboard
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent