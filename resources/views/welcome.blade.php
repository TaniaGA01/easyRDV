@extends('layouts.app')

@section('content')
<section class="professional-search">
    <div class="container ptb-5 position-relative">
        <div class="title">
            <h1>Trouvez des professionnels et demandez gratuitement rendez-vous en ligne</h1>
            @guest
                <a class="btn btn-sec" href="{{ route('login') }}">{{ __('S\'inscrire') }}</a>
            @else
                <br>
                <br>
            @endguest
        </div>
        @if (session('status'))
            <div class="row justify-content-center alert-popup ml-1">
                <div class="col-md-8 col-sm-12">
                    <div class="alert {{ session('alert-class') }} shadow" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row pt-5 list-deco">
            <div class="col-lg-4 col-md-12 ">
                <div class="form bg-white shadow-sm px-6 py-6 min-height">
                        <form method="POST" autocomplete="off">
                                <fieldset>
                                    <h3>Prendre un rendez-vous en ligne</h3>
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
                            <form class="form-pros-accueil" method="POST" action="/pros" autocomplete="off">
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
                </div>
            </div>
            <div class="col-lg-8 col-md-12">

                @isset($results)
                <div class="list-results shadow-sm px-6">
                    <div>
                        <p>Résultats de la recherche : <span>
                                {{str_replace('-', ' ', strtolower($job[0]->name))}}</span>@isset($city) à
                            <span>{{$city[0]->name_ville}}</span>
                            @endisset</p>
                    </div><br />
                    @foreach ($results as $result)
                    <div class="search-result shadow mb-3">
                        <div class="row no-gutters search-row-resultat">
                            <div class="col-md-2">
                                <figure>
                                    <img src="/uploads/photos/{{$result->image ?: 'default.png' }}" class="card-img"
                                        alt="@isset($result->image){{$result->first_name}} {{$result->last_name}}, {{$result->profession->name}} à {{$result->city->name_ville}}@endisset" />
                                </figure>
                            </div>
                            <div class="col-md-10 align-items-center search-result-body">
                                <a
                                    href="{{route('show', [str_replace(' ', '-', $result->profession->name),str_replace(' ', '-', $result->city->name_ville),str_replace(' ', '-', $result->first_name),str_replace(' ', '-', $result->last_name)])}}">
                                    <h5>{{$result->first_name}} {{$result->last_name}}</h5>
                                    <p>{{$result->profession->name}}<br /><span>{{$result->city->name_ville}}</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endisset

                @isset($nope)
                <div class="list-results shadow-sm px-6">{{$nope}}</div>
                @endisset
            </div>
        </div>
    </div>
</section>
<section class="services">
    <div class="container pb-6 pt-3">
        <div class="title">
            <h2>Vous êtes un professionnel ?</h2>
            <a class="btn btn-ter" href="{{route('professional.create')}}">Je suis un
                    professionnel</a>
        </div>
        <div class="row justify-content-center ptb-5">
            <div class="col-lg-5 col-md-12 services-list">
                <div class="ser-item">
                    <img src="img/agenda-icn.svg" alt="agenda easy-rdv" width="65">
                    <h3>Agenda en ligne</h3>
                </div>
                <div class="ser-item">
                    <img src="img/page-pro-icn.svg" alt="agenda easy-rdv" width="65">
                    <h3>Page de présentation de vos prestations</h3>
                </div>
                <div class="ser-item">
                    <img src="img/referencement-icn.svg" alt="agenda easy-rdv" width="65">
                    <h3>Référencement de votre page</h3>
                </div>
                <div class="ser-item">
                    <img src="img/visibilite-icn.svg" alt="agenda easy-rdv" width="65">
                    <h3>Visibilité auprès de clients potentiels</h3>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 pt-5">
                <div class="our-services bg-white shadow-sm px-6 py-6 min-height">
                    <div class="our-services-cont">
                        <h2>Pas de logiciel ?</h2>
                        <h2>Pas d’assistant ou d’employé ? </h2>
                        <h2>Pas le temps d’apprendre à gérer un nouveau système ?</h2>
                        <p>L'agenda en ligne EasyRDV vous permettra de mieux gérer vos rendez-vous et vos tâches quotidiennes. Il vous permettra également d'être plus accessible pour vos clients potentiels.</p>
                        <div class="text-right pt-3">
                            <a class="btn btn-pr" href="{{route('professional.create')}}">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="statistics">
    <div class="container ptb-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 ">
                <div class="container bck-orange-fc px-4 py-5 mb-3 shadow">
                    <h2>3 897</h2>
                    <h3>Professionnels inscrits</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container bck-orange px-4 py-5 mb-3 shadow">
                    <h2>9 750</h2>
                    <h3>Clients potentiels inscrits</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container bck-orange-fc px-4 py-5 mb-3 shadow">
                    <h2>17 450</h2>
                    <h3>Rendez-vous pris</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
