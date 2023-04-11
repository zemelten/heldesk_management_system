<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Director;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the director can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list directors');
    }

    /**
     * Determine whether the director can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function view(User $user, Director $model)
    {
        return $user->hasPermissionTo('view directors');
    }

    /**
     * Determine whether the director can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create directors');
    }

    /**
     * Determine whether the director can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function update(User $user, Director $model)
    {
        return $user->hasPermissionTo('update directors');
    }

    /**
     * Determine whether the director can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function delete(User $user, Director $model)
    {
        return $user->hasPermissionTo('delete directors');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete directors');
    }

    /**
     * Determine whether the director can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function restore(User $user, Director $model)
    {
        return false;
    }

    /**
     * Determine whether the director can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Director  $model
     * @return mixed
     */
    public function forceDelete(User $user, Director $model)
    {
        return false;
    }
}
