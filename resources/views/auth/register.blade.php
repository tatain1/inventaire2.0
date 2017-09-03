@extends('template')

@section('contenu')
    <!-- Copie d'une 404 le temps de la desactivation des inscriptions.
    A remplacer par le code de "registerCopy.blade.php" lorsque les inscriptions
    seront ré-ouverte. -->
    <br>
    <div class="col-sm-offset-4 col-sm-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Il y a un problème !</h3>
			</div>
			<div class="panel-body">
				<p>Nous sommes désolés mais la page que vous désirez n'existe pas...</p>
			</div>
		</div>
	</div>
@stop
