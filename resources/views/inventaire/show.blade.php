@extends('template')

@section('contenu')
    <div class="col-lg-offset-4 col-lg-4 col-sm-offset-3 col-sm-6">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Fiche du jeu</div>
			<div class="panel-body">
				<p>Nom : {{ $game->name }}</p>
				<p>Plateforme : {{ $game->console }}</p>
        <p>Note : {{ $game->note }}</p>
				@if($game->boite == 1)
					<img src="{{URL::asset('/image/box.png')}}" alt="Boite" title="Boite presente" height="30" width="30">
				@endif
        @if($game->jaquette == 1)
					Jaquette
				@endif
        @if($game->notice == 1)
          <img src="{{URL::asset('/image/notice.png')}}" alt="Notice" title="Notice presente" height="30" width="30">
				@endif
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop