@extends('layouts.app')

@section('content')

<div class="container ptb-5">
    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-12">
                <div class="card">
                        <div class="card-header">Informations personnelles</div>
                        <div class="card-body py-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-5">
                                        <input placeholder="Prénom" type="text" class="form-control" name="name" value="{{ old('') }}" required autocomplete="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input placeholder="Nom" type="text" class="form-control" name="lastName" value="{{ old('') }}" required autocomplete="lastName">
                                        @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-2">
                                        <input placeholder="Téléphone" type="text" class="form-control" name="phoneNumber" value="{{ old('') }}" required autocomplete="phoneNumber">
                                        @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input placeholder="Ville" type="text" class="form-control" name="city" value="{{ old('') }}" required autocomplete="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <input placeholder="Adresse" type="text" class="form-control" name="addrese" value="{{ old('') }}" required autocomplete="addrese">
                                        @error('addrese')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <textarea placeholder="À propos moi" type="text" class="form-control" name="addrese" value="{{ old('') }}" required autocomplete="addrese"></textarea>
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
