@component('mail::message')
# Welcome!

Hi, {{ $user->name }}
<br>
Welcome to Laracamp. Your account has ben created successfully. Now you can choose your best match Camp!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
