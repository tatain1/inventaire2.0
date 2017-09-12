@extends('layouts.app')

@section('content')
    <br>
    <div class="col-sm-offset-1 col-sm-10">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif

    @foreach ($games as $game)
    @endforeach

<div ng-app="myApp">

    <!-- Zone de recherche dans la collection -->
    <div id="research-box" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><a href=""><span class="glyphicon glyphicon-menu-down"></span></a> Rechercher un jeu dans ma collection</h3><!-- A FAIRE : ajouter ici un petit triangle blanche qui deroule le form en dessus quand on clique. -->
      </div>
      <div class="panel-body">
        <input type="text" ng-model="query">
      </div>
    </div>


    <!-- Table liste des jeux : consultation et ajout-->
		<div id="view-box" class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des jeux</h3>
			</div>
      <div class="panel-body" ng-controller="GamesCtrl">
        <div class="container-fuid">
          <div class="row">
            <div class="col-xs-4">
              Nom
            </div>
            <div class="col-xs-4">
              Plateforme
            </div>
            <div class="col-xs-4">
              Action
            </div>
          </div>
          <hr/>
          <div  ng-repeat="game in games | filter:{name: query}">
            <div class="row">
              <div class="col-xs-4">
                <a href="game/@{{game.id}}">@{{game.name}}</a>
                <!-- {!! link_to_route('game.show', $game->name, [$game->id]) !!} -->
              </div>

              <div class="col-xs-4">
                @{{game.console}}
              </div>
              <div class="col-xs-4">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                      <li><a href="game/@{{game.id}}">Details</a></li>
                      <li><a href="game/@{{game.id}}/edit">Modifier</a></li>
                      <li><a href="game/@{{game.id}}/delete">Supprimer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>
		</div>
  </div>

  {!! link_to_route('game.create', 'Ajouter un jeu', [], ['class' => 'btn btn-info pull-right']) !!}
  {!! $links !!}

</div>

<!--AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.min.js"></script>
<script>
  function GamesCtrl($scope) {
    $scope.games = [
      <?php foreach ($games as $game) {
        echo $game.', ';
      } ?>
    ];
  };
</script>
@stop
