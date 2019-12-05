@extends('layouts.app')

@section('content')

@isset($pro[0])
{{-- @php
var_dump($pro);
    return 'TEST';
@endphp --}}
<div class="container ptb-5">
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$pro[0]->first_name}} {{$pro[0]->last_name}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

@else

<div class="container ptb-5" style="min-height:60vh">
    <p>Ce compte n'existe pas !</p>
    <a class="btn btn-info" href="javascript:history.back()">Retour</a>
</div>

@endisset

@endsection
