@extends('layouts.persoArea')
@section('contentPagePerso')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert {{ session('alert-class') }}" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
   <h1>Page : Mes rendez-vous (client)</h1> 
</div>
@endsection
