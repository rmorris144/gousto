<?php

namespace App\Policies;

use App\User;
use App\Recipies;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Recipies $recipies)
    {
        return $user->ownsRecipe($recipies);
    }

    public function destroy(User $user, Recipies $recipies)
    {
        return $user->ownsRecipe($recipies);
    }

    public function rating(User $user, Recipies $recipies)
    {
        return !$user->ownsRecipe($recipies);
    }
}
