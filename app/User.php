<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) .'x?s=45&d=mm';
    }

    public function hasRatings(Recipies $recipies)
    {
//        dd($recipies);
        return $recipies->ratings->where('user_id', $this->id)->count() === 1;
    }

    public function ownsRecipe(Recipies $recipies)
    {
        return $this->id === $recipies->user->id;
    }
}
