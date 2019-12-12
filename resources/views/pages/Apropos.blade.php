{{-- PAGES  À PROPOS --}}


@extends('layouts.app')

@section('content')

<div class="container ptb-5">
    <div class="title">
        <h1>Nous sommes une entreprise jeune et dynamique qui vous accompagne dans le croisement de votre business</h1>
    </div>
    <div class="row justify-content-center pt-6">
        <div class="col-lg-6 col-md-12 about-img position-relative">
            <img src="img/a-propos-easy-rdv.png" alt="à propos de easy rdv" />
        </div>
        <div class="col-lg-6 col-md-12 about-pre pt-5">
            <div class="bg-white shadow px-6 py-6 min-height ">
                <div class="title pb-4">
                    <h2>À propos</h2>
                </div>
                <p class="card-text"><strong>Easyrdv.fr</strong> est une plateforme en ligne permettant la gestion des
                    rdv, destinée aux professionnels n’ayant pas encore de solution adaptée.</p>
                <p class="card-text">Elle permet également aux clients de ces professionnels de <strong>prendre
                        rendez-vous facilement en ligne</strong>.
                    Pas de logiciel ? Pas d’assistant ou d’employé ? Pas le temps d’apprendre à gérer un nouveau système
                    ? </p>
                <p class="card-text"><strong>Easyrdv.fr</strong> est justement conçu pour une prise en main facile, en
                    quelques clics, aussi bien pour les professionnels que leurs clients.</p>
            </div>
        </div>
    </div>
</div>
<section class="statistics">
    <div class="container ptb-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 ">
                <div class="container bck-orange-fc px-4 py-5 mb-3 shadow">
                    <h2>3 897</h2>
                    <h3>Professionnels inscrits</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container bck-orange px-4 py-5 mb-3 shadow">
                    <h2>9 750</h2>
                    <h3>Clients potentiels inscrits</h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="container bck-orange-fc px-4 py-5 mb-3 shadow">
                    <h2>17 450</h2>
                    <h3>Rendez-vous pris</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
