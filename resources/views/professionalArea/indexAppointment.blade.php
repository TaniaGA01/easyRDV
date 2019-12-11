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

            @if(count($tab_my_activities_content)>0)
            <h5 class="card-title rdv-content">Mes activités</h5>
            <div class="row">
                @php $i=0; @endphp
                @foreach ($tab_my_activities_content as $tab_my_activity_content)
                <div class="card col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tab_my_activities_content[$i] }}</h5>
                        <hr>
                        <p class="card-text"><i class="far fa-calendar-alt"></i> {{ $tab_my_activities_day[$i][0] }} à
                            {{ $tab_my_activities_day[$i][1] }}h</p>

                        <input type="submit" data-id="{{ $tab_my_id_rdvs[$i] }}" data-tartempion="{{ $tab_my_activities_tartempion[$i] }}" data-token="<?php echo csrf_token();?>" data-pro="{{ $user->id }}" class="btn-pr btn-block data-rdv page-pro rdv-loaded activ-annul" value="Modifier/annuler l'activité"></button>

                    </div>
                </div>
                @php $i++; @endphp
                @endforeach

            </div>
            @endif

            @if(count($tab_clients_name)>0)
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

                        <input type="submit" data-id="{{ $tab_id_rdvs[$j] }}" data-tartempion="{{ $tab_data_tartempion[$j] }}" data-token="<?php echo csrf_token();?>" data-name="{{ $tab_clients_name[$j] }}" data-pro="{{ $user->id }}" class="btn-pr btn-block data-rdv page-pro rdv-loaded rdv-annul" value="Annuler rendez-vous">

                    </div>
                </div>
                @php $j++; @endphp
                @endforeach
            </div>
            @else
                <h5 class="card-title">Vous n'avez pas de rendez-vous actuellement.</h5>
            @endif
        </div>
    </div>
    @endsection
