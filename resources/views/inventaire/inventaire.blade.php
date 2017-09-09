@extends('layouts.app')

@section('content')
    <br>
    <div class="col-sm-offset-1 col-sm-10">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif

    <!-- Zone de recherche dans la collection -->
      <div id="research-box" class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><a href=""><span class="glyphicon glyphicon-menu-down"></span></a> Rechercher un jeu dans ma collection</h3><!-- A FAIRE : ajouter ici un petit triangle blanche qui deroule le form en dessus quand on clique. -->
        </div>
        <div class="panel-body">
        </div>
      </div>


    <!-- Table liste des jeux : consultation et ajout-->
		<div id="view-box" class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des jeux</h3>
			</div>
      <div class="panel-body">
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
          @foreach ($games as $game)
          <div class="row">
            <div class="col-xs-4">
              {!! link_to_route('game.show', $game->name, [$game->id]) !!}
            </div>

            <div class="col-xs-4">
              {!! $game->console !!}
            </div>
            <div class="col-xs-4">
              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li>{!! link_to_route('game.show', 'Détails', [$game->id]) !!}</li>
                    <li>{!! link_to_route('game.edit', 'Modifier', [$game->id]) !!}</li>
                    <li>{!! Form::open(['method' => 'DELETE', 'route' => ['game.destroy', $game->id]]) !!}
                        {!! Form::submit('Supprimer', array('class'=>'noClass', 'onclick' => 'return confirm(\'Vraiment supprimer ce jeu ?\')')) !!}
                        {!! Form::close() !!}</li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          @endforeach
        </div>
      </div>
		</div>
		{!! link_to_route('game.create', 'Ajouter un jeu', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
</div>
@stop
