@extends('layouts.app')
@section('content')
<div class="container ptb-5">
    <div class="row">
            <div class="form-style-5 bg-white shadow-sm col-4 px-6 py-6 min-height">
                <img src="{{$user->image}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $user->first_name }} {{ Str::upper($user->last_name) }}</h5>
                    @if($user->role_id == 2)
                    <p class="card-text">{{ $user->profession->name }}</p>
                    @endif
                </div>
                @if($user->role_id == 2)
                <a href="{{ route('professionnelArea.indexAgenda', Auth::user()->id) }}" class="btn btn-pr btn-block">Mon agenda</a>
                <a href="{{ route('professionnelArea.indexAppointment', Auth::user()->id) }}" class="btn btn-pr btn-block">Mes rendez-vous</a>
                <a href="{{ route('professionnelArea.edit', Auth::user()->id) }}" class="btn btn-pr btn-block">Mes
                    informations personnelles</a>
                @else
                <a href="{{ route('clientArea.index', Auth::user()->id) }}" class="btn btn-pr btn-block">Mes rendez-vous</a>
                <a href="{{ route('clientArea.edit', Auth::user()->id) }}" class="btn btn-pr btn-block">Mes
                    informations personnelles</a>
                @endif
                
            </div>
        <div class="col-8">
            @yield('contentPagePerso')
        </div>
    </div>
</div>
@endsection
