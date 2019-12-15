@extends('layouts.persoArea')

@section('meta_title')
Mes rendez-vous - {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('contentPagePerso')
<div class="container">
    <div class="row justify-content-center">
        <div class="my-appointments bg-white shadow-sm col-md-12 px-5 py-5">
            @if (session('status'))
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="text-center alert {{ session('alert-class') }}" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            @if(count($tab_appointments)>0)

            <div class="container">
                    <h2>Prochains rendez-vous</h2>
                <div class="row">
                    @php $i = 0; @endphp
                    @foreach($tab_appointments as $tab_appointment)
                    <div class="col-md-6">
                        <div class="rdv bg-white shadow">
                            <div class="rdvInfo">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="/uploads/photos/{{ $tab_appointments[$i]['image'] ?: 'default.png' }}" class="" alt="{{ $tab_appointments[$i]['name'] }} {{ $tab_appointments[$i]['profession'] }}" width="50" height="50">
                                    </div>
                                    <div class="col-9">
                                        <h5>{{ $tab_appointments[$i]['name'] }}</h5>
                                        <h6>{{ $tab_appointments[$i]['profession'] }}</h6>
                                    </div>
                                </div>
                                <hr>

                                <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i>
                                    {{ $tab_appointments[$i]['date'][0] }} à {{ $tab_appointments[$i]['date'][1] }}h</p>
                                <p class="card-text"><i class="fas fa-map-marker"></i>
                                    {{ $tab_appointments[$i]['address'] }}<br>
                                    {{ $tab_appointments[$i]['city'] }}</p>
                                <p class="card-text"><i class="fas fa-phone"></i> {{ $tab_appointments[$i]['phone'] }}
                                </p>
                                <input type="submit"
                                class="btn-pr btn-block data-rdv page-pro rdv-loaded rdv-annul page-client"
                                data-client="{{Auth::user()->id}}" data-id="{{ $tab_appointments[$i]['id_rdv'] }}"
                                data-tartempion="{{ $tab_appointments[$i]['data_tartempion'] }}"
                                data-name="{{ $tab_appointments[$i]['name'] }}" data-token="<?php echo csrf_token();?>"
                                value="Annuler le rendez-vous">
                            </div>

                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>
            </div>
            @else
            <h2>Vous n'avez pas de rendez-vous actuellement.</h2>
            @endif</div>
    </div>
    <div class="row justify-content-center">
            @if(count($tab_appointments_before)>0)
        <div class="my-past-appointments bck-bleu shadow-sm col-md-12 px-5 py-5">
            <div class="container">
            <h2>Rendez-vous passés</h2>
                <div class="row">
                    @php $j = 0; @endphp
                    @foreach($tab_appointments_before as $tab_appointment_before)
                    <div class="col-md-6">
                        <div class="rdv bg-white shadow">
                            <div class="rdvInfo">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="/uploads/photos/{{ $tab_appointments_before[$j]['image'] ?: 'default.png' }}" class="" alt="{{ $tab_appointments_before[$j]['name'] }} {{ $tab_appointments_before[$j]['profession'] }}" width="50" height="50">
                                    </div>
                                    <div class="col-9">
                                        <h5 class="card-title font-weight-bold">
                                            {{ $tab_appointments_before[$j]['name'] }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            {{ $tab_appointments_before[$j]['profession'] }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i>
                                    {{ $tab_appointments_before[$j]['date'][0] }} à
                                    {{ $tab_appointments_before[$j]['date'][1] }}h</p>
                                <p class="card-text"><i class="fas fa-map-marker"></i>
                                    {{ $tab_appointments_before[$j]['address'] }}<br>
                                    {{ $tab_appointments_before[$j]['city'] }}</p>
                                </p>
                                <p class="card-text"><i class="fas fa-phone"></i>
                                    {{ $tab_appointments_before[$j]['phone'] }}</p>

                                <a href="{{ route('show', [
                                    'profession' => $tab_appointments_before[$j]['profession'],
                                    'city' => str_replace(" ","-",$tab_appointments_before[$j]['city']),
                                    'first_name' => $tab_appointments_before[$j]['first_name'],
                                    'last_name' => str_replace(" ","-",$tab_appointments_before[$j]['last_name'])
                                    ]) }}" class="btn btn-pr btn-block">Reprendre un rendez-vous
                                </a>
                            </div>
                        </div>
                    </div>
                    @php $j++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
