@extends('layout')

@section('content')
<div class="form-style-5">
    <form action="/login" method="POST">
        @csrf
        <fieldset>
            <legend>Se connecter</legend>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="password" placeholder="Mot de passe">
            <input type="submit" value="Se connecter"></button>
        <fieldset>
    </form>
</div>

<div class="form-style-5">
    <form action="/login/new" method="POST">
        @csrf
        <fieldset>
            <legend>S'inscrire</legend>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="password" placeholder="Mot de passe">
            <input type="text" name="password_confirm" placeholder="Confirmer mot de passe">
            <input type="checkbox">Je suis d'accord avec le Terms et condition
            <input type="submit" value="Se connecter"></button>
        <fieldset>
    </form>
</div>
@endsection
