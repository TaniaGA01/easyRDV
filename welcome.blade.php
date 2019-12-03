@extends('layout')

@section('content')
<div class="form-style-5">
    <form autocomplete="off" action="/" method="post">
        <fieldset>
            <legend>Prendre un rdv en ligne</legend>
            <p>Rechercher un professionnel</p>
            <input id="myInput" type="text" name="professional" placeholder="Professionnel">
            <input type="text" name="city" placeholder="Lieu">
            <input type="submit" value="Rechercher"></button>
        </fieldset>
    </form>
</div>
<script src="{{asset('js/autocomplete.js')}}"></script>

@endsection
