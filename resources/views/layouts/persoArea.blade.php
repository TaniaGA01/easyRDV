@extends('layouts.app')

@section('content')
<div class="container ptb-5">
    <div class="row">
            <div class="form-style-5 col-lg-4 col-md-12 min-height">
                <div class="text-center bg-white px-6 py-6 shadow-sm">
                    <div class="row">
                        <div class="col-4 p-0">
                                <div class="persoPhoto">
                                        <img src="/uploads/photos/{{$user->image}}" class="card-img-top" alt="..." width="auto">
                                    </div>
                        </div>
                        <div class="col-8 persoName">
                                <h2>{{ $user->first_name }} {{ Str::upper($user->last_name) }}</h2>
                                @if($user->role_id == 2)
                                <p>{{ $user->profession->name }}</p>
                        </div>
                        @endif
                    </div>
                </div>
                @if(Auth::user()->role_id == 3)
                    <form class="bg-white px-5 pt-4 mt-2 pb-2 shadow-sm" method="POST" autocomplete="off">
                        <fieldset>
                            <h3>Prendre un rdv en ligne</h3>
                            <p>Rechercher une profession</p>
                            <input list="suggestions" type="text" name="pros" id="pros" placeholder="Profession"
                                class="form-control my-2" autocomplete="off">
                            <datalist id="suggestions"></datalist>

                            <input list="suggestions-locs" type="text" name="locs" id="locs" placeholder="Lieu"
                                class="form-control " autocomplete="off">
                            <datalist id="suggestions-locs"></datalist>

                            <input type="submit" value="Rechercher" class="btn-pr col-md-12 my-2"></button>
                            @csrf
                        </fieldset>
                    </form>
                    <form class="bg-white px-5 pb-4 shadow-sm" method="POST" action="/pros" autocomplete="off">
                        <fieldset>
                            <p>Rechercher un professionnel</p>
                            <input list="suggestions-pros" type="text" name="professionnels" id="professionnels"
                                placeholder="Nom du professionnel" class="form-control" autocomplete="off">
                            <datalist id="suggestions-pros"></datalist>

                            <input id="hidden-form-accueil" type="hidden" name="id-pro">

                            <input type="submit" value="Rechercher" class="btn-pr col-md-12 my-2"></button>
                            @csrf
                        </fieldset>
                    </form>
                @endif

                <div class="bg-white px-5 py-5 mt-2 shadow-sm">
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

            </div>



        <div class="col-lg-8 col-md-12">
            @yield('contentPagePerso')
        </div>
    </div>
</div>
@endsection
