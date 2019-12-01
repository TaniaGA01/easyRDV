@extends('layout')

@section('content')
<div>On teste la page temporaire</div>
<form class="form-container" action="{{route('results', '@')}}" method="GET">
    <label for="pros">Entrez le nom d'un professionnel ou d'une profession</label> :<br />
    <input type="text" id="pros">
    <button type="submit">Rechercher</button>
    <div id="suggestions"></div>
</form>

<section style="float:right;width:60vw;">
    @isset($results)

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

    {{-- @isset($nope)
    <div>{{$nope}}</div>
    @endisset --}}
</section>



@endsection
