<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Repositories\UserRepository;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;
    // Nombre d'entrée par page de la methode "index"
    // (valeur de l'offset de la requete SQL)
    protected $nbrPerPage = 15;

    public function __construct(UserRepository $userRepository)
    {
		$this->userRepository = $userRepository;
	}

  // Affichage de la lsite des utlisateurs
	public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = $users->setPath('')->render();

		return view('index', compact('users', 'links'));
	}

  // Envoi du formulaire pour la creation d'un nouvel utilisateur.
	public function create()
	{
		return view('create');
	}

  // Creation d'un nouvel utlisateur.
	public function store(UserCreateRequest $request)
	{
		$user = $this->userRepository->store($request->all());

		return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
	}

  // Affichage des donées d'un utlisateur.
	public function show($id)
	{
		$user = $this->userRepository->getById($id);

		return view('show',  compact('user'));
	}

  // Envoi du formulaire pour la modification d'un utilisateur
	public function edit($id)
	{
		$user = $this->userRepository->getById($id);

		return view('edit',  compact('user'));
	}

  // Modification des données d'un utlisateur.
	public function update(UserUpdateRequest $request, $id)
	{
		$this->userRepository->update($id, $request->all());

		return redirect('user')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
	}

  // Suppression d'un utilisateur.
	public function destroy($id)
	{
		$this->userRepository->destroy($id);

		return redirect()->back();
	}

}
