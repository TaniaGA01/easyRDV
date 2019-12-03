@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" justify-content-center col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">Se connecter</div>
                <div class="card-body py-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <input placeholder="Email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-10">
                                <input placeholder="Mot de passe" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn btn-primary btn-md col-md-7">Se connecter</button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class=" justify-content-center col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">S'inscrire</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input placeholder="Email" type="email" class="form-control @error('email_register') is-invalid @enderror"
                                    name="email_register" value="{{ old('email_register') }}" required autocomplete="email">

                                @error('email_register')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input placeholder="Mot de passe" type="password"
                                    class="form-control @error('password_register') is-invalid @enderror" name="password_register"
                                    required autocomplete="new-password">

                                @error('password_register')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-10">
                                <input placeholder="Confirmer mot de passe" type="password" class="form-control"
                                    name="password_register_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                                <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input @error('cgu_register') is-invalid @enderror" type="checkbox" name="cgu_register" id="cgu_register" >

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
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection
