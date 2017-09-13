@extends('layouts.app')

@section('content')
    <br>
    <div class="col-sm-offset-1 col-sm-10">
    	@if(session()->has('ok'))
			   <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		  @endif

    @foreach ($games as $game)
    @endforeach

    </div>

<!-- ============================================================================== -->
<!-- ============================================================================== -->
<!-- ============================================================================== -->

<div ng-app="myApp" ng-controller="MyCtrl" class="container-fluid">

  <!-- Zone de recherche dans la collection -->
  <div id="research-box" class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Rechercher un jeu dans ma collection</h3><!-- A FAIRE : ajouter ici un petit triangle blanche qui deroule le form en dessus quand on clique. -->
    </div>
    <div class="panel-body">
      <input ng-model="q" id="search" placeholder="Chercher">
    </div>
    <!-- <select ng-model="pageSize" id="pageSize" class="form-control">
    <option value="5">5</option>
    <option value="10">10</option>
    <option value="15">15</option>
    <option value="20">20</option>
  </select> -->
  </div>

  <!-- Table liste des jeux : consultation et ajout-->
  <div id="view-box" class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Liste des jeux</h3>
    </div>
    <div class="panel-body" >
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
        <div  ng-repeat="item in data | filter:{name: q} | startFrom:currentPage*pageSize | limitTo:pageSize">
          <div class="row">
            <div class="col-xs-4">
              <a href="game/@{{item.id}}">@{{item.name}}</a>
            </div>

            <div class="col-xs-4">
              @{{item.console}}
            </div>
            <div class="col-xs-4">
              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="game/@{{item.id}}">Details</a></li>
                    <li><a href="game/@{{item.id}}/edit">Modifier</a></li>
                    <li><a href="game/@{{item.id}}/delete">Supprimer</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
        </div>


      </div>
    </div>

  </div>

  <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
      Previous
  </button>
  @{{currentPage+1}}/@{{numberOfPages()}}
  <button ng-disabled="currentPage >= getData().length/pageSize - 1" ng-click="currentPage=currentPage+1">
      Next
  </button>

  {!! link_to_route('game.create', 'Ajouter un jeu', [], ['class' => 'btn btn-info pull-right']) !!}




  <!--AngularJS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.14/angular.min.js"></script>

  <script>
  var app=angular.module('myApp', []);

  app.controller('MyCtrl', ['$scope', '$filter', function ($scope, $filter) {
      $scope.currentPage = 0;
      $scope.pageSize = 10;
      $scope.data = [
        <?php foreach ($games as $game) {
          echo $game.', ';
        } ?>
      ];
      $scope.q = '';

      $scope.getData = function () {
        return $filter('filter')($scope.data, $scope.q)
      }

      $scope.numberOfPages=function(){
          return Math.ceil($scope.getData().length/$scope.pageSize);
      }

  }]);

  app.filter('startFrom', function() {
      return function(input, start) {
          start = +start;
          return input.slice(start);
      }
  });

  </script>

@stop
