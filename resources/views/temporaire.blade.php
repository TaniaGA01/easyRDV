@extends('layouts.app')

@section('content')
<div>On teste la page temporaire</div>
<div class="container ptb-5" style="min-height:65vh;">
    <div class="row">
        <form class="col-4" method="POST" autocomplete="off">

            <label for="pros">Entrez le nom d'une profession</label> :<br />
            <input list="suggestions" type="text" id="pros" name="pros" autocomplete="off">
            <datalist id="suggestions"></datalist>

            <br />
            <label for="locs">Choisissez un lieu</label> :<br />
            <input list="suggestions-locs" type="text" id="locs" name="locs" autocomplete="off">
            <datalist id="suggestions-locs"></datalist>

            <button type="submit">Rechercher</button>
            @csrf
        </form>

        <section class="col-8">
            @isset($results)

            <div>Vous avez recherché un {{str_replace('-', ' ', strtolower($job[0]->name))}}@isset($city) à {{$city[0]->name_ville}}@endisset</div><br />
            @foreach ($results as $result)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            <img src="@isset($result->image){{$result->image}}@endisset" class="card-img" alt="@isset($result->image){{$result->first_name}} {{$result->last_name}}, {{$result->profession->name}} à {{$result->city->name_ville}}@endisset" style="max-height:102px;border-radius: 3px 0 0 3px;" />
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <div class="row align-items-center">
                                <a class="col-md-6" href="{{route('show', [str_replace(' ', '-', $result->profession->name),str_replace(' ', '-', $result->city->name_ville),str_replace(' ', '-', $result->first_name),str_replace(' ', '-', $result->last_name)])}}"><h5 class="card-title">{{$result->first_name}} {{$result->last_name}}</h5></a>
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



@endsection
