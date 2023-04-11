<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Leader;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the leader can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list leaders');
    }

    /**
     * Determine whether the leader can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function view(User $user, Leader $model)
    {
        return $user->hasPermissionTo('view leaders');
    }

    /**
     * Determine whether the leader can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create leaders');
    }

    /**
     * Determine whether the leader can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function update(User $user, Leader $model)
    {
        return $user->hasPermissionTo('update leaders');
    }

    /**
     * Determine whether the leader can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function delete(User $user, Leader $model)
    {
        return $user->hasPermissionTo('delete leaders');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete leaders');
    }

    /**
     * Determine whether the leader can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function restore(User $user, Leader $model)
    {
        return false;
    }

    /**
     * Determine whether the leader can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Leader  $model
     * @return mixed
     */
    public function forceDelete(User $user, Leader $model)
    {
        return false;
    }
}
