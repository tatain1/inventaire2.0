<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventaire by Tatain</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Trouver un nom ou un logo (redirige vers home)-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                            <li><a href="{{ route('register') }}">S'enregistrer</a></li>
                            <!-- <li><a href="#">S'enregistrer</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Se deconnecter
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                      <a href="{{ url('/game') }}">Inventaire</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        <div class="col-sm-offset-1 col-sm-10">
          @if(session()->has('ok'))
          <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
          @endif

          <div id="view-box" class="panel panel-primary">
      			<div class="panel-heading">
      				<h3 class="panel-title">Inventaire Retro Gaming by Tatain (Une application web de gestion de collection de jeux video).</h3>
      			</div>
            <div class="panel-body">
              <table class="table">
        				<thead>
        					<tr>
        						<th><h2>Comment ça marche ?</h2></th>
        					</tr>
        				</thead>
                <tbody>
                    <tr>
                      <td>Si c'est votre premiere visite, commencez par vous enregistrer (en haut à droite !)</td>
                    </tr>
                  </tbody>
                  <thead>
          					<tr>
          						<th><h2>Mais c'est moche, plein de bug et on peut pas faire grand chose !!!</h2></th>
          					</tr>
          				</thead>
                  <tbody>
                    <tr>
                      <td>
                        Oui, effectivement, mais je bosse activement à améliorer le bouzin ! Alors certes, pour l'instant, y'a des bugs d'affichage,
                        des traductions pas faites, une interface horrible et un manque de contenu, mais ça va arriver, calmez vous !
                      </td>
                    </tr>
                  </tbody>
                  <thead>
          					<tr>
          						<th><h2>Et qu'est ce qui va arriver exactement ?</h2></th>
          					</tr>
          				</thead>
                  <tbody>
                    <tr>
                      <td>
                        En vrac :<br>
                          <ul>
                            <li>Ajout du support de plein de plate-formes (Sony, Microsoft)</li>
                            <li>Ajout du support des non-jeux (Amiibo, Infinity, Goddies, Librairie...)</li>
                            <li>Possiblité de créer sa wishlist</li>
                            <li>Possibilité de créer une liste de doublons/echange</li>
                            <li>Possilité de consulter la collection des autres memebres (sauf si ceux-ci ne le souhaite pas...)</li>
                            <li>Et j'ai plein d'autres idées (mais chaque chose en son temps !!!)</li>
                          </ul>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <!-- SCRIPTS -->
      <!-- Jquery -->
      <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
      crossorigin="anonymous"></script>
      <!-- Mon JS general -->
      <script src="{{ asset('js/app.js') }}"></script>      
  </body>
</html>
