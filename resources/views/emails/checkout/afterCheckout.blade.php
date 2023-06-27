@component('mail::message')
# Welcome,

Hi, {{ $checkout->user->name }}
<br>
Thank you for your registered at <strong>{{ $checkout->camp->title }}</strong>, please see the payment instructions by click the button below!

@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
