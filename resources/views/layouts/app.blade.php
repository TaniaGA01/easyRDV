<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (Route::currentRouteName() == 'search' || Route::currentRouteName() == 'welcome')
    <title>{{ config('app.name', 'Laravel') }}, l'application de prise de rendez-vous des professionnels</title>
    @else
    <title>@yield('meta_title') - {{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-easy-rdv.svg') }}" alt="Logo {{ config('app.name', 'Laravel') }}"
                        width="150">
                </a>

                <div class="nav-pr">
                    <div class="user-nav">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link menu-it" href="{{route('about')}}">A propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-it" href=" {{route('price')}}">Tarifs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-it" href="{{route('contact.create')}}">Nous contacter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn-item-pro" href="{{route('professional.create')}}">Je suis un
                                        professionnel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-connexion ">
                        <ul class="navbar-nav ml-auto user-nav-mobil">

                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link btn-insc" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>

                            <!--
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                                </li>
                            @endif
                            -->
                            @else

                            <li class="nav-item dropdown font-weight-bold ">
                                <a id="navbarDropdown" class="dropdown-toggle menu-it-name" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="avatar">
                                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" width="40" height="40"
                                            class="avatar">
                                    </span>
                                    <span class="user-name">@isset(Auth::user()->first_name)
                                        {{ Auth::user()->first_name }}
                                        @else
                                        {{ Auth::user()->email }}
                                        @endisset</span>
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role_id == 2)
                                    <a class="dropdown-item menu-it"
                                        href="{{ route('professionnelArea.indexAgenda', Auth::user()->id) }}">Mon agenda</a>
                                    <a class="dropdown-item menu-it"
                                        href="{{ route('professionnelArea.indexAppointment', Auth::user()->id) }}">Mes
                                        rendez-vous</a>
                                    <a class="dropdown-item menu-it"
                                        href="{{ route('professionnelArea.edit', Auth::user()->id) }}">Mes infos perso</a>
                                    @elseif(Auth::user()->role_id == 3)
                                    <a class="dropdown-item menu-it" href="{{ route('clientArea.index', Auth::user()->id) }}">Mes
                                        rendez-vous</a>
                                    <a class="dropdown-item menu-it" href="{{ route('clientArea.edit', Auth::user()->id) }}">Mes
                                        infos perso</a>
                                    @endif


                                    <a class="dropdown-item menu-it" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <section class="aide">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Des questions ? Besoin d’aide ? <span><a href="{{route('contact.create')}}">Contactez-nous</a></span></h3>
                </div>
            </div>
        </div>
    </section>

    <!-- NavFooter -->
    <footer>
        <section>
            <div class="container ptb-5">
                <div class="row">

                    <div class="col-lg-4 col-md-12">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo-easyrdv-w.svg') }}" alt="{{ config('app.name', 'Laravel') }}"
                                width="150">
                        </a>
                        <p>Le site pour trouver des professionnels et demander des rendez-vous en ligne</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
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
