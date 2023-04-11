<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Prioritie;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrioritiePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the prioritie can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list priorities');
    }

    /**
     * Determine whether the prioritie can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function view(User $user, Prioritie $model)
    {
        return $user->hasPermissionTo('view priorities');
    }

    /**
     * Determine whether the prioritie can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create priorities');
    }

    /**
     * Determine whether the prioritie can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function update(User $user, Prioritie $model)
    {
        return $user->hasPermissionTo('update priorities');
    }

    /**
     * Determine whether the prioritie can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function delete(User $user, Prioritie $model)
    {
        return $user->hasPermissionTo('delete priorities');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete priorities');
    }

    /**
     * Determine whether the prioritie can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function restore(User $user, Prioritie $model)
    {
        return false;
    }

    /**
     * Determine whether the prioritie can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Prioritie  $model
     * @return mixed
     */
    public function forceDelete(User $user, Prioritie $model)
    {
        return false;
    }
}
