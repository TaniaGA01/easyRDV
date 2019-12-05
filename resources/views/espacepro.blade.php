@extends('layouts.app')

@section('content')

@isset($pro)
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
<div>Ce compte n'existe pas !</div>

@endisset

@endsection
