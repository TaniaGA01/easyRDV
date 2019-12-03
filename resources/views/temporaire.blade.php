@extends('layout')

@section('content')
<div>On teste la page temporaire</div>
<form class="form-container" method="POST" autocomplete="off">

    <label for="pros">Entrez le nom d'une profession</label> :<br />
    <input type="text" id="pros" name="pros" autocomplete="off">
    <div id="suggestions"></div>

    <br />
    <label for="locs">Choisissez un lieu</label> :<br />
    <input type="text" id="locs" name="locs" autocomplete="off">
    <div id="suggestions-locs"></div>

    <button type="submit">Rechercher</button>
    @csrf
</form>

<section style="float:right;width:60vw;">
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



@endsection
