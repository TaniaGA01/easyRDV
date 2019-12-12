@component('mail::message')
<strong>Message de  : </strong> {{ $data['last_name'] }} {{ $data['first_name'] }} <br>
<strong>E-mail : </strong> {{ $data['email'] }} <br>
<strong>Téléphone : </strong> {{ $data['phone'] }} <br>

<strong>Message : </strong> <br>
{{ $data['content'] }}



<br>
@endcomponent
