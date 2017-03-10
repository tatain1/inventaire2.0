<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // On déclare ici qu’un utilisateur a plusieurs (hasMany) jeux (games).
    // On a ainsi une méthode pratique pour récupérer les jeuxs d’un utilisateur.
    public function games()
    {
        return $this->hasMany(\App\Game::class);
    }
}
