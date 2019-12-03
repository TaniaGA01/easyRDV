@extends('layouts.app')

@section('content')
    <div class="container ptb-6">
        <div class="row">
            <div class="form-style-5 bg-white shadow-sm col-4 p-6">
                <form action="/" method="post">
                    <fieldset>
                        <legend>Prendre un rdv en ligne</legend>
                        <p>Rechercher un professionnel</p>
                        <input type="text" name="professional" placeholder="Professionnel" class="form-control">
                        <input type="text" name="city" placeholder="Lieu"class="form-control">
                        <input type="submit" value="Rechercher"class="btn btn-primary btn-md col-md-7"></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
