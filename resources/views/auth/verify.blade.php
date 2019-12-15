@extends('layouts.app')

@section('meta_title')
Vérification inscription
@endsection

@section('content')
<div class="container ptb-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form bg-white shadow-sm px-6 py-6 min-height">
                        <div class="title mb-4">
                                <h2>Vérifier votre adresse mail</h2>
                        </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un nouveau lien de vérification a été envoyé à votre adresse mail.
                        </div>
                    @endif

                    <p class="text-center">
                            Avant de continuer, veuillez vérifier dans votre boite mail que vous avez bien reçu un lien de vérification. <br><br>
                            Si vous n'avez pas reçu le mail,
                    </p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-pr mt-2">cliquez ici pour en demander un autre</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
