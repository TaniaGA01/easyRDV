@extends('layouts.app')

@section('content')

<div class="container ptb-5 ">
    <div class="title">
        <h1>Trouvez des professionnels et demandez gratuitement rendez-vous en ligne</h1>
    </div>
    @if (session('status'))
    <div class="row justify-content-center ">
        <div class="col-md-8 col-sm-12">
            <div class="alert {{ session('alert-class') }}" role="alert">
                <i class="fas fa-exclamation-triangle"></i> {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row pt-6 list-deco">
        <div class="form-style-5 bg-white shadow-sm col-lg-4 col-md-12 px-6 py-6 min-height">
            <form method="POST" autocomplete="off">
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
            <form class="form-pros-accueil" method="POST" action="/pros" autocomplete="off">
                <fieldset>
                    <p>Rechercher un professionnel</p>
                    <input list="suggestions-pros" type="text" name="professionnels" id="professionnels" placeholder="Professionnel"
                        class="form-control my-2" autocomplete="off">
                    <datalist id="suggestions-pros"></datalist>

                    <input type="hidden" name="id-pro">

                    <input type="submit" value="Rechercher" class="btn-pr col-md-12 my-2"></button>
                    @csrf
                </fieldset>
            </form>
        </div>
        <div class="col-lg-8 col-md-12">

            @isset($results)
            <div class="list-results shadow-sm px-6">
                    <div><p>Résultats de la recherche : <span> {{str_replace('-', ' ', strtolower($job[0]->name))}}</span>@isset($city) à
                        <span>{{$city[0]->name_ville}}</span>
                    @endisset</p>
                </div><br />
                @foreach ($results as $result)
                    <div class="search-result shadow mb-3">
                        <div class="row no-gutters search-row-resultat">
                            <div class="col-md-2">
                                <figure>
                                    <img src="@isset($result->image){{$result->image}}@endisset" class="card-img"
                                    alt="@isset($result->image){{$result->first_name}} {{$result->last_name}}, {{$result->profession->name}} à {{$result->city->name_ville}}@endisset"/>
                                </figure>
                            </div>
                            <div class="col-md-10 align-items-center search-result-body">
                                <a href="{{route('show', [str_replace(' ', '-', $result->profession->name),str_replace(' ', '-', $result->city->name_ville),str_replace(' ', '-', $result->first_name),str_replace(' ', '-', $result->last_name)])}}">
                                    <h5>{{$result->first_name}} {{$result->last_name}}</h5>
                                    <p class="text-right">{{$result->profession->name}}<br/><span>{{$result->city->name_ville}}</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endisset
            </div>
            @isset($nope)
            <div>{{$nope}}</div>
            @endisset
        </div>
    </div>
</div>
<div class="container ">
    <div class="title">
        <h2>Vous êtes un professionnel ?</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-12 services-list"></div>
        <div class="col-md-7 col-sm-12 our-services bg-white shadow-sm px-6 py-6 min-height"></div>
    </div>
</div>
@endsection
