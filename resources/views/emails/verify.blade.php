@component('mail::message')
<h3>Bonjour !</h3>

Veuillez cliquer sur le bouton ci-dessous pour activer votre compte Easy RDV.

@component('mail::button', ['url' => $url])
Vérifier l'adresse mail
@endcomponent
Si vous n'avez pas créé de compte, il vous suffit de supprimer ce mail et tout sera comme avant.

Cordialement,<br>
Easy RDV
@endcomponent