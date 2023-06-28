@component('mail::message')
# Congratulation!!

Hi, {{ $checkout->user->name }} 
Your transaction has been confirmed, now you can enjoy the benefits of <b>{{ $checkout->camp->title }}</b> camp!

@component('mail::button', ['url' => 'user.dashboard'])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
