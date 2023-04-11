<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserSupport;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSupportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userSupport can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list usersupports');
    }

    /**
     * Determine whether the userSupport can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function view(User $user, UserSupport $model)
    {
        return $user->hasPermissionTo('view usersupports');
    }

    /**
     * Determine whether the userSupport can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create usersupports');
    }

    /**
     * Determine whether the userSupport can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function update(User $user, UserSupport $model)
    {
        return $user->hasPermissionTo('update usersupports');
    }

    /**
     * Determine whether the userSupport can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function delete(User $user, UserSupport $model)
    {
        return $user->hasPermissionTo('delete usersupports');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete usersupports');
    }

    /**
     * Determine whether the userSupport can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function restore(User $user, UserSupport $model)
    {
        return false;
    }

    /**
     * Determine whether the userSupport can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\UserSupport  $model
     * @return mixed
     */
    public function forceDelete(User $user, UserSupport $model)
    {
        return false;
    }
}
