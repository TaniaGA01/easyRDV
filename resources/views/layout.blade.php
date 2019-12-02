<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>easyRDV</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <!-- NavHeader -->
        <nav>
            <ul>
                <li><a href="/">Logo easyRDV</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Tarifs</a></li>
                <li><a href="/contact">Nous contacter</a></li>
                <li><a href="#">Je suis un professionnel</a></li>
                <li><a href="/login">Se connecter/S'inscrire</a></li>
            </ul>
        </nav>
        <!-- End NavHeader -->

        <!-- Msg d'alert #TODO amélioration -->
        @if(session()->has('message'))
            <div class="bg-green" role="alert">{{ session()->get('message') }}</div>
        @endif
        <!-- EndMsg d'alert -->

        <!-- contenu ici -->
        @yield('content')

        <!-- NavFooter -->
        <nav>
            <ul>
                <li><a href="/">Logo easyRDV</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Tarifs</a></li>
                <li><a href="/contact">Nous contacter</a></li>
                <li><a href="#">Informations légales</a></li>
            </ul>
        </nav>
        <!-- End NavFooter -->

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
