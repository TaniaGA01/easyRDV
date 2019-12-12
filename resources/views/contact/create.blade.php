@extends('layouts.app')

@section('content')
<div class="container ptb-5">
    <div class="row justify-content-center ">
        <div class="title">
            <h1>Nous vous approchons à vos clients potentiels avec notre agenda en ligne</h1>
        </div>
        <div class="col-lg-5 col-md-12">
            
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="card">
                <div class="card-header">Nous contacter</div>

                <div class="card-body py-5">
                    <form action="{{route('contact.store')}}" method="POST">
                        @csrf

                        <!-- si le champ n'est pas rempli on affiche un message et on ajoute la classe bg-red -->

                        <!-- {{ old('last_name') }} : si problème lors de la validation on garde la valeur écrite par l'utilisateur -->

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus placeholder="Nom *">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="given-name" autofocus placeholder="Prénom">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email *">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="tel" autofocus placeholder="Téléphone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <textarea rows="5" class="form-control @error('content') is-invalid @enderror" name="content" autofocus placeholder="Message *">{{ old('content') }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted mb-3 ml-5 pl-3">(*) Champs obligatoires</small>
                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="submit" class="btn-pr btn-block " value="Envoyer le message"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
