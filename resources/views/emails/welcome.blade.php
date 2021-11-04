@component('mail::message')
A New User Account Has been created for you:

#Username {{ $user->username ?? '' }}

#Email: {{ $password  ?? ''}}

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
