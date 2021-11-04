@component('mail::message')
# Introduction

A New User Account has been created for you.

UserName :
<br>
Password :

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
