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
    <div class="row ptb-5 list-deco min-height">
        <div class="form-style-5 bg-white shadow-sm col-lg-4 col-md-12 px-6 py-6 min-height">
            <form method="POST" autocomplete="off">
                <fieldset>
                    <h3>Prendre un rdv en ligne</h3>
                    <p>Rechercher un professionnel</p>
                    <input list="suggestions" type="text" name="pros" id="pros" placeholder="Professionnel"
                        class="form-control my-2" autocomplete="off">
                    <datalist id="suggestions"></datalist>

                    <input list="suggestions-locs" type="text" name="locs" id="locs" placeholder="Lieu"
                        class="form-control " autocomplete="off">
                    <datalist id="suggestions-locs"></datalist>

                    <input type="submit" value="Rechercher" class="btn-pr col-md-12 my-2"></button>
                    @csrf
                </fieldset>
            </form>
        </div>

        <div class="col-lg-8 col-md-12 ">
            @isset($results)

            <div>Vous avez recherché un {{str_replace('-', ' ', strtolower($job[0]->name))}}@isset($city) à
                {{$city[0]->name_ville}}@endisset</div><br />
            @foreach ($results as $result)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="@isset($result->image){{$result->image}}@endisset" class="card-img"
                            alt="@isset($result->image){{$result->first_name}} {{$result->last_name}}, {{$result->profession->name}} à {{$result->city->name_ville}}@endisset"
                            style="max-height:102px;border-radius: 3px 0 0 3px;" />
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <a class="col-md-6"
                                    href="{{route('show', [str_replace(' ', '-', $result->profession->name),str_replace(' ', '-', $result->city->name_ville),str_replace(' ', '-', $result->first_name),str_replace(' ', '-', $result->last_name)])}}">
                                    <h5 class="card-title">{{$result->first_name}} {{$result->last_name}}</h5>
                                </a>
                                <div class="col-md-6">
                                    <p class="card-text text-right">{{$result->profession->name}}</p>
                                    <p class="card-text text-right">{{$result->city->name_ville}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @endisset

            @isset($nope)
            <div>{{$nope}}</div>
            @endisset

        </section>
    </div>
</div>
<div class="container ">
    <div class="title">
        <h2>Vous êtes un professionnel ?</h2>
    </div>
    <div class="row justify-content-center ">
        <div class="col-md-5 col-sm-12"></div>
        <div class="col-md-7 col-sm-12"></div>
    </div>
</div>
@endsection

