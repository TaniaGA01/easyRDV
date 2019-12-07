@extends('layouts.persoArea')


@section('contentPagePerso')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Mes informations personnelles</div>

                <div class="card-body py-5">
                    <form  enctype="multipart/form-data" action="{{route('clientArea.update', Auth::user()->id)}}" method="POST">
                        @csrf
                        @isset($user) @method('PUT') @endisset

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                            <label for="photo">Photo :</label>
                                <div class="custom-file">
                                    <input id="photo" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Selectionner une photo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="last_name">Nom :</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="@isset($user){{$user->last_name}}@else{{ old('last_name') }}@endisset">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="first_name">Prénom :</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="@isset($user){{$user->first_name}}@else{{ old('first_name') }}@endisset">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="email">Email :</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@isset($user){{$user->email}}@else{{ old('email') }}@endisset">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="phone">Téléphone :</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="@isset($user){{$user->phone_number}}@else{{ old('phone') }}@endisset">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="adresse">Adresse :</label>
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="@isset($user){{$user->adresse}}@else{{ old('adresse') }}@endisset">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                            <label for="city">Ville :</label>

                            <input id="city" list="cities" name="city" class="form-control input-search" value="@isset($user->city_id){{ $user->city->name_ville }}@endisset">
                            <datalist id="cities">
                            @foreach($cities as $city)
                                <option data-value="{{ $city->id }}" value="@isset($user->city_id){{ $city->name_ville }}@endisset">
                            @endforeach
                            </datalist>
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <input type="submit" class="btn-pr btn-block " value="Mettre à jour"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
