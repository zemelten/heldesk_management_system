<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QueueType;
use Illuminate\Auth\Access\HandlesAuthorization;

class QueueTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the queueType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list queuetypes');
    }

    /**
     * Determine whether the queueType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function view(User $user, QueueType $model)
    {
        return $user->hasPermissionTo('view queuetypes');
    }

    /**
     * Determine whether the queueType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create queuetypes');
    }

    /**
     * Determine whether the queueType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function update(User $user, QueueType $model)
    {
        return $user->hasPermissionTo('update queuetypes');
    }

    /**
     * Determine whether the queueType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function delete(User $user, QueueType $model)
    {
        return $user->hasPermissionTo('delete queuetypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete queuetypes');
    }

    /**
     * Determine whether the queueType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function restore(User $user, QueueType $model)
    {
        return false;
    }

    /**
     * Determine whether the queueType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QueueType  $model
     * @return mixed
     */
    public function forceDelete(User $user, QueueType $model)
    {
        return false;
    }
}
