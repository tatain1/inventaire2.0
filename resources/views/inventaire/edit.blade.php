@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Modification du jeu</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::model($game, ['route' => ['game.update', $game->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

          @include('inventaire.form')
          
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
    <a href="javascript:history.back()" class="btn btn-primary">Retour</a>
	</div>
@stop
