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
    <div class="row justify-content-center">
        <div class="form-style-5 bg-white shadow-sm col-md-12 px-5 py-5">
            <h5 class="card-title">Mes activités</h5>
            <div class="row">
                @php $i=0; @endphp
                @foreach ($tab_my_activities_content as $tab_my_activity_content)
                <div class="card col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tab_my_activities_content[$i] }}</h5>
                        <hr>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> {{ $tab_my_activities_day[$i][0] }} à
                            {{ $tab_my_activities_day[$i][1] }}h</p>
                        <div class="form-group justify-content-center row">
                            <input type="submit" class="btn-pr btn-block " value="Annuler l'activité"></button>
                        </div>
                    </div>
                </div>
                @php $i++; @endphp
                @endforeach

            </div>

            <h5 class="card-title">Prochains rendez-vous</h5>
            <div class="row">
                @foreach ($rdvs as $rdv)
                <div class="card col-md-5">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $rdv->id }}</h5>
                        <hr>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> Date du rdv</p>
                        <p class="card-text"><i class="fas fa-phone"></i> Téléphone</p>
                        <p class="card-text"><i class="fas fa-at"></i> Mail</p>
                        <div class="form-group justify-content-center row">
                            <input type="submit" class="btn-pr btn-block " value="Annuler rendez-vous"></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
