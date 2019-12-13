@component('mail::message')
Bonjour !

Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse mail.

@component('mail::button', ['url' => $url])
Vérifier l'adresse mail
@endcomponent
Si vous n'avez pas créé de compte, aucune autre action n'est requise.

Cordialement,<br>
{{ config('app.name') }}

@endcomponent