@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Modification du jeu</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::model($game, ['route' => ['game.update', $game->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('console') ? 'has-error' : '' !!}">
					  	{!! Form::text('console', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
          <div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
					  	{!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Note']) !!}
					  	{!! $errors->first('note', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('boite', 1, null) !!}Boite
							</label>
						</div>
            <div class="checkbox">
							<label>
								{!! Form::checkbox('jaquette', 1, null) !!} Jaquette
							</label>
						</div>
            <div class="checkbox">
							<label>
								{!! Form::checkbox('notice', 1, null) !!} Notice
							</label>
						</div>
					</div>
						{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop
