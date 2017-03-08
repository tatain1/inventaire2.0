<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameCreateRequest;
use App\Http\Requests\GameUpdateRequest;

use App\Repositories\GameRepository;

use Illuminate\Http\Request;

class GameController extends Controller
{

  protected $gameRepository;
  protected $nbrPerPage = 15;

  public function __construct(GameRepository $gameRepository)
  {
		$this->gameRepository = $gameRepository;
	}
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $games = $this->gameRepository->getPaginate($this->nbrPerPage);
    $links = $games->setPath('')->render();

    return view('inventaire/inventaire', compact('games', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return view('inventaire/create');
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

    return view('inventaire/show',  compact('game'));
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
    $game = $this->gameRepository->getById($id);
    $this->gameRepository->destroy($id);

		return redirect()->back()->withOk("Le jeu " . $game->name . " a été supprimé.");
	}

}
