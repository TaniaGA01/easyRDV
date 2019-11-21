@extends('layout')

@section('content')
<div class="form-style-5">
    <form action="/login" method="POST">
        @csrf
        <fieldset>
            <legend>Se connecter</legend>
            <input type="email" name="email_login" placeholder="Email">
            <input type="password" name="password_login" placeholder="Mot de passe">
            <input type="submit" value="Se connecter"></button>
        <fieldset>
    </form>
</div>

<div class="form-style-5">
    <form action="/login/new" method="POST">
        @csrf
        <fieldset>
            <legend>S'inscrire</legend>
            <input type="email" name="email_register" placeholder="Email">
            <input type="password" name="password_register" placeholder="Mot de passe">
            <input type="password" name="password_confirm_register" placeholder="Confirmer mot de passe">
            <input type="checkbox" name="cgu_register">"Je suis d'accord avec les Conditions Générales d'Utilisation"
            <input type="submit" value="S'inscrire"></button>
        <fieldset>
    </form>
</div>
@endsection
