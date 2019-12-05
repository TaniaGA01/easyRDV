<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body  class="body" onLoad="Horloge();" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-easy-rdv.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="150">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="{{route('about')}}" class="nav-link">A propos</a></li>
                        <li class="nav-item"><a href=" {{route('price')}}  " class="nav-link">Tarifs</a></li>
                        <li class="nav-item"><a href="{{route('contact.create')}}" class="nav-link">Nous contacter</a></li>
                        <li class="nav-item"><a href="{{route('professional.create')}}" class="nav-link">Je suis un professionnel</a></li>
                        <!-- Authentication Links -->
                        @guest
                        
                            <li class="nav-item">
                                    
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter/S\'inscrire') }}</a>
                                
                            </li>
                                <form  name="form1" id="form1">
                                    <input type="texte" name="pendule" id="pendule" value="" size="9" class="time">
                                </form>
                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <li class="nav-item dropdown font-weight-bold">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   @isset(Auth::user()->first_name)
                                    {{ Auth::user()->first_name }}
                                   @else
                                    {{ Auth::user()->email }}
                                   @endisset
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role_id == 2)
                                    <a class="dropdown-item" href="{{ route('professionnelArea.indexAgenda', Auth::user()->first_name) }}">Mon agenda</a>
                                    @endif
                                    <a class="dropdown-item" href="#">Mes rendez-vous</a>
                                    <a class="dropdown-item" href="#">Mes infos perso</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

        
    <!-- NavFooter -->
    <footer>
        <section>
            <div class="container ptb-5">
                <div class="row">
                    <div class="col-4">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo-easyrdv-w.svg') }}" alt="{{ config('app.name', 'Laravel') }}" width="150">
                        </a>
                    </div>
                    <div class="col-8">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="{{route('about')}}">A propos</a></li>
                                <li><a href="{{route('price')}}">Tarifs</a></li>
                                <li><a href="{{route('contact.create')}}">Nous contacter</a></li>
                                <li><a href="{{route('legal.index')}}">Informations légales</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
