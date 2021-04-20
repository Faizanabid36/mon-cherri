@component('mail::message')
# Verify Email

Click the link below to verify your email

@component('mail::button', ['url' => $route])
Verification Link
@endcomponent

You are receiving this email because we received a email reset request for your account.

If you did not request a password reset, no further action is required.

Regards,<br>
{{ config('app.name') }}

<hr>

@component('mail::subcopy')
If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ $route }}]({{ $route }})
@endcomponent
@endcomponent