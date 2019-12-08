@extends('layouts.persoArea')
@section('contentPagePerso')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert {{ session('alert-class') }}" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="form-style-5 bg-white shadow-sm col-md-12 px-5 py-5">
            @isset($appointments)
                <h5 class="card-title">Prochains rendez-vous</h5>
                
                
                <div class="row text-align">
                @php $i = 0; @endphp
                @foreach($appointments as $appointment)
                    <div class="card col-md-5">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$tab_pro_name[$i]}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted font-weight-bold">{{$tab_pro_profession[$i]}}</h6>
                            <hr>
                            <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i> {{$tab_day[$i]}} à {{$tab_hour[$i]}}h</p>
                            <p class="card-text"><i class="fas fa-map-marker"></i> {{$tab_pro_adresse[$i]}}<br>
                            {{$tab_pro_city[$i]}}</p>
                            <p class="card-text"><i class="fas fa-phone"></i> {{$tab_pro_phone[$i]}}</p>
                            <!--
                            <p class="card-text"><i class="fas fa-globe"></i> Site web</p>
                            -->
                            <div class="form-group justify-content-center row">
                                <input type="submit" class="btn-pr btn-block " value="Annuler le rendez-vous"></button>
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach
                </div>
                @else
                <h5 class="card-title">Vous n'avez pas de rendez-vous actuellement</h5>
            @endisset



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
                            <input type="submit" class="btn-pr btn-block " value="Reprendre un rendez-vous"></button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
