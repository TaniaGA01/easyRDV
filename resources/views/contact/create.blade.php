@extends('layout')

@section('content')
<div class="form-style-5">
    <form action="/contact" method="POST">
        @csrf
        <fieldset>
            <legend>Nous contacter</legend>
            <!-- si le champ n'est pas rempli on affiche un message et on ajoute la classe bg-red -->
            @error('last_name'){{ $errors->first('last_name') }}@enderror
            <!-- {{ old('last_name') }} : si problème lors de la validation on garde la valeur écrite par l'utilisateur -->
            <input @error('last_name') class="bg-red" @enderror type="text" name="last_name"
                placeholder="Nom (obligatoire)" value="{{ old('last_name') }}">

            <input type="text" name="first_name" placeholder="Prenom (facultatif)" value="{{ old('first_name') }}">

            @error('email'){{ $errors->first('email') }}@enderror
            <input @error('email') class="bg-red" @enderror type="email" name="email" placeholder="Email (obligatoire)"
                value="{{ old('email') }}">

            <input type="text" name="phone" placeholder="Téléphone (facultatif)" value="{{ old('phone') }}">

            @error('content'){{ $errors->first('content') }}@enderror
            <textarea @error('content') class="bg-red" @enderror name="content" cols="30" rows="10"
                placeholder="Message (obligatoire)">{{ old('content') }}</textarea>

        </fieldset>
        <input type="submit" value="Envoyer le message"></button>
    </form>
</div>
@endsection
