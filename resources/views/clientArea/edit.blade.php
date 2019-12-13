@extends('layouts.persoArea')

@section('meta_title')
Mes informations personnelles - {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('contentPagePerso')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="my-personal-info bg-white shadow-sm col-md-12 px-6 py-6">
                <h2>Mes informations personnelles</h2>

                <form enctype="multipart/form-data" action="{{route('clientArea.updateAvatar', Auth::user()->id)}}" method="POST" style="max-width: 500px;margin: auto;margin-bottom: 25px;">

                    <img src="/uploads/photos/{{ $user->image }}" style="width:50px; height:50px; float:left; border-radius:50%; margin-right:25px;">

                    <label>Selectionner une image de profil</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>

                <form enctype="multipart/form-data" action="{{route('clientArea.update', Auth::user()->id)}}"
                    method="POST">
                    @csrf
                    @isset($user) @method('PUT') @endisset

                    {{-- <div class="form-group justify-content-center row">
                        <div class="col-lg-12 col-md-12">
                            <label for="photo">Photo :</label>
                            <div class="custom-file">
                                <input id="photo" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Selectionner une photo</label>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group justify-content-center row">
                        <div class="col-lg-6 col-md-12">
                            <label for="first_name">Prénom :</label>
                            <input id="first_name" disabled type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="@isset($user){{$user->first_name}}@else{{ old('first_name') }}@endisset">

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="last_name">Nom :</label>
                            <input id="last_name" disabled type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="@isset($user){{$user->last_name}}@else{{ old('last_name') }}@endisset">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group justify-content-center row">
                        <div class="col-lg-6 col-md-12">
                            <label for="email">Email :</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="@isset($user){{$user->email}}@else{{ old('email') }}@endisset">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="phone">Téléphone :</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone"
                                value="@isset($user){{$user->phone_number}}@else{{ old('phone') }}@endisset">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group justify-content-center row">
                        <div class="col-lg-6 col-md-12">
                            <label for="adresse">Adresse :</label>
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror"
                                name="adresse"
                                value="@isset($user){{$user->adresse}}@else{{ old('adresse') }}@endisset">

                            @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('adresse') }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="city">Ville :</label>

                            <input id="city" list="cities" name="city" class="form-control input-search @error('city') is-invalid @enderror"
                                value="@isset($user->city_id){{ $user->city->name_ville }}@endisset">
                            <datalist id="cities">
                                @foreach($cities as $city)
                                <option data-value="{{ $city->id }}"
                                    value="@isset($user->city_id){{ $city->name_ville }}@endisset">
                                    @endforeach
                            </datalist>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group justify-content-center row pt-2">
                        <div class="col-lg-12 col-md-12">
                            <input type="submit" class="btn-pr btn-block " value="Mettre à jour"></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
