@extends('layouts.app')

@section('content')

<div class="container ptb-5">
    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-12">
                <div class="card">
                        <div class="card-header">Informations personnelles</div>
                        <div class="card-body py-5">
                            <form method="POST" action="{{ route('userInformations.store') }}">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-5">
                                        <input placeholder="Prénom" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input placeholder="Nom" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autocomplete="lastName">
                                        @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-2">
                                        <input placeholder="Téléphone" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phoneNumber">
                                        @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input placeholder="Ville" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input placeholder="Adresse" type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">
                                        @error('addrese')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <textarea placeholder="À propos moi" type="text" class="form-control" name="about" value="{{ old('') }}" required autocomplete="addrese"></textarea>
                                        @error('addrese')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group justify-content-center row mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn-pr btn-block">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>

    </div>
</div>

@endsection
