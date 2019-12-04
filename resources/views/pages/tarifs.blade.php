{{-- PAGE TARIF --}}

@extends('layouts.app')

@section('content')

<section class="pricing py-5">
    <div class="container">
      <div class="row">
        <!-- Free Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Gratuit</h5>
              <h6 class="card-price text-center">€0<span class="period">/mois</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Le Lorem Ipsum</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Le Lorem Ipsum</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Le Lorem Ipsum</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Le Lorem Ipsum</li>
              </ul>
              <a href="#" class="btn btn-block btn-primary text-uppercase">Je m'abonne</a>
            </div>
          </div>
        </div>
        <!-- Plus Tier -->
        <div class="col-lg-4">
          <div class="card mb-5 mb-lg-0">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Premium Plus</h5>
              <h6 class="card-price text-center">€9<span class="period">/mois</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Le Lorem Ipsum</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Le Lorem Ipsum</li>
              </ul>
              <a href="#" class="btn btn-block btn-primary text-uppercase">Je m'abonne</a>
            </div>
          </div>
        </div>
        <!-- Pro Tier -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-muted text-uppercase text-center">Premium Pro</h5>
              <h6 class="card-price text-center">€49<span class="period">/mois</span></h6>
              <hr>
              <ul class="fa-ul">
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Le Lorem Ipsum</strong></li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Le Lorem Ipsum</strong> Le Lorem Ipsum</li>
                <li><span class="fa-li"><i class="fas fa-check"></i></span>Le Lorem Ipsum</li>
              </ul>
              <a href="#" class="btn btn-block btn-primary text-uppercase">Je m'abonne</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection
