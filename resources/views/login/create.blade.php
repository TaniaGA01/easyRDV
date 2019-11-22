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

            @error('email_register'){{ $errors->first('email_register') }}@enderror
            <input type="email" name="email_register" placeholder="Email" value="{{ old('email_register') }}">

            @error('password_register'){{ $errors->first('password_register') }}@enderror
            <input type="password" name="password_register" placeholder="Mot de passe">

            @error('password_confirm_register'){{ $errors->first('password_confirm_register') }}@enderror
            <input type="password" name="password_register_confirmation" placeholder="Confirmer mot de passe">

            @error('cgu_register'){{ $errors->first('cgu_register') }}@enderror
            <input type="checkbox" id="cgu" name="cgu_register">
            <label for="cgu">"Je suis d'accord avec les Conditions Générales d'Utilisation"</label>

            <input type="submit" value="S'inscrire"></button>

        <fieldset>
    </form>
</div>
@endsection
