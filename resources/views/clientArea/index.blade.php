@extends('layouts.persoArea')
@section('contentPagePerso')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert {{ session('alert-class') }}" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body ">


                    <h5 class="card-title">Prochains rendez-vous</h5>
                    <div class="row">
                        <div class="card col-md-5">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nom Prénom</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Métier</h6>
                                <hr>
                                <p class="card-text"><i class="far fa-calendar-alt"></i> Date du rdv</p>
                                <p class="card-text"><i class="fas fa-map-marker"></i> Adresse</p>
                                <p class="card-text"><i class="fas fa-phone"></i> Téléphone</p>
                                <p class="card-text"><i class="fas fa-globe"></i> Site web</p>
                                <div class="form-group justify-content-center row">
                                <input type="submit" class="btn-pr btn-block " value="Annuler rendez-vous"></button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <h5 class="card-title">Rendez-vous passés</h5>
                    <div class="row">
                        <div class="card col-md-5">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nom Prénom</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Métier</h6>
                                <hr>
                                <p class="card-text"><i class="far fa-calendar-alt"></i> Date du rdv</p>
                                <p class="card-text"><i class="fas fa-map-marker"></i> Adresse</p>
                                <p class="card-text"><i class="fas fa-phone"></i> Téléphone</p>
                                <p class="card-text"><i class="fas fa-globe"></i> Site web</p>
                                <div class="form-group justify-content-center row">
                                <input type="submit" class="btn-pr btn-block " value="Reprendre rendez-vous"></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    @endsection
