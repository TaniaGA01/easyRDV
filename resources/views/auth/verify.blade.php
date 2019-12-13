@extends('layouts.app')

@section('meta_title')
Vérification inscription
@endsection

@section('content')
<div class="container ptb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifier votre adresse mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse mail.
                        </div>
                    @endif

                    Avant de continuer, veuillez vérifier dans votre boite mail que vous avez bien reçu un lien de vérification. <br>
                    Si vous n'avez pas reçu le mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">cliquez ici pour en demander un autre</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
