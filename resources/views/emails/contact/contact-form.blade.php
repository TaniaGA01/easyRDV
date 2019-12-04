@component('mail::message')
# Message de la part de {{ $data['last_name'] }} {{ $data['first_name'] }}
E-mail : {{ $data['email'] }}
Téléphone : {{ $data['phone'] }}

Message :
{{ $data['content'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
