@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert {{ session('alert-class') }}" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="container ptb-5">
        <div class="row">
            <div class="form-style-5 bg-white shadow-sm col-4 px-6 py-6 min-height">
                <form action="/" method="post">
                    <fieldset>
                        <legend>Prendre un rdv en ligne</legend>
                        <p>Rechercher un professionnel</p>
                        <input type="text" name="professional" placeholder="Professionnel" class="form-control my-2">
                        <input type="text" name="city" placeholder="Lieu"class="form-control ">
                        <input type="submit" value="Rechercher"class="btn-pr col-md-12 my-2"></button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
