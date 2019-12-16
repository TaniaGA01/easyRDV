@extends('layouts.app')

@section('meta_title')
@if ($user->first_name || $user->last_name)
Mes informations personnelles - {{ $user->first_name }} {{ $user->last_name }}
@else
Mes informations personnelles
@endif
@endsection

@section('content')

<div class="container ptb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12">
            @if (session('status'))
            <div class="row justify-content-center ">
                <div class="col-md-12 col-sm-12">
                    <div class="alert {{ session('alert-class') }}" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white shadow-sm col-lg-12 px-6 py-6 min-height">
                <!-- #TODO required -->

                <div class="title-lg pb-4">
                        <h2>Informations personnelles</h2>
                    </div>

                    <form method="POST" action="{{ route('userInformations.store') }}" class="personalInfos">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <input class="form-control @error('first_name') is-invalid @enderror" placeholder="Prénom *" type="text"  name="first_name" value="{{ $user->first_name ? $user->first_name : old('first_name') }}"  autocomplete="given-name" required>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group ">
                                <input class="form-control @error('last_name') is-invalid @enderror"  placeholder="Nom *" type="text"  name="last_name" value="{{ $user->last_name ? $user->last_name : old('last_name') }}"  autocomplete="family-name" required>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group  col-md-3">
                                <input class="form-control @error('phone_number') is-invalid @enderror" placeholder="Téléphone *" type="text"  name="phone_number" value="{{ $user->phone_number ? $user->phone_number : old('phone_number') }}"  autocomplete="tel" required>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group  col-md-6">
                                <input class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse @if($user->role_id == 2)* @endif" type="text"  name="adresse" value="{{ $user->adresse ? $user->adresse : old('adresse') }}" autocomplete="street-address" @if($user->role_id == 2)  @endif>
                                @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <input class="form-control input-search @error('city') is-invalid @enderror" id="city" list="cities" name="city" placeholder="Villes @if($user->role_id == 2)* @endif" value="@isset($user->city_id){{ $user->city->name_ville }}@else{{ old('city') }}@endisset">
                                <datalist id="cities">
                                @foreach($cities as $city)
                                    <option data-value="{{ $city->id }}" value="{{ $city->name_ville }}">
                                @endforeach
                            </datalist>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @if($role_id == 2)
                            <div class="form-group row justify-content-center">
                                <div class="col-md-12">
                                    <textarea placeholder="À propos moi" type="text" class="form-control"  name="about">{{ old('about') }}</textarea>
                                    @error('addrese')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <small id="emailHelp" class="form-text text-muted mb-3">(*) Champs obligatoires</small>
                        <div class="alert alert-primary" role="alert">
                                Les informations enregistrées sont réservées à l’usage du (ou des) service(s) concerné(s) et ne peuvent être communiquées qu’aux professionnels contactés à travers de EasyRDV. Depuis la loi n° 78-17 du 6 janvier 1978 modifiée, relative à l’informatique, aux fichiers et aux libertés, toute personne peut obtenir communication et, le cas échéant, rectification ou suppression des informations la concernant, en s’adressant au service client de EasyRDV avec copie au DPO de l’établissement (quand il a été nommé).
                              </div>
                        <div class="form-group justify-content-center row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn-pr btn-block">Envoyer</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
