@extends('layouts.app')
<!-- A FAIRE : nouveau layout qui prend en charge tous sauf le form open -->
@section('content')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Ajout d'un jeu dans la base de données</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::open(['url' => 'game', 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'ajout']) !!}

          @include('inventaire.form')

					{!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">Retour</a>
	</div>
@stop
