@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Ajout d'un jeu dans la base de données</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::open(['url' => 'game', 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'ajout']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
          <!-- A FAIRE : placeholder / modifier couleur -->
          <!-- A FAIRE : formulaire dynamique en JS -->
					<div class="form-group {!! $errors->has('console') ? 'has-error' : '' !!}">
              {!! Form::select('console', array(
                '' => '----Console----',
                'NES' => 'NES',
                'SNES' => 'SNES',
                'N64' => 'N64',
                'GAMECUBE' => 'GAMECUBE',
                'WII' => 'WII'
              ), null, ['class' => 'form-control', 'id' => 'console']) !!}
					  	{!! $errors->first('console', '<small class="help-block">:message</small>') !!}
					</div>
          <div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
					  	{!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Note']) !!}
					  	{!! $errors->first('note', '<small class="help-block">:message</small>') !!}
					</div>

					<div class="form-group">
						<div id="boite_div" class="checkbox hide">
							<label>
								{!! Form::checkbox('boite', 1, null, ['id' => 'boite']) !!} Boite
							</label>
						</div>

            <div id="notice_div" class="checkbox hide">
							<label>
								{!! Form::checkbox('notice', 1, null, ['id' => 'notice']) !!} Notice
							</label>
						</div>

            <div id="jaquette_div" class="checkbox hide">
							<label>
								{!! Form::checkbox('jaquette', 1, null, ['id' => 'jaquette']) !!} Jaquette
							</label>
						</div>

            <div id="cale_div" class="checkbox hide">
							<label>
								{!! Form::checkbox('cale', 1, null, ['id' => 'cale']) !!} Cale
							</label>
						</div>

            <div id="fourreau_div" class="checkbox hide">
							<label>
								{!! Form::checkbox('fourreau', 1, null, ['id' => 'fourreau']) !!} Fourreau
							</label>
						</div>

					</div>
					{!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop
