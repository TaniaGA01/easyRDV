@extends('layouts.app')

@section('content')
<div class="form-style-5">
    <form action="/" method="post">
        <fieldset>
            <legend>Prendre un rdv en ligne</legend>
            <p>Rechercher un professionnel</p>
            <input type="text" name="professional" placeholder="Professionnel">
            <input type="text" name="city" placeholder="Lieu">
            <input type="submit" value="Rechercher"></button>
        </fieldset>
    </form>
</div>
@endsection
