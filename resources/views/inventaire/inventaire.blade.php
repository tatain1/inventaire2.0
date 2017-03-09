@extends('layouts.app')

@section('content')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des jeux</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Nom</th>
            <th>Plateforme</th>
						<th></th>
						<th></th>
						<th></th>
            <th>Id proprio</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($games as $game)
						<tr>
							<td class="text-primary"><strong>{!! $game->name !!}</strong></td>
              <td>{!! $game->console !!}</td>
							<td>{!! link_to_route('game.show', 'Voir', [$game->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							<td>{!! link_to_route('game.edit', 'Modifier', [$game->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'route' => ['game.destroy', $game->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce jeu ?\')']) !!}
								{!! Form::close() !!}
							</td>
              <td>{!! $game->user_id !!}</td>
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		{!! link_to_route('game.create', 'Ajouter un jeu', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
	</div>
@stop
