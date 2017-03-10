<?php

namespace App\Repositories;

use App\Game;

use Illuminate\Support\Facades\Auth;

class GameRepository
{

    protected $game;

    public function __construct(Game $game)
  	{
  		$this->game = $game;
  	}

	private function save(Game $game, Array $inputs)
	{
		$game->name = $inputs['name'];
		$game->console = $inputs['console'];
		$game->boite = isset($inputs['boite']);
    $game->jaquette = isset($inputs['jaquette']);
    $game->notice = isset($inputs['notice']);
    // Espace a remplir apres l'ajout des autres inputs.
    $game->note = $inputs['note'];
    $game->user_id = Auth::id();

		$game->save();
	}

	public function getPaginate($n)
	{
		return $this->game->with('user')
        ->orderBy('created_at', 'desc')
        ->paginate($n);
	}

	public function store(Array $inputs)
	{
		$game = new $this->game;

		$this->save($game, $inputs);

		return $game;
	}

	public function getById($id)
	{
		return $this->game->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		$this->save($this->getById($id), $inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
