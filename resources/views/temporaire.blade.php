@extends('layouts.app')

@section('content')
<div>On teste la page temporaire</div>
<div class="container" style="min-height:65vh;">
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

            <div>Vous avez recherché un {{str_replace('-', ' ', strtolower($job[0]->name))}}@isset($city) à {{$city[0]->name}}@endisset</div><br />
            @foreach ($results as $result)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="..." class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$result->first_name}} {{$result->last_name}}</h5>
                                {{-- <p class="card-text">{{$results->first_name}}</p> --}}
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
