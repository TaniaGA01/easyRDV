@extends('layouts.app')
@section('content')
<div class="container ptb-5">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <img src="{{$user->image}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $user->first_name }} {{ Str::upper($user->last_name) }}</h5>
                    <p class="card-text">{{ $user->profession->name }}</p>
                </div>
                <a href="{{ route('professionnelArea.indexAgenda', Auth::user()->id) }}" class="btn btn-pr btn-block">Mon agenda</a>
                <a href="#" class="btn btn-pr btn-block">Mes rendez-vous</a>
                <a href="{{ route('professionnelArea.edit', Auth::user()->id) }}" class="btn btn-pr btn-block">Mes
                    informations personnelles</a>
            </div>
        </div>
        <div class="col-9">
            @yield('contentPagePerso')
        </div>
    </div>
</div>
@endsection
