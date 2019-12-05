@extends('layouts.persoArea')


@section('contentPagePerso')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes informations personnelles</div>

                <div class="card-body py-5">
                    <form action="{{route('professionnelArea.update', Auth::user()->id)}}" method="POST">
                        @csrf

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Selectionner une photo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="last_name">Nom :</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">

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
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}">

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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

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
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="phone">Adresse :</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group justify-content-center row">
                            <div class="col-lg-10 col-md-12">
                                <label for="phone">A propos :</label>
                                <textarea class="form-control @error('about') is-invalid @enderror" name="about">{{ old('about') }}</textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @enderror
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
