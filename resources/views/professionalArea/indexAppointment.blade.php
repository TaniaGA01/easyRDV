@extends('layouts.persoArea')

@section('meta_title')
Mes rendez-vous professionnels - {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('contentPagePerso')
<div class="container">
    <div class="row justify-content-center">
        <div class="my-past-appointments bck-gray shadow-sm col-md-12 px-5 py-5">
            @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert {{ session('alert-class') }}" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            @if(count($tab_my_activities_content)>0)

            <div class="container">
                <h2>Mes activités</h2>
                <div class="row">
                    @php $i=0; @endphp
                    @foreach ($tab_my_activities_content as $tab_my_activity_content)
                    <div class="col-md-4">
                        <div class="rdv bg-white shadow">
                            <div class="rdvInfo">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>{{ $tab_my_activities_content[$i] }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i>
                                    {{ $tab_my_activities_day[$i][0] }} à
                                    {{ $tab_my_activities_day[$i][1] }}h</p>

                                <input type="submit" data-id="{{ $tab_my_id_rdvs[$i] }}"
                                    data-tartempion="{{ $tab_my_activities_tartempion[$i] }}"
                                    data-token="<?php echo csrf_token();?>" data-pro="{{ $user->id }}"
                                    class="btn-pr btn-block data-rdv page-pro rdv-loaded activ-annul"
                                    value="Modifier/annuler l'activité"></button>
                            </div>
                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="my-appointments bg-white shadow-sm col-md-12 px-5 py-5">
            @if(count($tab_clients_name)>0)
            <div class="container">
                <h2>Prochains rendez-vous</h2>
                <div class="row">
                    @php $j = 0; @endphp
                    @foreach ($tab_clients_name as $tab_client_name)
                    <div class="col-md-6">
                        <div class="rdv bg-white shadow">
                            <div class="rdvInfo">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="https://picsum.photos/50/50" class="" alt="" width="50"
                                            height="50">
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title">{{ $tab_clients_name[$j] }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i>
                                    {{ $tab_my_rdv_day[$j][0] }} à
                                    {{ $tab_my_rdv_day[$j][1] }}h</p>
                                <p class="card-text"><i class="fas fa-phone"></i>
                                    {{ $tab_clients_phone[$j] }}</p>
                                <p class="card-text"><i class="fas fa-envelope"></i></i>
                                    {{ $tab_clients_mail[$j] }}</p>

                                <input type="submit" data-id="{{ $tab_id_rdvs[$j] }}"
                                    data-tartempion="{{ $tab_data_tartempion[$j] }}"
                                    data-token="<?php echo csrf_token();?>" data-name="{{ $tab_clients_name[$j] }}"
                                    data-pro="{{ $user->id }}"
                                    class="btn-pr btn-block data-rdv page-pro rdv-loaded rdv-annul"
                                    value="Annuler rendez-vous">

                            </div>
                        </div>
                    </div>
                    @php $j++; @endphp
                    @endforeach
                </div>
                @else
                <h2>Vous n'avez pas de rendez-vous actuellement.</h2>
                @endif
            </div>
        </div>
    </div>
    @endsection
</div>
</div>
