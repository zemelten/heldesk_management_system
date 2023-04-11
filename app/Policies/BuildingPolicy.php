<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Building;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the building can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list buildings');
    }

    /**
     * Determine whether the building can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function view(User $user, Building $model)
    {
        return $user->hasPermissionTo('view buildings');
    }

    /**
     * Determine whether the building can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create buildings');
    }

    /**
     * Determine whether the building can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function update(User $user, Building $model)
    {
        return $user->hasPermissionTo('update buildings');
    }

    /**
     * Determine whether the building can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function delete(User $user, Building $model)
    {
        return $user->hasPermissionTo('delete buildings');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete buildings');
    }

    /**
     * Determine whether the building can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function restore(User $user, Building $model)
    {
        return false;
    }

    /**
     * Determine whether the building can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Building  $model
     * @return mixed
     */
    public function forceDelete(User $user, Building $model)
    {
        return false;
    }
}
