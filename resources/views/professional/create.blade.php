@extends('layouts.app')

@section('meta_title')
Inscription gratuite pour les professionnels
@endsection

@section('content')
<div class="container ptb-5">
    <div class="title">
        <h1>N’hésitez pas à essayer gratuitement notre plateforme</h1>
    </div>
    <div class="row pt-6">
        <div class=" col-lg-4 col-md-12 ">
            <div class="container bg-white shadow-sm px-6 py-6 min-height">
                    <form method="POST" action="{{ route('register') }}">
                            <h3>Je suis un professionnel</h3>
                            <p>et je voudrais m’inscrire</p>
                            @csrf
                            <input type="hidden" name="professional" value="professional">
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12">
                                    <input placeholder="Email" type="email"
                                        class="form-control @error('email_register') is-invalid @enderror" name="email_register"
                                        value="{{ old('email_register') }}" autocomplete="email">

                                    @error('email_register')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <input placeholder="Mot de passe" type="password"
                                        class="form-control @error('password_register') is-invalid @enderror"
                                        name="password_register" autocomplete="new-password">

                                    @error('password_register')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input placeholder="Confirmer mot de passe" type="password" class="form-control"
                                        name="password_register_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-12">
                                    <select class="form-control @error('profession_id') is-invalid @enderror" name="profession_id">
                                        <option>Sélectionnez votre métier</option>
                                        @foreach ($professions as $profession)
                                        <option value="{{$profession->id}}"
                                            {{ old('profession_id') == $profession->id ? "selected":""}}>{{$profession->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('profession_id')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input @error('cgu_register') is-invalid @enderror" type="checkbox"
                                            name="cgu_register" id="cgu_register">

                                        <label for="cgu_register">
                                            Je suis d'accord avec les<a href=""> Conditions Générales d'Utilisation</a>
                                        </label>

                                        @error('cgu_register')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn-pr btn-block">S'inscrire</button>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 ">
            <div class="price container bck-bleu shadow-sm px-6 py-6 min-height">
                <h3>Abonnement</h3>
                <h2>BASIC</h2>
                <ul>
                    <li>Agenda</li>
                    <li>Page de présentation</li>
                    <li>Une image</li>
                    <li>Notifications E-mail</li>
                </ul>
                <h4>2€/mois</h4>
                <a class="btn-pr btn-block btn mt-3" href="#">Je m'abonne</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 ">
            <div class="price container bck-bleu shadow-sm px-6 py-6 min-height">
                <h3>Abonnement</h3>
                <h2>PREMIUM</h2>
                <ul>
                    <li>Agenda, page de présentation, cinque images et map de situation</li>
                    <li>Notifications et Réferencement Google</li>
                </ul>
                <h4>3,50€/mois</h4>
                <a class="btn-pr btn-block btn mt-3" href="#">Je m'abonne</a>
            </div>
        </div>
    </div>
</div>
@endsection
