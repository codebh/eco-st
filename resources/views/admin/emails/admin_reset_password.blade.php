@component('mail::message')
#Reset Account
welcome {{$data['data']->name}}<br>
The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
click Here to reset Your Password
@endcomponent

<a href="{{aurl('reset/password/'.$data['token'])}}">{{aurl('reset/password/'.$data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
