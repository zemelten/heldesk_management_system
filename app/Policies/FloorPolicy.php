<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Floor;
use Illuminate\Auth\Access\HandlesAuthorization;

class FloorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the floor can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list floors');
    }

    /**
     * Determine whether the floor can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function view(User $user, Floor $model)
    {
        return $user->hasPermissionTo('view floors');
    }

    /**
     * Determine whether the floor can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create floors');
    }

    /**
     * Determine whether the floor can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function update(User $user, Floor $model)
    {
        return $user->hasPermissionTo('update floors');
    }

    /**
     * Determine whether the floor can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function delete(User $user, Floor $model)
    {
        return $user->hasPermissionTo('delete floors');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete floors');
    }

    /**
     * Determine whether the floor can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function restore(User $user, Floor $model)
    {
        return false;
    }

    /**
     * Determine whether the floor can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Floor  $model
     * @return mixed
     */
    public function forceDelete(User $user, Floor $model)
    {
        return false;
    }
}
