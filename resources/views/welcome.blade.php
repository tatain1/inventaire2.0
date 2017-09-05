<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accueil</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/game') }}">Inventaire</a>
                    @else
                        <a href="{{ url('/login') }}">Se connecter</a>
                        <a href="{{ url('/register') }}">S'enregistrer</a>
                        <!-- <a href="#">S'enregistrer</a> -->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  Inventaire Retro Gaming by Tatain
                </div>
                <div class="links">
                  Une application web de gestion de collection de jeux video.
                </div>

                <h1>Comment ça marche ?</h1>
                <p>Si c'est votre premiere visite, commencez par vous enregistrer (en haut à droite !)</p>

                <h1>Mais c'est moche, plein de bug et on peut pas faire grand chose !!!</h1>
                <p>
                Oui, effectivement, mais je bosse activement à améliorer le bouzin ! Alors effectivement, pour l'instant, y'a des bugs d'affichage,
                des traductions pas faites, une interface horrible et un manque de contenu, mais ça va arriver, calmez vous !
                </p>

                <h1>Et qu'est ce qui va arriver exactement ?</h1>
                <p> En vrac :<br>
                <ul>
                  <li>Ajout du support de plein de plate-formes (Sony, Microsoft)</li>
                  <li>Ajout du support des non-jeux (Amiibo, Infinity, Goddies, Librairie...)</li>
                  <li>Possiblité de créer sa wishlist</li>
                  <li>Possibilité de créer une liste de doublons/echange</li>
                  <li>Possilité de consulter la collection des autres memebres (sauf si ceux-ci ne le souhaite pas...)</li>
                  <li>Et j'ai plein d'autres idées (mais chaque chose en son temps !!!)</li>
                </ul>
              </p>

            </div>
        </div>
    </body>
</html>
