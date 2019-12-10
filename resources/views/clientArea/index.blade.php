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
            @if(count($tab_appointments)>0)
            <h5 class="card-title">Prochains rendez-vous</h5>
            <div class="row">
                @php $i = 0; @endphp
                @foreach($tab_appointments as $tab_appointment)
                <div class="card col-md-5">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $tab_appointments[$i]['name'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted font-weight-bold">
                            {{ $tab_appointments[$i]['profession'] }}</h6>
                        <hr>

                        <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i>
                            {{ $tab_appointments[$i]['date'][0] }} à {{ $tab_appointments[$i]['date'][1] }}h</p>
                        <p class="card-text"><i class="fas fa-map-marker"></i>
                            {{ $tab_appointments[$i]['address'] }}<br>
                            {{ $tab_appointments[$i]['city'] }}</p>
                        <p class="card-text"><i class="fas fa-phone"></i> {{ $tab_appointments[$i]['phone'] }}</p>
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
            <h5 class="card-title">Vous n'avez pas de rendez-vous actuellement.</h5>
            @endif
            @if(count($tab_appointments_before)>0)
            <h5 class="card-title">Rendez-vous passés</h5>
            <div class="row">
                @php $j = 0; @endphp
                @foreach($tab_appointments_before as $tab_appointment_before)
                <div class="card col-md-5">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $tab_appointments_before[$j]['name'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $tab_appointments_before[$j]['profession'] }}</h6>
                        <hr>
                        <p class="card-text font-weight-bold"><i class="far fa-calendar-alt"></i> {{ $tab_appointments_before[$j]['date'][0] }} à {{ $tab_appointments_before[$j]['date'][1] }}h</p>
                        <p class="card-text"><i class="fas fa-map-marker"></i> {{ $tab_appointments_before[$j]['address'] }}<br>
                            {{ $tab_appointments_before[$j]['city'] }}</p></p>
                        <p class="card-text"><i class="fas fa-phone"></i> {{ $tab_appointments_before[$j]['phone'] }}</p>
                        <!-- 
                        <p class="card-text"><i class="fas fa-globe"></i> Site web</p>
                        -->
                        <!-- Route::get('/professionnels/{profession}/{city}/{first_name}_{last_name}','HomeController@show')->name('show'); -->
                        <div class="form-group justify-content-center row">
                            <!-- <input type="submit" class="btn-pr btn-block " value="Reprendre un rendez-vous"></button> -->
                            <a href="{{ route('show', [
                                'profession' => $tab_appointments_before[$j]['profession'],
                                'city' => str_replace(" ","-",$tab_appointments_before[$j]['city']),
                                'first_name' => $tab_appointments_before[$j]['first_name'],
                                'last_name' => str_replace(" ","-",$tab_appointments_before[$j]['last_name'])
                                ]) }}" class="btn btn-pr btn-block">Reprendre un rendez-vous</a>
                        </div>
                    </div>
                </div>
                @php $j++; @endphp
                @endforeach
            </div>
            @endif
        </div>
    </div>
    @endsection
