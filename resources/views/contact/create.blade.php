@extends('layouts.app')
@section('meta_title')
Nous contacter
@endsection

@section('content')
<div class="container ptb-5">
    <div class="title">
        <h1>Nous vous rapprochons de vos clients potentiels avec notre agenda en ligne</h1>
    </div>
    <div class="row justify-content-center pt-6">
        <div class="col-lg-5 col-md-12 row justify-content-center">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10657.273766789185!2d-1.6311037!3d48.1040925!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaaeab7e3b81b7174!2sBuroscope!5e0!3m2!1sfr!2sfr!4v1576161337423!5m2!1sfr!2sfr" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                <div class="contact-info bck-bleu shadow-sm px-6 py-6 min-height justify-content-center ">
                    <h3>Siège social</h3>
                    <p><i class="fas fa-map-marker"></i>4 Rue de Bray, 35510 <span>Cesson-Sévigné</span></p>
                    <p><i class="fas fa-phone"></i>02 99 22 84 84</p>
                    <p><i class="fa fa-paper-plane" aria-hidden="true"></i>contact@easyrdv.com</p>
                </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="bg-white shadow-sm px-6 py-6 min-height">
                <div class="title pb-4">
                    <h2>Nous contacter</h2>
                </div>


                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf

                        <!-- si le champ n'est pas rempli on affiche un message et on ajoute la classe bg-red -->

                        <!-- {{ old('last_name') }} : si problème lors de la validation on garde la valeur écrite par l'utilisateur -->

                        <div class="justify-content-center row">
                            <div class="form-group  col-lg-6 col-md-12">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus placeholder="Nom *">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="given-name" autofocus placeholder="Prénom">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="justify-content-center row">
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email *">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="tel" autofocus placeholder="Téléphone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="justify-content-center row">
                            <div class="form-group col-lg-12 col-md-12">
                                <textarea rows="5" class="form-control @error('content') is-invalid @enderror" name="content" autofocus placeholder="Message *">{{ old('content') }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3 ">(*) Champs obligatoires</small>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <input type="submit" class="btn-pr btn-block " value="Envoyer le message"></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
