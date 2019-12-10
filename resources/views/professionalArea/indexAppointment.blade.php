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
                        <form method="POST" action="{{ route('professionnelArea.deleteRdv', Auth::user()->id) }}">
                            @csrf
                            <div class="form-group justify-content-center row">
                                <input type="hidden" name="id_rdv" value="{{ $tab_id_activities[$i] }}">
                                <input type="submit" class="btn-pr btn-block " value="Annuler l'activité"></button>
                            </div>
                        </form>
                    </div>
                </div>
                @php $i++; @endphp
                @endforeach

            </div>

            <h5 class="card-title">Prochains rendez-vous</h5>
            <div class="row">
                @php $j = 0; @endphp
                @foreach ($tab_clients_name as $tab_client_name)
                <div class="card col-md-5">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tab_clients_name[$j] }}</h5>
                        <hr>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> {{ $tab_my_rdv_day[$j][0] }} à
                            {{ $tab_my_rdv_day[$j][1] }}h</p>
                        <p class="card-text"><i class="fas fa-phone"></i> {{ $tab_clients_phone[$j] }}</p>
                        <p class="card-text"><i class="fas fa-at"></i> {{ $tab_clients_mail[$j] }}</p>
                        <form method="POST" action="{{ route('professionnelArea.deleteRdv', Auth::user()->id) }}">
                            @csrf
                            <div class="form-group justify-content-center row">
                                <input type="hidden" name="id_rdv" value="{{ $tab_id_rdvs[$j] }}">
                                <input type="submit" class="btn-pr btn-block " value="Annuler rendez-vous"></button>
                            </div>
                        </form>
                    </div>
                </div>
                @php $j++; @endphp
                @endforeach
            </div>
        </div>
    </div>
    @endsection
