<?php

namespace App\Policies;

use App\Models\Artigo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArtigoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Artigo $artigo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Artigo $artigo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Artigo $artigo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Artigo $artigo): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Artigo $artigo): bool
    {
        return false;
    }

    public function modify(User $user, Artigo $artigo): Response
    {
        return $user->id === $artigo->user_id 
            ? Response::allow()
            :Response::deny('Não és tu o criador');
    }
}
