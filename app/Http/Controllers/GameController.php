<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameCreateRequest;
use App\Http\Requests\GameUpdateRequest;

use Illuminate\Support\Facades\Auth;

use App\Repositories\GameRepository;
use App\Game;
use App\User;

use Illuminate\Http\Request;

class GameController extends Controller
{

  protected $gameRepository;
  protected $nbrPerPage = 15;

  public function __construct(GameRepository $gameRepository)
  {
    // Il faut etre connécté pour acceder aux fonction de la class GameController
    $this->middleware('auth');
    // Seul ceux qui ont un user status = admin peuvent utiiser la fonction destroy
    // ne fonctionne pas pour l'instant
    $this->middleware('admin')->only('destroy');

		$this->gameRepository = $gameRepository;
	}
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    // Reccupere l'id de l'utlisateur connecté
    $myID = Auth::id();
    // Prepare la pagination et les liens pour la vue
    $pages = $this->gameRepository->getPaginate($this->nbrPerPage);
    $links = $pages->setPath('')->render();
    // Recupere la liste des jeux de l'utlisateur
    $games = User::find($myID)->games;

    return view('inventaire/inventaire', compact('games', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return view('inventaire.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
  public function store(GameCreateRequest $request)
 	{
 		$game = $this->gameRepository->store($request->all());

 		return redirect('game')->withOk("Le jeu " . $game->name . " a été créé.");
 	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $game = $this->gameRepository->getById($id);

    $proprio = Game::find($id)->user['id'];
    $myID = Auth::id();

    if ($proprio == $myID) {
      return view('inventaire/show',  compact('game'));
    } else {
      return redirect('game')->withOk("Vous ne pouvez pas voir la fiche de ce jeu.");
    }
	}

	/**
	 *  Envoi du formulaire pour la modification d'un utilisateur
	 *
	 * @param  int  $id : l'id du jeu a modifier
	 * @return Response la view et l'objet game
	 */
	public function edit($id)
	{
    $game = $this->gameRepository->getById($id);

		return view('inventaire/edit',  compact('game'));
	}

  // Modification des données d'un utlisateur.
	public function update(GameUpdateRequest $request, $id)
	{
		$this->gameRepository->update($id, $request->all());

		return redirect('game')->withOk("Le jeu " . $request->input('name') . " a été modifié.");
	}

	/**
	 * Supprime un jeu de la BDD.
	 *
	 * @param  int  $id : L'id du jeu a supprimer de la BDD
	 * @return Response : redirection vers la page precedente.
	 */
	public function destroy($id)
	{
    $proprio = Game::find($id)->user['id'];
    $myID = Auth::id();

    if ($proprio == $myID) {
      $game = $this->gameRepository->getById($id);
      $this->gameRepository->destroy($id);

      return redirect()->back()->withOk("Le jeu " . $game->name . " a été supprimé.");
    } else {
      return redirect()->back()->withOk("Ce jeu ne vous appartient pas et vous ne pouvez pas le supprimer.");
    }
	}

}
