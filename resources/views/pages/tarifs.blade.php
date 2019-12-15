{{-- PAGE TARIF --}}

@extends('layouts.app')

@section('meta_title')
Nos tarifs
@endsection

@section('content')

<section class="pricing ptb-5">
    <div class="container">

            <div class="title">
                    <h1>
                        Économisez du temps et de charges patronales avec nos prestations   
                    </h1>
                </div>
        <div class="row pt-6">

                <div class="col-lg-6 col-md-12 ">

                    <div class="price container bck-bleu shadow-sm px-6 py-6 min-height">
                        <h3>Abonnement</h3>
                        <h2>BASIC</h2>
                        <ul>
                            <li>Agenda</li>
                            <li>Page de présentation</li>
                            <li>Une image</li>
                            <li>Notifications E-mail</li>
                        </ul>
                        <h4>2€/mois</h4>
                        <a class="btn-pr btn-block btn mt-3" href="#">Je m'abonne</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 ">
                    <div class="price container bck-bleu shadow-sm px-6 py-6 min-height">
                        <h3>Abonnement</h3>
                        <h2>PREMIUM</h2>
                        <ul>
                            <li>Agenda, page de présentation</li>
                            <li>Cinque images</li>
                            <li>Map de situation</li>
                            <li>Notifications et Réferencement Google</li>
                        </ul>
                        <h4>3,50€/mois</h4>
                        <a class="btn-pr btn-block btn mt-3" href="#">Je m'abonne</a>
                    </div>
                </div>
            </div>
    </div>
  </section>



@endsection
